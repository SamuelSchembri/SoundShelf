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
        // this code is for searching and paginating artists
        $query = Artist::query();
        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%$search%");
        }
        $artists = $query->orderBy('name')->paginate(10);
        return view('artists.index', compact('artists'));
    }

    public function create() // Show form to create a new artist
    {
        return view('artists.create');
    }

    public function store(Request $request, MusicBrainzService $musicBrainz) 
    // Handle form submission to store a new artist
    {
        $validated = $request->validate([
            'name' => 'required|unique:artists,name',
        ]);

        // External validation with MusicBrainz
        $mbResponse = $musicBrainz->artistExists($validated['name']); // returns array with 'id' and 'name', false, or error message
        if (!is_array($mbResponse) || !isset($mbResponse['id'])) { // Artist not found or error
            $errorMsg = $mbResponse === false 
                ? 'Artist not found on MusicBrainz. Please check the spelling or try another name.' // ? artist not found
                : $mbResponse; // some error message from service
            return back()->withErrors(['name' => $errorMsg])->withInput();
        }

        $artist = Artist::create([ // Create artist in local DB
            'name' => $validated['name'], // use the name as provided by user
            'slug' => Str::slug($validated['name']), // generate slug from name
        ]);
        return Redirect::route('artists.show', $artist->slug)->with('success', 'Artist created!'); // Redirect to artist page
    }

    public function show(Artist $artist) // Show artist details
    {
        return view('artists.show', compact('artist')); 
    }

    public function edit(Artist $artist)// Show form to edit an existing artist
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
