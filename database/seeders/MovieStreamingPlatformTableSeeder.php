<?php

namespace Database\Seeders;

use App\Models\MovieStreamingPlatform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieStreamingPlatformTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 9; $i++) {
            $numberOfPlatforms4ThisMovie = rand(1, 3);
            $alreadyUsedPlatforms = [];
            for ($j = 0; $j < $numberOfPlatforms4ThisMovie; $j++) {
                do {
                    $actualPlatform = rand(1, 8);
                } while (in_array($actualPlatform, $alreadyUsedPlatforms));
                $alreadyUsedPlatforms[] = $actualPlatform;

                $newMoviePlatformRelation = new MovieStreamingPlatform();
                $newMoviePlatformRelation->movie_id = $i;
                $newMoviePlatformRelation->streaming_platform_id = $actualPlatform;
                $newMoviePlatformRelation->save();
            }
        }
    }
}
