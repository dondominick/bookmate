<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('asset/cssfolder/main.css') }}" rel="stylesheet">

    <title>BookMate Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">


    @yield('head')
</head>

<body>

    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="col-md-2 sidebar">
            <div class="text-center">
                <h4>BookMate</h4>
                <button class="btn btn-outline-light mt-4"
                    onclick="window.location.href ='{{ route('userdashboard') }}'">Dashboard</button>
                <button class="btn btn-outline-light mt-4" onclick="">Catalog</button>
                <button class="btn btn-outline-light mt-4" onclick="">Books</button>
                <button class="btn btn-outline-light mt-4" onclick="">User</button>
                <button class="btn btn-outline-light mt-4" onclick="">View Book</button>
                <button class="btn btn-outline-light mt-4" onclick="">Log Out</button>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="">
            @yield('content')
        </main>

    </div>


    <!-- Bootstrap JS and Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.js"></script>
    <script>
        function setActiveTab(button) {
            // Remove active class from all tab buttons
            document.querySelectorAll('.btn-tab').forEach(btn => btn.classList.remove('active'));
            // Add active class to the clicked button
            button.classList.add('active');
        }
    </script>

    @yield('scripts')
</body>

</html>
