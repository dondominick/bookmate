@extends('layouts.adminnav')
@section('head')
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f3f3f3;
        }


        .content-body {
            padding: 20px;
        }

        .genre-card {
            position: relative;
            background-size: cover;
            background-position: center;
            color: white;
            font-size: 1.2em;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 150px;
            border-radius: 8px;
            overflow: hidden;
            text-transform: uppercase;
            text-decoration: none;
        }

        .genre-card-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .search-bar {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            width: 100%;
            max-width: 300px;
            margin-top: 10px;
        }
    </style>
@endsection

@section('content')
    <main class="col-md-9 col-lg-10">

        <div class="content-body">
            <h3>View Books</h3>
            <input type="text" class="search-bar" placeholder="Search by ID or Name">

            <!-- Genre Cards with Links -->
            <div class="row mt-4">
                <div class="col-md-4 mb-3">
                    <a href="romance.html" class="genre-card" style="background-image: url('romance.jpg');">
                        <div class="genre-card-overlay">Romance</div>
                    </a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="action_adventure.html" class="genre-card"
                        style="background-image: url('action_adventure.jpg');">
                        <div class="genre-card-overlay">Action & Adventure</div>
                    </a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="historical_fiction.html" class="genre-card"
                        style="background-image: url('historical_fiction.jpg');">
                        <div class="genre-card-overlay">Historical Fiction</div>
                    </a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="childrens.html" class="genre-card" style="background-image: url('childrens.jpg');">
                        <div class="genre-card-overlay">Children's</div>
                    </a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="non_fiction.html" class="genre-card" style="background-image: url('non_fiction.jpg');">
                        <div class="genre-card-overlay">Non-Fiction</div>
                    </a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="horror.html" class="genre-card" style="background-image: url('horror.jpg');">
                        <div class="genre-card-overlay">Horror</div>
                    </a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="biographies.html" class="genre-card" style="background-image: url('biographies.jpg');">
                        <div class="genre-card-overlay">Biographies & History</div>
                    </a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="literary_fiction.html" class="genre-card"
                        style="background-image: url('literary_fiction.jpg');">
                        <div class="genre-card-overlay">Literary Fiction</div>
                    </a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="science_fiction.html" class="genre-card" style="background-image: url('science_fiction.jpg');">
                        <div class="genre-card-overlay">Science Fiction</div>
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
