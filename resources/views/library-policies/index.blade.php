@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Library Policies</h1>
    <p class="text-muted text-center">Below are the policies to ensure a great experience for all library members.</p>

    <div class="accordion" id="libraryPoliciesAccordion">
        @foreach($policies as $policy)
        <div class="card my-2">
            <div class="card-header" id="heading{{ $policy->id }}">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $policy->id }}" aria-expanded="true" aria-controls="collapse{{ $policy->id }}">
                        {{ $policy->title }}
                    </button>
                </h5>
            </div>

            <div id="collapse{{ $policy->id }}" class="collapse" aria-labelledby="heading{{ $policy->id }}" data-parent="#libraryPoliciesAccordion">
                <div class="card-body">
                    {{ $policy->description }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
