<?php
namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class AlbumController extends Controller
{
    public function index(Request $request)
    {
        $query = Album::query();
        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%$search%");
        }
        if ($genre = $request->input('genre')) {
            $query->where('genre', $genre);
        }
        if ($sort = $request->input('sort')) {
            $query->orderBy($sort, 'asc');
        } else {
            $query->orderBy('year', 'desc');
        }
        $albums = $query->paginate(10);
        return view('albums.index', compact('albums'));
    }

    public function create()
    {
        $artists = Artist::orderBy('name')->get();
        return view('albums.create', compact('artists'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'artist_id' => 'required|exists:artists,id',
            'title' => 'required',
            'year' => 'nullable|integer',
            'genre' => 'nullable|string',
        ]);
        $album = Album::create([
            'artist_id' => $validated['artist_id'],
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'year' => $validated['year'] ?? null,
            'genre' => $validated['genre'] ?? null,
        ]);
        return Redirect::route('albums.show', $album->slug)->with('success', 'Album created!');
    }

    public function show(Album $album)
    {
        return view('albums.show', compact('album'));
    }

    public function edit(Album $album)
    {
        $artists = Artist::orderBy('name')->get();
        return view('albums.edit', compact('album', 'artists'));
    }

    public function update(Request $request, Album $album)
    {
        $validated = $request->validate([
            'artist_id' => 'required|exists:artists,id',
            'title' => 'required',
            'year' => 'nullable|integer',
            'genre' => 'nullable|string',
        ]);
        $album->update([
            'artist_id' => $validated['artist_id'],
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'year' => $validated['year'] ?? null,
            'genre' => $validated['genre'] ?? null,
        ]);
        return Redirect::route('albums.show', $album->slug)->with('success', 'Album updated!');
    }

    public function destroy(Album $album)
    {
        $album->delete();
        return Redirect::route('albums.index')->with('success', 'Album deleted!');
    }
}
