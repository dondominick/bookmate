<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Library Management System</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Simple line icons-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css"
        rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic"
        rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('asset/css/styles.css') }}" rel="stylesheet" />

</head>
<style>
    .reg:hover {
        color: #6c757d;
        background-color: white;
    }

    .sign:hover {
        color: #0d6efd;
        background-color: white;
    }
</style>

<body id="page-top">
    <!-- Navigation-->

    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand"><a href="">Book</a></li>
            <li class="sidebar-nav-item"><a href="{{ route('login') }}">Log In</a></li>
            <li class="sidebar-nav-item"><a href="signup">Register</a></li>
            <li class="sidebar-nav-item"><a href="#services">About</a></li>


    </nav>
    <!-- Header-->
    <img src="Library.png" width="50" height="50">
    <header class="masthead d-flex align-items-center">
        <div class="container px-4 px-lg-5 text-center">
            <h1 class="title mb-1">Library Management System</h1>
            <br>
            <h3 class="bookmate mb-5" style="color:rgb(116, 116, 116)"><i>BOOKMATE: Learn To Read, Read to Learn</i>
            </h3>

            {{-- <a class="btn btn-primary btn-xl" href="login">Sign In</a> --}}
            <div>
                @if (Route::has('login'))
                    @auth
                        <a class="btn btn-primary btn-xl" href="{{ route('userdashboard') }}">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-secondary btn-xl">Logout</button>
                        </form>
                    @else
                        <a class="sign btn btn-primary" style="margin-right:10px;" href="{{ route('login') }}">Sign In</a>
                        @if (Route::has('register'))
                            <a class="reg btn btn-secondary" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                @endif
            </div>




        </div>
    </header>
    <!-- About-->
    <section class="content-section bg-light" id="about" style="border-block-color: blue;">
        <div class="container px-4 px-lg-5 text-center">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-10">
                    <h2>"Books are a uniquely portable magic." – Stephen King</h2>
                    <p class="lead mb-5">
                        "Unlock a world of endless possibilities with every page you turn. Our library books are waiting
                        to inspire, educate,
                        and transport you to new adventures. Dive in and let your imagination soar!"
                    </p>
                    {{-- <a class="btn btn-dark btn-xl" href="register">Register</a> --}}
                    {{--                         
                        @if (Route::has('register'))
                            <as
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            ><a class="btn btn-primary btn-xl" href="register">Register</a>
                            
                            </a>
                        @endif --}}

                </div>
            </div>
        </div>
    </section>
    <!-- Services-->

    <section class="content-section bg-primary text-white text-center" id="services">
        <h3 class="text-secondary mb-0">Services</h3>
        <div class="container px-4 px-lg-5">
            <div class="content-section-heading">
                <h2 class="mb-5">What We Offer</h2>
            </div>
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                    <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-screen-smartphone"></i></span>
                    <h4><strong>Encouraging Engagement!</strong></h4>
                    <p class="text-faded mb-0">From fiction to non-fiction, thrillers to textbooks – we've got it all.
                        Start exploring today!</p>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                    <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-pencil"></i></span>
                    <h4><strong>Membership Perks</strong></h4>
                    <p class="text-faded mb-0">Sign up now and gain unlimited access to your favorite genres.</p>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                    <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-like"></i></span>
                    <h4><strong>Favorited</strong></h4>
                    <p class="text-faded mb-0">
                        Millions of users
                    </p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-mustache"></i></span>
                    <h4><strong>Got Questions?</strong></h4>
                    <p class="text-faded mb-0">Reach out to us for assistance or explore our FAQ!</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Callout-->
    <section class="callout">
        <div class="container px-4 px-lg-5 text-center">
            <h2 class="mx-auto mb-5">
                Welcome to
                <em>your</em>
                next website!
            </h2>
            <a class="btn btn-primary btn-xl" href="https://startbootstrap.com/theme/stylish-portfolio/">Download
                Now!</a>
        </div>
    </section>
    Portfolio
    <section class="content-section" id="portfolio">
        <div class="container px-4 px-lg-5">
            <div class="content-section-heading text-center">
                <h3 class="text-secondary mb-0">Portfolio</h3>
                <h2 class="mb-5">Recent Projects</h2>
            </div>
            <div class="row gx-0">
                <div class="col-lg-6">
                    <a class="portfolio-item" href="#!">
                        <div class="caption">
                            <div class="caption-content">
                                <div class="h2">Stationary</div>
                                <p class="mb-0">A yellow pencil with envelopes on a clean, blue backdrop!</p>
                            </div>
                        </div>
                        <img class="img-fluid" src="{{ asset('asset/img/portfolio-1.jpg') }}" alt="..." />
                    </a>
                </div>
                <div class="col-lg-6">
                    <a class="portfolio-item" href="#!">
                        <div class="caption">
                            <div class="caption-content">
                                <div class="h2">Ice Cream</div>
                                <p class="mb-0">A dark blue background with a colored pencil, a clip, and a tiny ice
                                    cream cone!</p>
                            </div>
                        </div>
                        <img class="img-fluid" src="{{ asset('asset/img/portfolio-2.jpg') }}" alt="..." />
                    </a>
                </div>
                <div class="col-lg-6">
                    <a class="portfolio-item" href="#!">
                        <div class="caption">
                            <div class="caption-content">
                                <div class="h2">Strawberries</div>
                                <p class="mb-0">Strawberries are such a tasty snack, especially with a little sugar
                                    on top!</p>
                            </div>
                        </div>
                        <img class="img-fluid" src="{{ asset('asset/img/portfolio-3.jpg') }}" alt="..." />
                    </a>
                </div>
                <div class="col-lg-6">
                    <a class="portfolio-item" href="#!">
                        <div class="caption">
                            <div class="caption-content">
                                <div class="h2">Workspace</div>
                                <p class="mb-0">A yellow workspace with some scissors, pencils, and other objects.
                                </p>
                            </div>
                        </div>
                        <img class="img-fluid" src="{{ asset('asset/img/portfolio-4.jpg') }}" alt="..." />
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->

    <section class="content-section bg-primary text-white">
        <div class="container px-4 px-lg-5 text-center">
            <h2 class="mb-4">The buttons below are impossible to resist...</h2>
            <a class="btn btn-xl btn-light me-4" href="#!">Click Me!</a>
            <a class="btn btn-xl btn-dark" href="#!">Look at Me!</a>
        </div>
    </section>
    </div>
    <!-- Footer-->
    <footer class="footer text-center">
        <div class="container px-4 px-lg-5">
            <ul class="list-inline mb-5">
                <li class="list-inline-item">
                    <a class="social-link rounded-circle text-white mr-3"
                        href="https://www.facebook.com/grace.asna"><i class="icon-social-facebook"></i></a>
                </li>
                <li class="list-inline-item">
                    <a class="social-link rounded-circle text-white mr-3" href="#!"><i
                            class="icon-social-twitter"></i></a>
                </li>
                <li class="list-inline-item">
                    <a class="social-link rounded-circle text-white" href="#!"><i
                            class="icon-social-github"></i></a>
                </li>
            </ul>
            <p class="text-muted small mb-0">Copyright &copy; BOOKMATE 2024</p>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>

</body>

</html>
