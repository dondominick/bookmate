@extends('layouts.adminnav')
@section('head')
@endsection

@section('content')
    <div class="table-responsive">
        <h3>Borrower's Slips</h3>
        <table class="table">
            <thead>
                <tr>
                    <th class="col">Name</th>
                    <th class="col">Book Title</th>
                    <th class="col">Book ID</th>
                    <th class="col">Return Date</th>
                    <th class="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($slips as $slip)
                    <tr class="">
                        <td scope="row">{{ $slip->name }}</td>
                        <td>{{ $slip->book_title }}</td>
                        <td>{{ $slip->book_id }}</td>
                        <td>{{ $slip->return_date }}</td>
                        <td class="d-flex gap-3">
                            <button class="btn bg-success">
                                Accept
                            </button>
                            <button class="btn bg-danger">
                                Reject
                            </button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
