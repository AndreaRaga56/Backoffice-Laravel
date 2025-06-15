<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StreamingPlatform;
use GuzzleHttp\Psr7\Stream;
use Illuminate\Http\Request;

class StreamingPlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $streamingPlatforms = StreamingPlatform::all();
        return view('Partials.admin-streaming-platforms', compact('streamingPlatforms'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:streaming_platforms,name',
        ]);

        $newPlatform = new StreamingPlatform;
        $newPlatform->fill($validated);
        $newPlatform->save();

        return redirect()->route('streaming-platforms.index');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StreamingPlatform $streamingPlatform)
    {
        if ($request->isMethod("PUT")) {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:streaming_platforms,name,',
            ]);
        } else {
            return redirect()->route('streaming-platforms.index');
        }

        $streamingPlatform->update($validated);

        return redirect()->route('streaming-platforms.index');
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StreamingPlatform $streamingPlatform)
    {
        $streamingPlatform->movies()->detach();
        $streamingPlatform->delete();
        return redirect()->route('streaming-platforms.index');
    }
}
