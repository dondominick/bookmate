@extends('layouts.app')

@section('content')
<div class="container my-5">
    <!-- Page Title -->
    <h1 class="text-center mb-4">Library Newsletters</h1>
    <p class="text-center text-muted">
        Stay updated with the latest news and events from our library. Subscribe to our newsletter to receive updates directly to your inbox!
    </p>

    <!-- Subscription Form -->
    <div class="card mb-5">
        <div class="card-body">
            <h4 class="card-title text-center mb-4">Subscribe to Our Newsletter</h4>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form method="POST" action="{{ route('subscribe') }}">
                @csrf
                <div class="form-row justify-content-center">
                    <div class="col-md-6 mb-3">
                        <input 
                            type="email" 
                            name="email" 
                            class="form-control" 
                            placeholder="Enter your email" 
                            required
                        >
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Subscribe</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Past Newsletters -->
    <h3 class="mb-4">Previous Newsletters</h3>
    <div class="row">
        @forelse($newsletters as $newsletter)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $newsletter->title }}</h5>
                    <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($newsletter->description, 100) }}</p>
                    <a href="{{ route('newsletter.view', $newsletter->id) }}" class="btn btn-outline-primary btn-sm">Read More</a>
                </div>
                <div class="card-footer text-muted">
                    Published on {{ $newsletter->created_at->format('F j, Y') }}
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <p class="text-muted">No newsletters available at the moment.</p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $newsletters->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
