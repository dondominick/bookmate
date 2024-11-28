@extends('layouts.usernav')
@section('head')
    <style>
        /* Content */
        .content {
            margin-left: 240px;
            padding: 20px;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header .user-info {
            display: flex;
            align-items: center;
        }

        .header .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .header-time {
            font-size: 0.9em;
            color: gray;
        }

        /* Search and Tabs */
        .search-tabs {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .search-tabs .btn-tab {
            background-color: #f0f0f0;
            color: #333;
            border: none;
            border-radius: 5px 5px 0 0;
            padding: 8px 16px;
            cursor: pointer;
        }

        .search-tabs .btn-tab.active {
            background-color: #6c63ff;
            color: #fff;
        }

        .search-bar {
            width: 250px;
        }

        /* Table */
        .table-container {
            overflow-x: auto;
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table thead {
            background-color: #f0f0f0;
            color: #333;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
@endsection
@section('content')
    <!-- Search and Tabs -->
    <div class="search-tabs">
        <div>
            <button class="btn-tab" onclick="window.location.href ='{{ route('borrow-books') }}'">Borrowed
                Books</button>
            <button class="btn-tab active" onclick="window.location.href = '{{ route('return-books') }}'">Returned
                Books</button>
        </div>
        <div class="input-group search-bar">
        </div>
        <div>
            <input type="text" class="form-control" placeholder="Search by ID or Type">
            <button class="btn btn-outline-secondary" style="margin-top:3%;">Acquire</button>
        </div>
    </div>

    <!-- Table -->
    <div class="table-container">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Borrowed Date</th>
                    <th>Due Date</th>
                    <th>Returned Date</th>
                </tr>
            </thead>
            <tbody>


                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->book_title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->genre }}</td>
                        <td>{{ $book->borrowed_at }}</td>
                        <td>{{ $book->due_date }}</td>
                        <td>{{ $book->returned_at }}</td>
                    </tr>
                @endforeach
                <!-- Add additional rows as needed -->
            </tbody>
        </table>
    </div>
@endsection
