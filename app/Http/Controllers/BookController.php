<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.edit');
    }

    public function store(Request $request)
    {
        $price = str_replace('$', '', $request->price);
        $request->merge(['price' => $price]);

        $request->validate([
            'title'  => 'required',
            'author' => 'required',
            'price'  => 'required|numeric|gt:0',
            'year'   => 'required|integer',
        ]);

        Book::create($request->all());
        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $price = str_replace('$', '', $request->price);
        $request->merge(['price' => $price]);

        $request->validate([
            'title'  => 'required',
            'author' => 'required',
            'price'  => 'required|numeric|min:1',
            'year'   => 'required|integer',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
