<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Movie;
use App\Models\Genre;

class MovieController extends Controller
{
 public function index(Request $request)
{
    $genre_id = $request->query('genre_id');
    $search   = $request->query('search');
    $featured = $request->query('featured');
    $sort     = $request->query('sort', 'title');

    if (! in_array($sort, ['title', 'year'])) {
        $sort = 'title';
    }

    $query = Movie::with('genre');

    if ($search) {
        $query = $query->where('title', 'like', "%{$search}%");
    }

    if ($genre_id) {
        $query = $query->where('genre_id', $genre_id);
    }

    if ($featured !== null && $featured !== '') {
        $query = $query->where('featured', $featured);
    }

    $movies = $query->orderBy($sort)->paginate(8)->withQueryString();
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

        $movie = Movie::create($validated);

        Log::info('Movie saved', [
            'id' => $movie->id,
        ]);

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
    abort_if($movie->genre->movies()->count() === 1, 403);

    $movie->delete();

    return redirect()->route('movies.index');
}
}