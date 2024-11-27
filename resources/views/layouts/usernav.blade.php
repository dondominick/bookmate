<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BookMate</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('asset/css/styles.css') }}">
    <link href="{{ asset('asset/cssfolder/main.css') }}" rel="stylesheet">
    <script src="{{ asset('asset/js/jquery-3.7.1.min.js') }}"></script>


    @yield('head')

    <style>
        aside {
            background-color: rebeccapurple;
        }

        main {
            flex: 1;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <aside class="aside">
            <nav class="col-md-2 sidebar">
                <div class="text-center px-3">
                    <h4>BookMate</h4>
                    <a href="{{ route('userdashboard') }}"><button
                            class="btn btn-outline-light mt-4">Profile</button></a>

                    <a href="{{ route('catalog') }}"><button class="btn btn-outline-light mt-4">Catalog</button></a>
                    <a href="{{ route('borrow-books') }}"><button class="btn btn-outline-light mt-4">Books</button></a>
                    <a href="#"><button class="btn btn-outline-light mt-4"
                            onclick="document.getElementById('logoutForm').submit()">Log out</button></a>

                    <form action="{{ route('logout') }}" method="post" id="logoutForm">
                        @csrf
                    </form>
                </div>
            </nav>
        </aside>

        <main class="main-content">
            <div class="header">
                <div class="header-time">
                    <?php date_default_timezone_set('Asia/Manila'); ?>
                    <p>{{ date('h:i a') }}</p>
                    <p>{{ date('M d, Y') }}</p>
                </div>
                <div class="user-info">
                    <img src="https://via.placeholder.com/40" alt="User Profile">
                    @auth
                        <div>
                            <p class="mb-0">{{ auth()->user()->name }}</p>
                            <p class="text-muted">User</p>
                        </div>
                    @endauth
                    @guest
                        <div>
                            <p>User not authenticated</p>
                        </div>
                    @endguest

                </div>

            </div>
            @yield('content')
        </main>
    </div>


    @yield('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="{{ asset('asset/js/sidebar.js') }}"></script>
    <script src="{{ asset('asset/js/scripts.js') }}"></script>
    <script src="{{ asset('asset/js/jquery-3.7.1.min.js') }}"></script>

</body>

</html>
