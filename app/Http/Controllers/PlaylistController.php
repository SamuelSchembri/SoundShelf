<?php
namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Gate;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Auth::user()->playlists()->orderBy('name')->paginate(10);
        return view('playlists.index', compact('playlists'));
    }

    public function create()
    {
        return view('playlists.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);
        $playlist = Auth::user()->playlists()->create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);
        return Redirect::route('playlists.show', $playlist->slug)->with('success', 'Playlist created!');
    }

    public function show(Playlist $playlist)
    {
        Gate::authorize('view', $playlist);
        $songs = $playlist->songs()->orderBy('title')->get();
        return view('playlists.show', compact('playlist', 'songs'));
    }

    public function edit(Playlist $playlist)
    {
        Gate::authorize('update', $playlist);
        $songs = Song::orderBy('title')->get();
        return view('playlists.edit', compact('playlist', 'songs'));
    }

    public function update(Request $request, Playlist $playlist)
    {
        Gate::authorize('update', $playlist);
        $validated = $request->validate([
            'name' => 'required',
            'song_ids' => 'array',
            'song_ids.*' => 'exists:songs,id',
        ]);
        $playlist->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);
        $playlist->songs()->sync($validated['song_ids'] ?? []);
        return Redirect::route('playlists.show', $playlist->slug)->with('success', 'Playlist updated!');
    }

    public function destroy(Playlist $playlist)
    {
        Gate::authorize('delete', $playlist);
        $playlist->delete();
        return Redirect::route('playlists.index')->with('success', 'Playlist deleted!');
    }
}
