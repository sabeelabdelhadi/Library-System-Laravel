<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحة اضافة الكتب</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light" style="padding-top: 75px;">
    <nav class="navbar navbar-dark shadow-sm" style="background-color: #212529 !important; position: fixed; top: 0; width: 100%; z-index: 1000; direction: rtl;">
        <div class="container d-flex justify-content-start">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="#" style="color: white; text-decoration: none;">
                <span style="margin-left: 10px;">📚</span>
                <span>نظام إدارة الكتب</span>
            </a>
        </div>
    </nav>

    <div class="container mt-0">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                    <h2 class="mb-4 fw-bold">{{ isset($book) ? 'تعديل الكتاب' : 'إضافة كتاب' }}</h2> 
                        <form action="{{ isset($book) ? route('books.update', $book->id) : route('books.store') }}" method="post">
                            @csrf
                            @if(isset($book))
                            @method('PUT') 
                            @endif

                            <div class="mb-3">
                                <label class="form-label">اسم الكتاب</label>
                                <input type="text" name="title" class="form-control" value="{{ $book->title ?? '' }}" placeholder="ادخل اسم الكتاب" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">سنة النشر</label>
                                <input type="number" name="year" class="form-control" value="{{ $book->year ?? '' }}" placeholder="ادخل سنة النشر" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">المؤلف</label>
                                <input type="text" name="author" class="form-control" value="{{ $book->author ?? '' }}" placeholder="ادخل اسم المؤلف" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">السعر</label>
                                <input type="text" name="price" class="form-control"
                                    value="{{ isset($book) ? (int)$book->price . '$' : '' }}"
                                    placeholder="ادخل سعر الكتاب" required>
                            </div>
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary px-4">
                                        {{ isset($book) ? 'تحديث' : 'حفظ' }}
                                    </button>
                                    <a href="{{ route('books.index') }}" class="btn btn-secondary px-4">إلغاء</a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>