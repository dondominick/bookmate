<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMate Admin - Overdue Borrowers</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <style>
        /* Custom CSS */
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
        .menu-item:hover, .menu-item.active {
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
</head>
<body>

    @extends('layouts.adminnav')

    @section('title', 'Borrowed Books')
    
    @section('content')
            <!-- Main Content -->
            <main class="col-md-9">
                <header class="header d-flex justify-content-between align-items-center">
                    <div>
                        <strong>Denneila Tingson</strong> - Admin
                    </div>
                    <div>
                        <span>12:29 PM</span>
                        <span class="ml-3">Sep 02, 2023</span>
                        <i class="ml-3 fas fa-bell"></i>
                        <i class="ml-3 fas fa-cog"></i>
                    </div>
                </header>
                
                <div class="content-body">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs tabs">
                        <li class="nav-item">
                            <button class="nav-link active" type="button" onclick="setActiveTab(this)">Borrowed Books</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" type="button" onclick="setActiveTab(this)">Overdue Borrowers</button>
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
                                    <th>Date & Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example Row -->
                                <tr>
                                    <td>B001</td>
                                    <td>001</td>
                                    <td>100</td>
                                    <td>13-03-2024</td>
                                    <td>25-02-2024 10:39:43</td>
                                    <td><button class="action-button">Details</button></td>
                                </tr>
                                <!-- Repeat rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome for Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
    <!-- Script to toggle active state -->
    <script>
        function setActiveTab(element) {
            // Remove active class from all tabs
            document.querySelectorAll('.nav-link').forEach(tab => tab.classList.remove('active'));
            // Add active class to the clicked tab
            element.classList.add('active');
        }
    </script>
</body>
</html>
