<?php

namespace Database\Seeders;

use App\Models\StreamingPlatform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StreamingPlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $words = ['Netflix', 'Infinity', 'NowTV', 'HBO MAX', 'AppleTV+', 'Amazon Prime', 'Disney+', 'RaiPlay'];

        foreach ($words as $word) {
            $newPlatform = new StreamingPlatform();
            $newPlatform->name = $word;
            $newPlatform->save();
        }
    }
}
