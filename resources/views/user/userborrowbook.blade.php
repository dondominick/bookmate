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
            <button class="btn-tab active" onclick="window.location.href='{{ route('borrow-books') }}'">Borrowed
                Books</button>
            <button class="btn-tab" onclick="window.location.href='{{ route('return-books') }}'">Returned Books</button>
        </div>
        <div class="input-group search-bar">
        </div>
        <div>
            <input type="text" class="form-control" placeholder="Search by ID or Type">
            <button class="btn btn-outline-secondary">Acquire</button>
        </div>
    </div>

    <!-- Table -->
    <div class="table-container">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Date Borrowed</th>
                    <th>Due Date</th>
                    <th>Fines</th>
                    <th>Action</th>
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
                        <td>
                            @if ($book->fines <= 0)
                                P {{ 0 }}
                            @endif
                            {{ $book->fines }}
                        </td>
                        <td>

                            <button class="btn bg-success text-white" onclick="returnBook({{ $book->id }})">
                                Return
                            </button>
                        </td>
                    </tr>
                @endforeach
                <!-- Add additional rows as needed -->
            </tbody>
        </table>
    </div>
    {{-- Return Form --}}
    <form action="{{ route('borrow-books') }}" method="post" hidden id="returnForm">
        @csrf
        <input type="text" hidden name="borrow_id" id="borrow_id">

    </form>
@endsection

@section('scripts')
    <script>
        function returnBook(id) {
            const form = document.getElementById('returnForm');
            const input = document.getElementById('borrow_id');
            input.value = id;
            form.submit();

        }
    </script>
@endsection
