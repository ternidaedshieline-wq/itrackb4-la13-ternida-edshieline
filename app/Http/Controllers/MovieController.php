<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $genre_id = $request->query('genre_id');

        $query = Movie::with('genre');

        if ($genre_id) {
            $query = $query->where('genre_id', $genre_id);
        }

        $movies = $query->get();
        $genres = Genre::all();

        return view('movies.index', [
            'movies'   => $movies,
            'genres'   => $genres,
            'genre_id' => $genre_id,
        ]);
    }

    public function create()
    {
        $genres = Genre::all();

        return view('movies.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'    => 'required',
            'director' => 'required',
            'year'     => 'required|integer',
            'genre_id' => 'required|exists:genres,id',
        ]);

        Movie::create($validated);

        return redirect()->route('movies.index');
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function featured()
    {
        $movies = Movie::with('genre')->where('featured', true)->get();
        $genres = Genre::all();

        return view('movies.index', [
            'movies'   => $movies,
            'genres'   => $genres,
            'genre_id' => null,
        ]);
    }

  public function edit(Movie $movie)
{
    $genres = Genre::all();

    return view('movies.edit', compact('movie', 'genres'));
}

    public function update(Request $request, Movie $movie)
{
    $validated = $request->validate([
        'title'    => 'required',
        'director' => 'required',
        'year'     => 'required|integer',
        'genre_id' => 'required|exists:genres,id',
    ]);

    $movie->update($validated);

    return redirect()->route('movies.index');
}

    public function destroy(Movie $movie)
{
    $movie->delete();

    return redirect()->route('movies.index');
}
}