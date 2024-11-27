@extends('layouts.usernav')

@section('content')
    <div class="col-md-10 content">
        <!-- Topbar -->
        <div class="header d-flex justify-content-between">
            <div>

                {{-- <span>12:29 PM</span><br>
            <small>Sep 02, 2023</small> --}}
            </div>
            <div class="user-info d-flex align-items-center">
                <img src="https://via.placeholder.com/35" alt="User Avatar" class="rounded-circle">
                <div class="ml-2">
                    <span>John Doe</span><br>
                    <small>User</small>
                </div>
            </div>
        </div>

        <!-- Browse Genre Section -->
        <div class="row mt-4">
            <div class="col-md-4 mb-3">
                <a href="romancegenre" class="genre-card" style="background-image: url('romance.jpg');">
                    <div class="genre-card-overlay">Romance</div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="act_adventure" class="genre-card" style="background-image: url('action_adventure.jpg');">
                    <div class="genre-card-overlay">Action & Adventure</div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="historicalgenre" class="genre-card" style="background-image: url('historical_fiction.jpg');">
                    <div class="genre-card-overlay">Historical Fiction</div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="children" class="genre-card" style="background-image: url('childrens.jpg');">
                    <div class="genre-card-overlay">Children's</div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="nonfictiongenre" class="genre-card" style="background-image: url('non_fiction.jpg');">
                    <div class="genre-card-overlay">Non-Fiction</div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="horrorgenre" class="genre-card" style="background-image: url('horror.jpg');">
                    <div class="genre-card-overlay">Horror</div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="bio_historygenre" class="genre-card" style="background-image: url('biographies.jpg');">
                    <div class="genre-card-overlay">Biographies & History</div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="literaryfic" class="genre-card" style="background-image: url('literary_fiction.jpg');">
                    <div class="genre-card-overlay">Literary Fiction</div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="mythologygenre" class="genre-card" style="background-image: url('science_fiction.jpg');">
                    <div class="genre-card-overlay">Mythology</div>
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer mt-5">
            <div class="row">
                <div class="col-md-3">
                    <h5>About Your Library</h5>
                    <ul>
                        <li><a href="#">Overview</a></li>
                        <li><a href="#">Leadership Team</a></li>
                        <li><a href="{{ url('/library-policies') }}">Library Policies</a></li>
                        <li><a href="{{ url('/faq') }}">FAQs</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Using Your Library</h5>
                    <ul>
                        <li><a href="#">Borrowing Books</a></li>
                        <li><a href="#">Library Visit Request</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Support the Library</h5>
                    <ul>
                        <li><a href="#">Volunteer</a></li>
                        <li><a href="#">Job Opportunities</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Stay Informed</h5>
                    <ul>
                        <li><a href="{{ url('/newsletter') }}">Newsletters</a></li>
                        <li><a href="#">Media Release</a></li>
                        <li><a href="#">Strategic Plan</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
