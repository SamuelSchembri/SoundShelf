<?php
namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SongController extends Controller
{
    public function index(Request $request)
    {
        $query = Song::query();
        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%$search%");
        }
        $songs = $query->orderBy('title')->paginate(10);
        return view('songs.index', compact('songs'));
    }

    public function create()
    {
        $albums = Album::orderBy('title')->get();
        return view('songs.create', compact('albums'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'album_id' => 'required|exists:albums,id',
            'title' => 'required',
            'track_number' => 'nullable|integer',
            'duration' => 'nullable|integer',
        ]);
        $song = Song::create($validated);
        return Redirect::route('songs.show', $song->id)->with('success', 'Song created!');
    }

    public function show(Song $song)
    {
        return view('songs.show', compact('song'));
    }

    public function edit(Song $song)
    {
        $albums = Album::orderBy('title')->get();
        return view('songs.edit', compact('song', 'albums'));
    }

    public function update(Request $request, Song $song)
    {
        $validated = $request->validate([
            'album_id' => 'required|exists:albums,id',
            'title' => 'required',
            'track_number' => 'nullable|integer',
            'duration' => 'nullable|integer',
        ]);
        $song->update($validated);
        return Redirect::route('songs.show', $song->id)->with('success', 'Song updated!');
    }

    public function destroy(Song $song)
    {
        $song->delete();
        return Redirect::route('songs.index')->with('success', 'Song deleted!');
    }
}
