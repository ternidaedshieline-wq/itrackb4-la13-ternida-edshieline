<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', [MovieController::class, 'index']);

// Must stay ABOVE the resource line, or "featured" is read as {movie}
Route::get('/movies/featured', [MovieController::class, 'featured'])
    ->name('movies.featured');

Route::resource('movies', MovieController::class);