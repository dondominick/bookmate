@extends('layouts.adminnav')


@section('content')
    <main class="main-content">
        <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2>Borrowed Books</h2>
            <div>
                <div><strong>Admin</strong> <small class="text-muted">Admin</small></div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="d-flex justify-content-between">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/borrowed-books') }}">Borrowed Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin-overdue') }}">Overdue Borrowers</a>
                </li>
            </ul>
            <button class="btn btn-primary" onclick="document.getElementById('update').submit()">Refresh Table</button>

            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBookModal">Add Borrowed Book</button>
        </div>
        <form action="" method="POST" hidden id="update">
            @csrf
            @method('patch')
            <input type="text" name="status" value='true'>
        </form>
        <!-- Search bar -->
        <div class="input-group my-3">
            <input type="text" class="form-control" placeholder="Search by ID" id="searchInput" oninput="searchBooks()">
        </div>
        @error('due_date')
            <small id="helpId" class="form-text text-muted text-danger">{{ $message }}</small>
        @enderror
        @error('status')
            <div class="alert alert-danger my-3" role="alert">
                {{ $message }}
            </div>
        @enderror
        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-striped" id="borrowedBooksTable">
                <thead class="bg-light-blue">
                    <tr>
                        <th>BOOK ID</th>
                        <th>User ID</th>
                        <th>Availability</th>
                        <th>Due Date</th>
                        <th>Date & Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="borrowedBooksTableBody">
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->book_id }}</td>
                            <td>{{ $book->user_id }}</td>
                            <td>{{ $book->availability }}</td>
                            <td>{{ $book->due_date }}</td>
                            <td>{{ $book->borrowed_at }}</td>
                            <td><button class="btn bg-danger">Notify User</button>
                                <button class="btn bg-primary" data-bs-toggle="modal" data-bs-target="#updateModal"
                                    onclick="updateModal({{ $book }})">Update</button>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    {{-- Update Borrowed Book Modal --}}
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Update Borrowed Book
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" class="container-fluid" method="POST" id="updateForm">
                        @csrf
                        @method('patch')
                        <input type="text" hidden name="borrowed_id" value="" id="borrowed_id">
                        <div class="form-group">
                            <label for="" class="form-label">
                                User ID: </label><span id="user_id"></span>
                            <label for="" class="form-label">Book ID: </label><span id="book_id"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Availability</label>
                            <select name="availability" class="form-control" id="availability">
                                <option selected value="">Choose</option>
                                <option value="Borrowed">Borrowed</option>
                                <option value="Returned">Returned</option>
                                <option value="Overdue">Overdue</option>
                            </select>
                            @error('availability')
                                <small id="helpId" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Due Date</label>
                            <input type="date" id="due_date" name="due_date" class="form-control" value="">
                            @error('due_date')
                                <small id="helpId" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Borrowed At</label>
                            <input type="date" name="borrowed_at" id="borrowed_at" class="form-control" value="">
                            @error('borrowed_at')
                                <small id="helpId" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary"
                        onclick="document.getElementById('updateForm').submit()">Save</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var modalId = document.getElementById('modalId');

        modalId.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            let button = event.relatedTarget;
            // Extract info from data-bs-* attributes
            let recipient = button.getAttribute('data-bs-whatever');

            // Use above variables to manipulate the DOM
        });
    </script>

    <script>
        function updateModal(obj) {
            const user_id = document.getElementById('user_id');
            const book_id = document.getElementById('book_id');
            const due_date = document.getElementById('due_date');
            const borrowed_at = document.getElementById('borrowed_at');
            const borrowed_id = document.getElementById('borrowed_id');
            borrowed_id.value = obj.id;
            due_date.value = obj.due_date;
            borrowed_at.value = obj.borrowed_at;
            user_id.textContent = obj.user_id;
            book_id.textContent = obj.book_id;

        }
    </script>

    <!-- Add Book Modal -->
    <div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Borrowed Book</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addBookForm">
                        <div class="form-group">
                            <label for="bookId">Book ID</label>
                            <input type="text" class="form-control" id="bookId" placeholder="Enter Book ID">
                        </div>
                        <div class="form-group">
                            <label for="userId">User ID</label>
                            <input type="text" class="form-control" id="userId" placeholder="Enter User ID">
                        </div>
                        <div class="form-group">
                            <label for="availability">Availability</label>
                            <input type="text" class="form-control" id="availability"
                                placeholder="Available or Borrowed">
                        </div>
                        <div class="form-group">
                            <label for="dueDate">Due Date</label>
                            <input type="date" class="form-control" id="dueDate">
                        </div>
                        <div class="form-group">
                            <label for="dateTime">Date & Time</label>
                            <input type="datetime-local" class="form-control" id="dateTime">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" onclick="addBook()">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this record?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let borrowedBooks = [];
        let deleteIndex = null;

        function addBook() {
            const bookId = document.getElementById('bookId').value;
            const userId = document.getElementById('userId').value;
            const availability = document.getElementById('availability').value;
            const dueDate = document.getElementById('dueDate').value;
            const dateTime = document.getElementById('dateTime').value;

            if (!bookId || !userId || !availability || !dueDate || !dateTime) {
                alert('Please fill all fields');
                return;
            }

            borrowedBooks.push({
                bookId,
                userId,
                availability,
                dueDate,
                dateTime
            });
            renderTable();
            $('#addBookModal').modal('hide');
            document.getElementById('addBookForm').reset();
        }

        function renderTable() {
            const tableBody = document.getElementById('borrowedBooksTableBody');
            tableBody.innerHTML = '';
            borrowedBooks.forEach((book, index) => {
                tableBody.innerHTML += `
                        <tr>
                            <td>${book.bookId}</td>
                            <td>${book.userId}</td>
                            <td>${book.availability}</td>
                            <td>${book.dueDate}</td>
                            <td>${book.dateTime}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" onclick="editBook(${index})">Edit</button>
                                <button class="btn btn-danger btn-sm" onclick="showDeleteModal(${index})">Delete</button>
                            </td>
                        </tr>
                    `;
            });
        }

        function editBook(index) {
            const book = borrowedBooks[index];
            document.getElementById('bookId').value = book.bookId;
            document.getElementById('userId').value = book.userId;
            document.getElementById('availability').value = book.availability;
            document.getElementById('dueDate').value = book.dueDate;
            document.getElementById('dateTime').value = book.dateTime;

            $('#addBookModal').modal('show');
            borrowedBooks.splice(index, 1);
        }

        function showDeleteModal(index) {
            deleteIndex = index;
            $('#deleteConfirmationModal').modal('show');
        }

        document.getElementById('confirmDeleteButton').addEventListener('click', function() {
            if (deleteIndex !== null) {
                borrowedBooks.splice(deleteIndex, 1);
                renderTable();
                $('#deleteConfirmationModal').modal('hide');
                deleteIndex = null;
            }
        });

        function searchBooks() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            const filteredBooks = borrowedBooks.filter(book =>
                book.bookId.toLowerCase().includes(query) ||
                book.userId.toLowerCase().includes(query)
            );
            renderTable(filteredBooks);
        }
    </script>
@endsection
