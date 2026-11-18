@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container mt-4">

    <div class="p-5 mb-4 bg-light rounded-3">
        <h2>Find, track and manage your favourite films</h2>
        <p>Browse the collection by genre, search by title, and keep the list up to date.</p>
        <a href="{{ route('movies.index') }}" class="btn btn-primary">Browse the movies</a>
    </div>

    <div class="row text-center mb-4">
        <div class="col-md-6">
            <div class="card"><div class="card-body">
                <h3>{{ $movieCount }}</h3>
                <p class="mb-0">Movies in the collection</p>
            </div></div>
        </div>
        <div class="col-md-6">
            <div class="card"><div class="card-body">
                <h3>{{ $genreCount }}</h3>
                <p class="mb-0">Genres</p>
            </div></div>
        </div>
    </div>

    <div class="d-flex align-items-center gap-3 mb-4">
        <img src="{{ asset('img/profile.jpg') }}" width="96" height="96" class="rounded-circle">
        <div>
            <strong>Edshieline Kaye Ternida</strong><br>
            BSIT, Year 2, Block 4C
        </div>
    </div>

</div>
@endsection