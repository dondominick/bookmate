<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowed Books List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Borrowed Books List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Book Title</th>
                <th>Borrow Date</th>
                <th>Return Date</th>
                <th>Fine</th>
            </tr>
        </thead>
        <tbody>
            @forelse($borrowedBooks as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->user->name ?? 'Unknown User' }}</td>
                    <td>{{ $book->book_title }}</td>
                    <td>{{ $book->borrow_date }}</td>
                    <td>{{ $book->return_date }}</td>
                    <td>${{ $book->fine }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No borrowed books found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
