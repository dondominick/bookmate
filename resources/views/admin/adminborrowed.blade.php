@extends('layouts.adminnav')


@section('content')
    <main class="col-md-10 main-content">
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
                    <a class="nav-link" href="#">Overdue Borrowers</a>
                </li>
            </ul>
            <button class="btn btn-primary" data-toggle="modal" data-target="#addBookModal">Add Borrowed Book</button>
        </div>

        <!-- Search bar -->
        <div class="input-group my-3">
            <input type="text" class="form-control" placeholder="Search by ID" id="searchInput" oninput="searchBooks()">
        </div>

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
                <tbody id="borrowedBooksTableBody"></tbody>
            </table>
        </div>
    </main>

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
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
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
