<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('asset/css/sidebar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('head')

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="userdashboard">BookMate</a>
                </div>
            </div>
            <ul class="sidebar-nav ">
                <li class="sidebar-item">
                    <a href="{{ route('userlogs') }}" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Users Log</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('admindashboard') }}" class="sidebar-link">
                        <i class="lni lni-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('admin_bms') }}" class="sidebar-link">
                        <i class="lni lni-book"></i>
                        <span>Book Management</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('adminSlips') }}" class="sidebar-link">
                        <i class="lni lni-book"></i>
                        <span>Borrower's Slips</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('adminborrowed') }}" class="sidebar-link">
                        <i class="lni lni-book"></i>
                        <span>Circulated Books</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('admingenre') }}" class="sidebar-link">
                        <i class="lni lni-search-alt"></i>
                        <span>Browse Books</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <button href="" class="btn text-white sidebar-link"
                    onclick="document.getElementById('logoutForm').submit()">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </button>
            </div>
        </aside>
        <form action="{{ route('logout') }}" method="post" id="logoutForm">
            @csrf
        </form> <!-- Main Content -->
        <div class="main p-3">
            <div class="col-md-10 content w-100 border">
                <!-- Top Bar -->
                <div class="topbar">
                    <div class="time">
                        <?php date_default_timezone_set('Asia/Manila'); ?>
                        <p>{{ date('h:i a') }}</p>
                        <p>{{ date('M d, Y') }}</p>
                    </div>
                    <div class="user-info">
                        <i class="fa-solid fa-user"></i>
                        <div>
                            <span>{{ auth()->user()->name }}</span><br>
                            <small>Admin</small>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script>
        const hamBurger = document.querySelector(".toggle-btn");

        hamBurger.addEventListener("hover", function() {
            document.querySelector("#sidebar").classList.toggle("expand");
        });
    </script>

</body>

</html>
