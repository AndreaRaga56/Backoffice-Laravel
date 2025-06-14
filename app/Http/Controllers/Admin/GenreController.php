<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all();
        return view('Partials.admin-genres', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:genres,name',
        ]);

        $newGenre = new Genre;
        $newGenre->fill($validated);
        $newGenre->save();

        return redirect()->route('genres.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        if ($request->isMethod("PUT")) {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:genres,name,' . $genre->id,
            ]);
        } else {
            return redirect()->route('genres.index');
        }

        if ($validated['name'] == null) {
            return redirect()->route('genres.index');
        }

        $genre->update($validated);

        return redirect()->route('genres.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->movies()->update(['genre_id' => null]);
        $genre->delete();
        return redirect()->route('genres.index');
    }
}
