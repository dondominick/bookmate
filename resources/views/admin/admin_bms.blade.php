@extends('layouts.adminnav')


@section('content')
    <main class="col-md-10 main-content">
        <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2>Book Management System</h2>
            <div>
                <div><strong>Admin</strong> <small class="text-muted">Admin</small></div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="d-flex justify-content-between">

            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBookModal">Add New Book</button>
        </div>

        <!-- Search bar -->
        <div class="input-group my-3">
            <input type="text" class="form-control" placeholder="Search by ID" id="searchInput" oninput="searchBooks()">
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-striped" id="borrowedBooksTable">
                <tr class="bg-light-blue">
                    <th>Book ID</th>
                    <th>BooK Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Availability</th>
                    <th>Date Added</th>
                    <th>Action</th>
                </tr>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->book_title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->genre }}</td>
                            <td>{{ $book->availability }}</td>
                            <td>{{ $book->created_at }}</td>
                            <td>
                                <button class="btn bg-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteConfirmationModal"
                                    onclick="deleteModal({{ $book->id }})">Delete</button>
                                <button class="btn bg-success" data-bs-target="#editBookModal" data-bs-toggle="modal"
                                    onclick="updateModal('{{ $book }}')">Edit</button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </main>

    <!-- Add Book Modal -->
    <div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Book</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addBookForm" action="{{ route('admin_bms') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="userId">Book Title</label>
                            <input type="text" class="form-control" id="userId" placeholder="Enter User ID"
                                name="book_title">
                        </div>
                        <div class="form-group">
                            <label for="userId">Author</label>
                            <input type="text" class="form-control" id="userId" placeholder="Enter User ID"
                                name="author">
                        </div>
                        <div class="form-group">
                            <label for="userId">Genre</label>
                            <input type="text" class="form-control" id="userId" placeholder="Enter User ID"
                                name="genre">
                        </div>
                        <div class="form-group">
                            <label for="userId">Description</label>
                            <input type="text" class="form-control" id="userId" placeholder="Enter User ID"
                                name="description">
                        </div>
                        <div class="form-group">
                            <label for="availability">Availability</label>
                            <input type="text" class="form-control" id="availability" name="availability"
                                placeholder="Available or Borrowed">
                        </div>
                        <div class="form-group">
                            <label for="userId">Published Date</label>
                            <input type="date" class="form-control" id="userId" name="published_date"
                                placeholder="Enter User ID">
                        </div>
                        <div class="form-group">
                            <label for="Book Image">Book Image</label>
                            <input type="file" name="book_img" id="" class="form-control" placeholder=""
                                aria-describedby="helpId">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" onclick="document.getElementById('addBookForm').submit()">Save</button>
                </div>
            </div>
        </div>
    </div>


    {{-- Update Modal --}}

    <!-- Modal -->
    <div class="modal fade" id="editBookModal" tabindex="-1" role="modal" aria-labelledby="modalTitleId">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Update Book
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin_bms') }}" method="post" id="updateForm">
                        @csrf
                        @method('patch')
                        <input type="text" name="bookId" id="bookId" value="" hidden>
                        <div class="form-group">
                            <label for="userId">Book Title</label>
                            <input type="text" class="form-control" id="updateTitle" placeholder="Enter User ID"
                                name="book_title">
                        </div>
                        <div class="form-group">
                            <label for="userId">Author</label>
                            <input type="text" class="form-control" id="updateAuthor" placeholder="Enter User ID"
                                name="author">
                        </div>
                        <div class="form-group">
                            <label for="userId">Genre</label>
                            <input type="text" class="form-control" id="updateGenre" placeholder="Enter User ID"
                                name="genre">
                        </div>
                        <div class="form-group">
                            <label for="userId">Description</label>
                            <input type="text" class="form-control" id="updateDescription"
                                placeholder="Enter User ID" name="description">
                        </div>
                        <div class="form-group">
                            <label for="availability">Availability</label>
                            <input type="text" class="form-control" id="updateAvailability" name="availability"
                                placeholder="Available or Borrowed">
                        </div>
                        <div class="form-group">
                            <label for="userId">Published Date</label>
                            <input type="date" class="form-control" id="updateDate" name="published_date"
                                placeholder="Enter User ID">
                        </div>
                        <div class="form-group">
                            <label for="Book Image">Book Image</label>
                            <input type="file" name="book_img" id="updateImg" class="form-control" placeholder=""
                                aria-describedby="helpId">
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
                    <form action="{{ route('admin_bms') }}" method="post" hidden id="deleteForm">
                        <input type="text" hidden id="deleteBook" name="bookId">
                        @csrf
                        @method('delete')
                    </form>
                    <p>Are you sure you want to delete this record?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton"
                        onclick="document.getElementById('deleteForm').submit()">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column position-fixed m-3 bottom-0 end-0 w-50">
        @if (session('success'))
            <div id="liveAlertPlaceholder" class="bg-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('book'))
            <div id="liveAlertPlaceholder" class="bg-success">
                {{ session('success') }}
            </div>
        @endif
        @error('book')
            <div id="liveAlertPlaceholder" class="bg-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <script>
        let borrowedBooks = [];
        let deleteIndex = null;

        function updateModal(obj) {
            const newobj = JSON.parse(obj);
            const title = document.getElementById('updateTitle');
            const author = document.getElementById('updateAuthor');
            const description = document.getElementById('updateDescription');
            const date = document.getElementById('updateDate');
            const genre = document.getElementById('updateGenre');
            const availability = document.getElementById('updateAvailability');
            const bookId = document.getElementById('bookId');
            title.value = newobj.book_title;
            author.value = newobj.author;
            description.value = newobj.description;
            date.value = newobj.published_date;
            genre.value = newobj.genre;
            availability.value = newobj.availability;

            bookId.value = newobj.id;
            console.log(newobj);
        }

        function deleteModal(id) {
            const bookId = document.getElementById('deleteBook');
            bookId.value = id;

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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
@endsection
