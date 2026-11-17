<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre;

class MovieSeeder extends Seeder
{
    public function run(): void
    {

        $romance = Genre::create([
            'name' => 'Romance'
        ]);

        $drama = Genre::create([
            'name' => 'Drama'
        ]);

        $comedy = Genre::create([
            'name' => 'Comedy'
        ]);

       
        Movie::create([
            'title' => 'The House of Us',
            'director' => 'Mae Cruz-Alviar',
            'year' => 2018,
            'featured' => 1,
            'genre_id' => $romance->id,
        ]);

        Movie::create([
            'title' => 'Hello, Love, Goodbye',
            'director' => 'Cathy Garcia-Sampana',
            'year' => 2019,
            'featured' => 1,
            'genre_id' => $drama->id,
        ]);

        Movie::create([
            'title' => 'Four Sisters and a Wedding',
            'director' => 'Cathy Garcia-Molina',
            'year' => 2013,
            'featured' => 0,
            'genre_id' => $drama->id,
        ]);

        Movie::create([
            'title' => 'The Super Parental Guardians',
            'director' => 'Joyce Bernal',
            'year' => 2016,
            'featured' => 0,
            'genre_id' => $comedy->id,
        ]);

        Movie::create([
            'title' => 'My Ex and Whys',
            'director' => 'Cathy Garcia-Molina',
            'year' => 2017,
            'featured' => 0,
            'genre_id' => $romance->id,
        ]);
    }
}
