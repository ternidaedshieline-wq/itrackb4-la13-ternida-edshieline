<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        $a = Genre::create(['name' => 'Sci-Fi']);
        $b = Genre::create(['name' => 'Action']);
        $c = Genre::create(['name' => 'Crime']);

        $movies = [
            ['The Matrix', 'Lana Wachowski', 1999, $a, true],
            ['Blade Runner', 'Ridley Scott', 1982, $a, false],
            ['Interstellar', 'Christopher Nolan', 2014, $a, true],
            ['The Martian', 'Ridley Scott', 2015, $a, false],
            ['Arrival', 'Denis Villeneuve', 2016, $a, false],
            ['Inception', 'Christopher Nolan', 2010, $a, true],
            ['Dune', 'Denis Villeneuve', 2021, $a, true],
            ['Mad Max: Fury Road', 'George Miller', 2015, $b, true],
            ['Die Hard', 'John McTiernan', 1988, $b, false],
            ['John Wick', 'Chad Stahelski', 2014, $b, true],
            ['The Dark Knight', 'Christopher Nolan', 2008, $b, true],
            ['Gladiator', 'Ridley Scott', 2000, $b, false],
            ['Top Gun: Maverick', 'Joseph Kosinski', 2022, $b, false],
            ['The Raid', 'Gareth Evans', 2011, $b, false],
            ['The Godfather', 'Francis Ford Coppola', 1972, $c, true],
            ['Heat', 'Michael Mann', 1995, $c, false],
            ['Se7en', 'David Fincher', 1995, $c, false],
            ['Pulp Fiction', 'Quentin Tarantino', 1994, $c, true],
            ['The Departed', 'Martin Scorsese', 2006, $c, false],
            ['Goodfellas', 'Martin Scorsese', 1990, $c, false],
            ['Zodiac', 'David Fincher', 2007, $c, false],
        ];

        foreach ($movies as [$title, $director, $year, $genre, $featured]) {
            Movie::create([
                'title'    => $title,
                'director' => $director,
                'year'     => $year,
                'genre_id' => $genre->id,
                'featured' => $featured,
            ]);
        }
    }
}