@extends('layouts.adminnav')

@section('head')
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f3f3f3;
        }

        .menu-item {
            color: #fff;
            display: block;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .menu-item:hover,
        .menu-item.active {
            background-color: #6e6ebc;
        }

        .logout-button {
            margin-top: auto;
            padding: 10px;
            background-color: #ff4d4d;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 1em;
            width: 100%;
        }

        .header {
            padding: 15px 25px;
            background-color: #f9f9f9;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
        }

        .content-body {
            padding: 20px 25px;
        }

        .tabs .nav-link {
            color: #000;
        }

        .tabs .nav-link.active {
            background-color: #4a4a8d;
            color: #fff;
        }

        .table-container {
            overflow-y: auto;
            max-height: calc(100vh - 240px);
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            padding: 15px;
        }

        .action-button {
            background-color: #4a4a8d;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            font-size: 0.9em;
        }
    </style>
@endsection

@section('content')
    <!-- Main Content -->
    <main class="col-md-9">


        <div class="content-body">
            <!-- Tabs -->
            <ul class="nav nav-tabs tabs">
                <li class="nav-item">
                    <button class="nav-link" type="button"
                        onclick="window.location.href = '{{ route('adminborrowed') }}'">Borrowed Books</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link active" type="button" onclick="setActiveTab(this)">Overdue Borrowers</button>
                </li>
            </ul>

            <!-- Table -->
            <div class="table-container mt-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>BOOK ID</th>
                            <th>User ID</th>
                            <th>Amount</th>
                            <th>Due Date</th>
                            <th>Date Returned</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example Row -->
                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->id }}</td>
                                <td>{{ $book->user_id }}</td>
                                <td>{{ $book->fines }}</td>
                                <td>{{ $book->due_date }}</td>
                                <td>
                                    @if ($book->returned_at)
                                        {{ $book->returned_at }}
                                    @endif
                                    @empty($book->returned_at)
                                        Not yet Returned
                                    @endempty
                                </td>
                                <td><button class="action-button">Details</button></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
