@extends('layouts.app')
@section('main')
<div class="container-fluid">

    <!-- 404 Error Text -->
    <div class="text-center">
        <div class="error mx-auto" data-text="Home">Home</div>
        {{-- <p class="lead text-gray-800 mb-5">Page Not Found</p> --}}
        <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
        <a href="{{ route('index') }}">&larr; Back to Home</a>
    </div>
</div>
@endsection