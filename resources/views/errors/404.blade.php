@extends('layouts.app')

@section('title', 'Page not found')

@section('content')
<div class="container mt-5 text-center">
    <h1>Page not found</h1>
    <p>We could not find that movie. Check the address, or go back to the list.</p>
    <a href="{{ route('movies.index') }}" class="btn btn-primary">Back to the list</a>
</div>
@endsection