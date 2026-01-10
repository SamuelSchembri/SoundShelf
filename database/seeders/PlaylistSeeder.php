<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Playlist;
use App\Models\User;
use Illuminate\Support\Str;

class PlaylistSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        if ($user) {
            $playlist = Playlist::firstOrCreate([
                'user_id' => $user->id,
                'name' => 'My Favorites',
                'slug' => Str::slug('My Favorites'),
            ]);
            // Attach all songs to the playlist
            $songIds = \App\Models\Song::pluck('id')->toArray();
            $playlist->songs()->sync($songIds);
        }
    }
}
