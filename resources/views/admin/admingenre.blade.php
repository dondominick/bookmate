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
            width: 100%;
            border: none;
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

        .genre-card-overlay:hover {
            background-color: blueviolet;
            transition: 0.3s ease all;
        }

        .search-bar {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            width: 100%;
            max-width: 300px;
            margin-top: 10px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            grid-gap: 20px;
            padding: 20px;
            justify-content: center;
        }

        .card {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .grid {
                grid-template-columns: 1fr;
                /* Single column for smaller screens */
            }
        }
    </style>
@endsection

@section('content')
    <main class="col-md-9 col-lg-10">

        <div class="content-body">
            <h3>View Books</h3>
            <input type="text" class="search-bar" placeholder="Search by ID or Name" id="searchbar">

            <!-- Genre Cards with Links -->
            <div class="row mt-4">
                <div class="col-md-4 mb-3">
                    <button href="romance.html" class="genre-card" style="background-image: url('romance.jpg');"
                        onclick="searchGenre('romance')">
                        <div class="genre-card-overlay">Romance</div>
                    </button>
                </div>
                <div class="col-md-4 mb-3">
                    <button href="action_adventure.html" class="genre-card"
                        style="background-image: url('action_adventure.jpg');"onclick="searchGenre('action')">
                        <div class="genre-card-overlay">Action & Adventure</div>
                    </button>
                </div>
                <div class="col-md-4 mb-3">
                    <button href="historical_fiction.html" class="genre-card"
                        style="background-image: url('historical_fiction.jpg');" onclick="searchGenre('historical')">
                        <div class="genre-card-overlay">Historical Fiction</div>
                    </button>
                </div>
                <div class="col-md-4 mb-3">
                    <button href="childrens.html" class="genre-card" style="background-image: url('childrens.jpg');"
                        onclick="searchGenre('children')">
                        <div class="genre-card-overlay">Children's</div>
                    </button>
                </div>
                <div class="col-md-4 mb-3">
                    <button href="non_fiction.html" class="genre-card" style="background-image: url('non_fiction.jpg');"
                        onclick="searchGenre('non-fiction')">
                        <div class="genre-card-overlay">Non-Fiction</div>
                    </button>
                </div>
                <div class="col-md-4 mb-3">
                    <button href="horror.html" class="genre-card" style="background-image: url('horror.jpg');"
                        onclick="searchGenre('horror')">
                        <div class="genre-card-overlay">Horror</div>
                    </button>
                </div>
                <div class="col-md-4 mb-3">
                    <button href="biographies.html" class="genre-card" style="background-image: url('biographies.jpg');"
                        onclick="searchGenre('history')">
                        <div class="genre-card-overlay">Biographies & History</div>
                    </button>
                </div>
                <div class="col-md-4 mb-3">
                    <button href="literary_fiction.html" class="genre-card" onclick="searchGenre('fiction')"
                        style="background-image: url('literary_fiction.jpg');">
                        <div class="genre-card-overlay">Literary Fiction</div>
                    </button>
                </div>
                <div class="col-md-4 mb-3">
                    <button href="science_fiction.html" class="genre-card"
                        style="background-image: url('{{ asset('asset/img') }}');" onclick="searchGenre('sci-fi')">
                        <div class="genre-card-overlay">Science Fiction</div>
                    </button>
                </div>
            </div>
        </div>
        <hr>
        <form action="{{ route('search', 'search') }}" method="get" hidden id="search-form">
            @csrf
            <input type="text" name="search" id="search">
            <input type="text" name="genre" id="genre">
        </form>
        <div class="grid">
            @foreach ($books as $book)
                <div class="card" style="width: 20rem;">
                    <img class="card-img-top h-50" src="{{ asset('storage/') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $book->book_title }}</h5>
                        <h6 class="card-subtitle fw-light">{{ $book->author }}</h6>
                        <p class="card-text">
                            {{ $book->description }}
                        </p>
                        <a href="#" class="btn btn-primary">Borrow Book</a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        function searchGenre(key) {
            const form = document.getElementById('search-form');
            const input = document.getElementById('genre');
            input.value = key;

            form.submit();
        }

        function searchKey() {
            const form = document.getElementById('search-form');
            const input = document.getElementById('search');
            const val = document.getElementById('searchbar');
            input.value = val.value;
            form.submit()
        }

        document.getElementById('searchbar').addEventListener('keydown', function(e) {
            if (e.key == "Enter") {
                searchKey();
            }
        });
    </script>
@endsection
