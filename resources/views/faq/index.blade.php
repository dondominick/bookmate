@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="text-center my-4">Frequently Asked Questions</h1>


<div class="accordion" id="faqAccordion">
    @forelse($faqs as $faq)
    <div class="card">
        <div class="card-header" id="heading{{ $faq->id }}">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $faq->id }}" aria-expanded="true" aria-controls="collapse{{ $faq->id }}">
                    {{ $faq->question }}
                </button>
            </h2>
        </div>
        <div id="collapse{{ $faq->id }}" class="collapse" aria-labelledby="heading{{ $faq->id }}" data-parent="#faqAccordion">
            <div class="card-body">
                {{ $faq->answer }}
            </div>
        </div>
    </div>
    @empty
    <p class="text-center my-4">No FAQs available at the moment.</p>
    @endforelse
</div>
@endsection