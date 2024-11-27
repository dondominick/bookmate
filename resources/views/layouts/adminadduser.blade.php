<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMate - Book Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .bg-purple { background-color: #6a1b9a; }
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 200px;
            background-color: #7b5dde;
            color: #fff;
            padding-top: 20px;
        }
        .sidebar h4 { color: #fff; font-weight: bold; }
        .sidebar .btn { color: #fff; font-weight: 500; text-align: left; width: 100%; }
        .sidebar .btn:hover { background-color: #495057; }
        .main-content { margin-left: 200px; padding: 20px; }
        .bg-light-blue { background-color: #f0f8ff; }
        .modal-content { padding: 20px; border-radius: 8px; }
        .modal-footer .btn { width: 100px; border-radius: 6px; }
        .modal-footer .btn-cancel { background-color: #e0e0e0; color: black; }
        .modal-footer .btn-delete { background-color: #dc3545; color: white; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 sidebar">
                <div class="text-center">
                    <h4>BookMate</h4>
                    <button class="btn btn-outline-light mt-4">Dashboard</button>
                    <button class="btn btn-outline-light mt-4">Catalog</button>
                    <button class="btn btn-outline-light mt-4">Books</button>
                    <button class="btn btn-outline-light mt-4">User</button>
                    <button class="btn btn-outline-light mt-4">View Book</button>
                    <button class="btn btn-outline-light mt-4">Log Out</button>
                </div>
            </nav>

            <!-- Main Content Section -->
            <main class="col-md-10 main-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2>Book Management</h2>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
                        Add User
                    </button>
                </div>

                <!-- Add User Modal -->
                <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addUserModalLabel">
                                    <i class="fas fa-user-plus"></i> Add User
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="userForm">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="userId" placeholder="ID" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="userName" placeholder="Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="userAddress" placeholder="Address" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="userEmail" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-control" id="userContact" placeholder="Contact" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="userUsername" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="userPassword" placeholder="Password" required>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-cancel" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" onclick="addUser()">Add User</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit User Modal -->
                <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editUserModalLabel">
                                    <i class="fas fa-edit"></i> Edit User
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="editForm">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="editUserId" placeholder="ID" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="editUserName" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="editUserAddress" placeholder="Address">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="editUserEmail" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-control" id="editUserContact" placeholder="Contact">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="editUserUsername" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="editUserPassword" placeholder="Password">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-cancel" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" onclick="updateUser()">Update</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Confirmation Modal -->
                <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteConfirmationModalLabel">
                                    <i class="fas fa-trash-alt"></i> Confirm Deletion
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete this user?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-cancel" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-delete" onclick="deleteUser()">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Table -->
                <div class="table-responsive">
                    <table class="table table-striped table-sm" id="userTable">
                        <thead class="bg-light-blue">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Username</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="userTableBody">
                            <!-- Dynamic rows will be inserted here -->
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS, jQuery, and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        let users = [];

        // Function to add a new user
        function addUser() {
            const userId = document.getElementById('userId').value;
            const userName = document.getElementById('userName').value;
            const userAddress = document.getElementById('userAddress').value;
            const userEmail = document.getElementById('userEmail').value;
            const userContact = document.getElementById('userContact').value;
            const userUsername = document.getElementById('userUsername').value;
            const userPassword = document.getElementById('userPassword').value;

            // Validate inputs
            if (!userId || !userName || !userAddress || !userEmail || !userContact || !userUsername || !userPassword) {
                alert("Please fill out all fields");
                return;
            }

            const newUser = {
                id: userId,
                name: userName,
                address: userAddress,
                email: userEmail,
                contact: userContact,
                username: userUsername,
                password: userPassword
            };

            users.push(newUser);
            updateUserTable();
            $('#addUserModal').modal('hide');
        }

        // Function to update the user table
        function updateUserTable() {
            const tbody = document.getElementById('userTableBody');
            tbody.innerHTML = '';
            users.forEach((user, index) => {
                const row = tbody.insertRow();
                row.innerHTML = `
                    <td>${user.id}</td>
                    <td>${user.name}</td>
                    <td>${user.address}</td>
                    <td>${user.email}</td>
                    <td>${user.contact}</td>
                    <td>${user.username}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="editUser(${index})">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-danger btn-sm" onclick="confirmDelete(${index})">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </td>
                `;
            });
        }

        // Function to edit a user
        function editUser(index) {
            const user = users[index];
            document.getElementById('editUserId').value = user.id;
            document.getElementById('editUserName').value = user.name;
            document.getElementById('editUserAddress').value = user.address;
            document.getElementById('editUserEmail').value = user.email;
            document.getElementById('editUserContact').value = user.contact;
            document.getElementById('editUserUsername').value = user.username;
            document.getElementById('editUserPassword').value = user.password;

            $('#editUserModal').modal('show');
        }

        // Function to update user details
        function updateUser() {
            const userId = document.getElementById('editUserId').value;
            const userName = document.getElementById('editUserName').value;
            const userAddress = document.getElementById('editUserAddress').value;
            const userEmail = document.getElementById('editUserEmail').value;
            const userContact = document.getElementById('editUserContact').value;
            const userUsername = document.getElementById('editUserUsername').value;
            const userPassword = document.getElementById('editUserPassword').value;

            // Find the user to update
            const user = users.find(u => u.id === userId);
            if (user) {
                user.name = userName;
                user.address = userAddress;
                user.email = userEmail;
                user.contact = userContact;
                user.username = userUsername;
                user.password = userPassword;
                updateUserTable();
                $('#editUserModal').modal('hide');
            }
        }

        // Function to confirm user deletion
        function confirmDelete(index) {
            $('#deleteConfirmationModal').modal('show');
            document.getElementById('deleteConfirmationModal').onclick = () => deleteUser(index);
        }

        // Function to delete a user
        function deleteUser(index) {
            users.splice(index, 1);
            updateUserTable();
            $('#deleteConfirmationModal').modal('hide');
        }
    </script>
</body>
</html>
