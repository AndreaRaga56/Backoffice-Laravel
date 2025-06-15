<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function streamingPlatforms()
    {
        return $this->belongsToMany(StreamingPlatform::class);
    }

    protected $fillable = [
        'title',
        'director',
        'release_year',
        'description',
        'genre_id',
        'poster_url',
        'rating',
    ];
}
