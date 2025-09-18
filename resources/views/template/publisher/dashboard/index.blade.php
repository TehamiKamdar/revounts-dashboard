@extends("layouts.publisher.panel_app")

@pushonce('styles')

@endpushonce

@pushonce('scripts')
@endpushonce

@section("content")

    @if(auth()->user()->status == "active")
        @include("template.publisher.dashboard.active")
    @else
        @include("template.publisher.dashboard.not_active")
    @endif

@endsection
