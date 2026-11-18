@extends('layouts.app')

@section('title', 'Movies')

@section('content')

<div class="container mt-4">

    <h1>Movies</h1>

    <div class="mb-3">

        <a href="{{ route('movies.index') }}"
           class="btn btn-secondary">
            All Movies
        </a>

        <a href="{{ route('movies.featured') }}"
           class="btn btn-primary">
            Featured
        </a>

        @foreach ($genres as $g)
            <a href="{{ route('movies.index', ['genre_id' => $g->id]) }}"
               class="btn btn-info">
                {{ $g->name }}
            </a>
        @endforeach

    </div>


    <div class="card mb-4">

        <div class="card-header">
            Search and Filter Movies
        </div>

        <div class="card-body">

            <form method="GET" action="{{ route('movies.index') }}">
                <div class="row g-2">

                    <div class="col-md-3">
                        <label class="form-label">Search title</label>
                        <input type="text" name="search" value="{{ request('search') }}"
                               class="form-control" placeholder="Search movie...">
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Genre</label>
                        <select name="genre_id" class="form-select">
                            <option value="">All Genres</option>
                            @foreach ($genres as $g)
                                <option value="{{ $g->id }}"
                                    @selected(request('genre_id') == $g->id)>{{ $g->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Featured</label>
                        <select name="featured" class="form-select">
                            <option value="">Any</option>
                            <option value="1" @selected(request('featured') === '1')>Featured only</option>
                            <option value="0" @selected(request('featured') === '0')>Not featured</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Sort by</label>
                        <select name="sort" class="form-select">
                            <option value="title" @selected(request('sort', 'title') === 'title')>Title</option>
                            <option value="year" @selected(request('sort') === 'year')>Year</option>
                        </select>
                    </div>

                    <div class="col-md-3 d-flex align-items-end gap-2">
                        <button class="btn btn-primary">Apply</button>
                        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Clear</a>
                    </div>

                </div>
            </form>

        </div>

    </div>


    <h2>All Movies</h2>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Director</th>
                <th>Genre</th>
                <th>Year</th>
                <th>Action</th>
            </tr>

        </thead>

        <tbody>

            @forelse ($movies as $movie)

                <tr>

                    <td>{{ $movie->id }}</td>

                    <td>{{ $movie->title }}</td>

                    <td>{{ $movie->director }}</td>

                    <td>{{ $movie->genre->name }}</td>

                    <td>{{ $movie->year }}</td>

                    <td>
                        <a href="{{ route('movies.show', $movie) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('movies.edit', $movie) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('movies.destroy', $movie) }}" method="POST"
                              onsubmit="return confirm('Delete this movie?')" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6"
                        class="text-center">
                        No movies found.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

    {{ $movies->links() }}

    <div class="text-center mt-4">

        <a
            href="{{ route('movies.create') }}"
            class="btn btn-success btn-lg">
            + Add Movie
        </a>

    </div>


    <div class="text-center mt-5 mb-3">

        <p>
            Prepared by:
            <strong>Edshieline kaye</strong>
        </p>

    </div>

</div>

@endsection