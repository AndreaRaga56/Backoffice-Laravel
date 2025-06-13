<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StreamingPlatform extends Model
{
    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }

    protected $fillable = [
        'name',
    ];
}
