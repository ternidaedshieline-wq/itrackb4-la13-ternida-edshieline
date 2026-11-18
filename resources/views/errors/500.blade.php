@extends('layouts.app')

@section('title', 'Something went wrong')

@section('content')
<div class="container mt-5 text-center">
    <h1>Something went wrong on our side</h1>
    <p>The error has been recorded and we are looking into it. Please try again in a moment.</p>
    <a href="{{ url('/') }}" class="btn btn-primary">Go to the home page</a>
</div>
@endsection