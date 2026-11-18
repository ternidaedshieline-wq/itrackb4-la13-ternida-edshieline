<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Must stay ABOVE the resource line
Route::get('/movies/featured', [MovieController::class, 'featured'])
    ->name('movies.featured');

Route::resource('movies', MovieController::class);