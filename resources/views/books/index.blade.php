<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>نظام إدارة الكتب</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="padding-top: 40px; background-color: #f8f9fa;">

  <nav class="navbar navbar-dark shadow-sm"
    style="background-color: #212529 !important; position: fixed; top: 0; width: 100%; z-index: 1000; direction: rtl;">
    <div class="container d-flex justify-content-start">
      <a class="navbar-brand fw-bold d-flex align-items-center" href="#" style="color: white; text-decoration: none;">
        <span style="margin-left: 10px;">📚</span>
        <span>نظام إدارة الكتب</span>
      </a>
    </div>
  </nav>

  <div class="container d-flex flex-column align-items-center" style="margin-top: 18px;">

    <div class="text-center mt-3 mb-2">
      <img src="https://img.freepik.com/free-vector/hand-drawn-stack-books-illustration_23-2149341898.jpg"
        alt="صورة كتب" style="width: 200px; height: auto; border-radius: 5px;">
    </div>

    <nav class="navbar shadow-sm mb-3" style="background-color: #f6f6f6; border-radius: 10px; width: 70%;">
      <div class="container-fluid d-flex justify-content-between">
        <h2 class="text-black mb-0">قائمة الكتب</h2>
        <a href="{{ route('books.create') }}" class="btn btn-secondary fw-bold px-4">إضافة كتاب</a>
      </div>
    </nav>

    <table class="table table-bordered text-center align-middle shadow-sm table table-bordered border-primary" style="width: 70%;">
      <thead class="table-secondary">
        <tr>
          <th>#</th>
          <th>اسم الكتاب</th>
          <th>سنة النشر</th>
          <th>المؤلف</th>
          <th>السعر</th>
          <th>العمليات</th>
        </tr>
      </thead>
      <tbody>
        @foreach($books as $book)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $book->title }}</td>
          <td>{{ $book->year }}</td>
          <td>{{ $book->author }}</td>
          <td>{{ (int)$book->price }}$</td>
          <td>
            <div class="d-flex gap-2 justify-content-center">
              <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm fw-bold">تعديل الكتاب</a>

              <form action="{{ route('books.destroy', $book->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm fw-bold">حذف الكتاب</button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>

</html>