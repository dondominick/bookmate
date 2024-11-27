<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrower Slip</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Borrower Slip Form</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('borrower-slips.submit') }}" method="POST">
        @csrf
        {{-- <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input type="number" name="user_id" id="user_id" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="book_title" class="form-label">Book Title</label>
            <input type="text" name="book_title" id="book_title" class="form-control" required>
        </div> --}}
        <div class="mb-3">
            <label for="borrow_date" class="form-label">Borrow Date</label>
            <input type="date" name="borrow_date" id="borrow_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="return_date" class="form-label">Return Date</label>
            <input type="date" name="return_date" id="return_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
