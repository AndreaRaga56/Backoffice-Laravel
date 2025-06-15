<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $words = ['Azione', 'Commedia', 'Drammatico', 'Fantascienza', 'Horror', 'Grottesco', 'Romantico', 'Thriller', 'Animazione', 'Avventura', 'Documentario', 'Storico', 'Fantasy', 'Western',];

        foreach ($words as $word) {
            $newGenre = new Genre();
            $newGenre->name = $word;
            $newGenre->save();
        }
    }
}
