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
            'success' => true,
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
        $ids = Movie::orderBy('created_at')->pluck('id')->toArray();

        $currentIndex = array_search($movie->id, $ids);

        $prevId = $currentIndex > 0 ? $ids[$currentIndex - 1] : null;
        $nextId = $currentIndex < count($ids) - 1 ? $ids[$currentIndex + 1] : null;

        $movie->prev_id = $prevId;
        $movie->next_id = $nextId;

        return response()->json([
            'success' => true,
            'data' => $movie
        ]);
    }
}
