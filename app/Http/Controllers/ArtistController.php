<?php
namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use App\Services\MusicBrainzService;

class ArtistController extends Controller
{
    public function index(Request $request)
    {
        $query = Artist::query();
        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%$search%");
        }
        $artists = $query->orderBy('name')->paginate(10);
        return view('artists.index', compact('artists'));
    }

    public function create()
    {
        return view('artists.create');
    }

    public function store(Request $request, MusicBrainzService $musicBrainz)
    {
        $validated = $request->validate([
            'name' => 'required|unique:artists,name',
        ]);

        // External validation with MusicBrainz

        $mbResponse = $musicBrainz->artistExists($validated['name']);
        if (!is_array($mbResponse) || !isset($mbResponse['id'])) {
            $errorMsg = $mbResponse === false
                ? 'Artist not found on MusicBrainz. Please check the spelling or try another name.'
                : $mbResponse;
            return back()->withErrors(['name' => $errorMsg])->withInput();
        }

        $portraitUrl = null;

        $artist = Artist::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);
        return Redirect::route('artists.show', $artist->slug)->with('success', 'Artist created!');
    }

    public function show(Artist $artist)
    {
        return view('artists.show', compact('artist'));
    }

    public function edit(Artist $artist)
    {
        return view('artists.edit', compact('artist'));
    }

    public function update(Request $request, Artist $artist)
    {
        $validated = $request->validate([
            'name' => 'required|unique:artists,name,' . $artist->id,
        ]);
        $artist->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);
        return Redirect::route('artists.show', $artist->slug)->with('success', 'Artist updated!');
    }

    public function destroy(Artist $artist)
    {
        $artist->delete();
        return Redirect::route('artists.index')->with('success', 'Artist deleted!');
    }
}
