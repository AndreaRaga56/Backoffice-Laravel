<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::with('streamingPlatforms', 'genre')->get();
        $count = $movies->count();
        return response()->json([
            'success'=> true,
            'totalMovies' => $count,
            'data' => $movies
        ]);
    }

        /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        $movie->load('streamingPlatforms', 'genre');
        return response()->json([
            'success'=> true,
            'data' => $movie
        ]);
    }
}
