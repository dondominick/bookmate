@extends('layouts.usernav')
@section('head')
    <style>
        .card {
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #6A1B9A;
            color: white;
            font-size: 1.5rem;
            padding: 15px;
            border-bottom: 0;
        }

        .card-body {
            padding: 20px;
        }

        /* Table Styling */
        .table {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
        }

        .table thead {
            background-color: #6A1B9A;
            color: white;
        }

        .table th,
        .table td {
            text-align: center;
            padding: 15px;
        }

        .table tbody tr:hover {
            background-color: #f0f0f0;
        }

        /* Footer Styling */
        .footer-text {
            text-align: right;
            color: #6A1B9A;
            font-weight: bold;
            padding-top: 20px;
        }
    </style>
@endsection
@section('content')
    @if (session('borrow'))
        <div class="alert alert-success my-3" role="alert">
            {{ session('borrow') }}
        </div>
    @endif

    @error('borrow')
        <div class="alert alert-danger my-3" role="alert">
            {{ $message }}
        </div>
    @enderror

    <div class="w-100 p-4 justify-content-center">
        <div class="card border-danger">
            <div class="card-header">Book Catalog</div>
            <div class="card-body">
                {{-- Display the books table --}}
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Description</th>
                            <th>Availability</th>
                            <th>Published Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->book_title }}</td>
                                <td>{{ $item->author }}</td>
                                <td>{{ $item->genre }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->availability }}</td>
                                <td>{{ $item->published_date }}</td>
                                <td>
                                    <button class="btn btn-success mx-1" onclick="borrowBook({{ $item->id }})">Borrow
                                        Books</button>
                                    {{-- <a href="{{url('/borrowslip')}}"><button class="btn btn-outline-light mt-4">Borrow Books</button></a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <form action="" hidden id="borrow-form" method="POST">
        @csrf
        <input type="text" hidden id="borrow-input" name="book_id">
    </form>
    <div class="footer-text">BookMate &copy; 2024</div>


    @if (session('borrow'))
    @endif
@endsection

@section('scripts')
    <script>
        function borrowBook(id) {
            const form = $('#borrow-form');
            const input = $('#borrow-input');

            input.val(id);

            form.submit();
        }
    </script>
@endsection
