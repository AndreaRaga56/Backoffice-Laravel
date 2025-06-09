<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            [
                'title' => 'Inception',
                'director' => 'Christopher Nolan',
                'release_year' => 2010,
                'description' => 'Un ladro che ruba segreti aziendali attraverso l\'uso della tecnologia del sogno condiviso.',
                'genre_id' => 4,
                'rating' => 8.8,
            ],
            [
                'title' => 'The Matrix',
                'director' => 'Lana Wachowski, Lilly Wachowski',
                'release_year' => 1999,
                'description' => 'Un hacker informatico scopre la vera natura della sua realtà e il suo ruolo nella guerra contro i suoi controllori.',
                'genre_id' => 4,
                'rating' => 8.7,
            ],
            [
                'title' => 'Interstellar',
                'director' => 'Christopher Nolan',
                'release_year' => 2014,
                'description' => "Una squadra di esploratori viaggia attraverso un wormhole nello spazio nel tentativo di garantire la sopravvivenza dell'umanità.",
                'genre_id' => 4,
                'rating' => 8.6,
            ],
            [
                'title'=> 'Il Padrino',
                'director' => 'Francis Ford Coppola',
                'release_year' => 1972,
                'description' => "L'anziano patriarca di una dinastia criminale trasferisce il controllo del suo impero clandestino al figlio riluttante.",
                'genre_id' => 3,
                'rating' => 9.2,
            ],
            [
                'title' => 'Pulp Fiction',
                'director' => 'Quentin Tarantino',
                'release_year' => 1994,
                'description' => 'Le vite di due gangster, un pugile, una moglie di gangster e due rapinatori si intrecciano in quattro racconti di violenza e redenzione.',
                'genre_id' => 3,
                'rating' => 8.9,
            ],
            [
                'title' => 'Forrest Gump',
                'director' => 'Robert Zemeckis',
                'release_year' => 1994,
                'description' => 'La storia di un uomo semplice con un cuore puro che attraversa decenni di storia americana.',
                'genre_id' => 2,
                'rating' => 8.8,
            ],
            [
                'title' => 'La vita è bella',
                'director' => 'Roberto Benigni',
                'release_year' => 1997,
                'description' => 'Un padre usa l\'immaginazione per proteggere il figlio dagli orrori di un campo di concentramento nazista.',
                'genre_id' => 2,
                'rating' => 8.6,
            ],
            [
                'title' => 'Fight Club',
                'director' => 'David Fincher',
                'release_year' => 1999,
                'description' => 'Un uomo insoddisfatto forma un club di lotta sotterraneo con uno strano sapone artigianale.',
                'genre_id' => 3,
                'rating' => 8.8,
            ],
        ];

        foreach ($movies as $movie) {
            $newMovie = new Movie();
            $newMovie->title = $movie['title'];
            $newMovie->director = $movie['director'];
            $newMovie->release_year = $movie['release_year'];
            $newMovie->description = $movie['description'];
            $newMovie->genre_id = $movie['genre_id'];
            if (isset($movie['poster_url'])) {
                $newMovie->poster_url = $movie['poster_url'];
            }
            if (!isset($movie['rating'])) {
                $newMovie->rating = 0;
            }
            $newMovie->save();
        }
    }
}
