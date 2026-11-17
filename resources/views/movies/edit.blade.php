@extends('layouts.app')

@section('title', 'Edit Movie')

@section('content')

<div class="container mt-4">

    <h1>Edit Movie</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('movies.update', $movie) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title"
                   value="{{ old('title', $movie->title) }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Director</label>
            <input type="text" name="director"
                   value="{{ old('director', $movie->director) }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Year</label>
            <input type="number" name="year"
                   value="{{ old('year', $movie->year) }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Genre</label>
            <select name="genre_id" class="form-select">
                <option value="">-- Select genre --</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}"
                        @selected(old('genre_id', $movie->genre_id) == $genre->id)>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Cancel</a>
    </form>

</div>

@endsection