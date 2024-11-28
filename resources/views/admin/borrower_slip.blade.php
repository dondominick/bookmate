@extends('layouts.adminnav')
@section('head')
@endsection

@section('content')
    <div class="table-responsive">
        <h3>Borrower's Slips</h3>
        @error('status')
            <div class="alert alert-danger my-3" role="alert">
                {{ $message }}
            </div>
        @enderror
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
                            <button class="btn bg-success"
                                onclick="updateStatus({{ $slip->book_id }}, {{ $slip->user_id }},{{ $slip->id }}, 'accepted')">
                                Accept
                            </button>
                            <button class="btn bg-danger"
                                onclick="updateStatus({{ $slip->book_id }}, {{ $slip->user_id }},{{ $slip->id }},  'rejected')">
                                Reject
                            </button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <form action="{{ route('adminSlips') }}" method="post" id="updateForm" hidden>
        @csrf
        <input type="text" hidden name="book_id" id="book_id">
        <input type="text" hidden name="user_id" id="user_id">
        <input type="text" hidden name="slip_id" id="slip_id">
        <input type="text" hidden name="status" id="status">

    </form>
@endsection

@section('scripts')
    <script>
        function updateStatus(book_id, user_id, slip_id, status) {
            const form = document.getElementById('updateForm');
            const input = document.getElementById('book_id');
            const input2 = document.getElementById('user_id');
            const input3 = document.getElementById('slip_id');
            const stat = document.getElementById('status');

            input.value = book_id;
            input2.value = user_id;
            input3.value = slip_id;
            stat.value = status;
            form.submit();
        }
    </script>
@endsection
