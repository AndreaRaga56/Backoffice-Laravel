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
    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        $streamingPlatforms = StreamingPlatform::all();
        return view('Partials.admin-movies-edit', compact('movie', 'genres', 'streamingPlatforms'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $data = $request->all();

        if ($request->isMethod("PUT")) {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'director' => 'required|string|max:255',
                'release_year' => 'required|integer|min:1900|',
                'description' => 'nullable|string',
                'genre_id' => 'nullable|integer',
                'rating' => 'nullable|decimal:0,2|min:0|max:10',
            ]);
        } elseif ($request->isMethod("PATCH")) {
            $validated = $request->validate([
                'title' => 'sometimes|string|max:255',
                'director' => 'sometimes|string|max:255',
                'release_year' => 'sometimes|integer|min:1900|',
                'description' => 'nullable|string',
                'genre_id' => 'nullable|integer',
                'rating' => 'nullable|decimal:0,2|min:0|max:10',
            ]);
        } else {
            return redirect()->route('movies.index');
        }

        if (array_key_exists("image_action", $data)) {
            if ($data['image_action'] != 'Mantieni') {
                if ($data['image_action'] == 'Elimina') {
                    Storage::delete($movie->poster_url);
                    $validated['poster_url'] = 'https://placehold.co/270x400/0B4753/e09f3e?text=POSTER+NON+DISPONIBILE';
                } elseif ($data['image_action'] == 'Modifica') {
                    if ($request->image) {
                        Storage::delete($movie->poster_url);
                        $path = Storage::putFile('movies', $data['image']);
                        $validated['poster_url'] = $path;
                    } else {
                        return redirect()->route('movies.edit', $movie);
                    }
                }
            }
        } else {
            $validated['poster_url'] = 'https://placehold.co/270x400/0B4753/e09f3e?text=POSTER+NON+DISPONIBILE';
            if (array_key_exists("poster_url", $data)) {
                $path = Storage::putFile('movies', $data['poster_url']);
                $validated['poster_url'] = $path;
            }
        }

        $movie->update($validated);

        if ($request->has('streamingPlatforms')) {
            $movie->streamingPlatforms()->sync($data['streamingPlatforms']);
        } else {
            $movie->streamingPlatforms()->detach();
        }

        return redirect()->route('movies.show', $movie);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        if ($movie->image) {
            Storage::delete($movie->image);
        }
        $movie->streamingPlatforms()->detach();
        $movie->delete();

        return redirect()->route('movies.index');
    }
}
