<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\StreamingPlatform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        return view('Partials.admin-movies-index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        $streamingPlatforms = StreamingPlatform::all();
        return view('Partials.admin-movies-create', compact('genres', 'streamingPlatforms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'release_year' => 'required|integer|min:1900|',
            'description' => 'nullable|string',
            'genre_id' => 'nullable|integer',
            'rating' => 'nullable|decimal:0,2|min:0|max:10',
        ]);

        $data = $request->all();

        $validated['poster_url'] = 'https://placehold.co/270x400/0B4753/e09f3e?text=POSTER+NON+DISPONIBILE';
        if ($request->poster_url) {
            $path = Storage::putFile('movies', $data['poster_url']);
            $validated['poster_url'] = $path;
        }

        $newMovie = new Movie;
        $newMovie->fill($validated);
        $newMovie->save();

        if ($request->has('streamingPlatforms')) {
            $newMovie->streamingPlatforms()->attach($data['streamingPlatforms']);
        }

        return redirect()->route('movies.show', $newMovie);
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {

        return view('Partials.admin-movies-show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('Partials.admin-movies-edit');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
