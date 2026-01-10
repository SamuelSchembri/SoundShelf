<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Album;
use App\Models\Song;

class SongSeeder extends Seeder
{
    public function run(): void
    {
        $songs = [
            ['album' => 'After Hours', 'title' => 'Blinding Lights', 'track_number' => 1, 'duration' => 200],
            ['album' => '1989', 'title' => 'Blank Space', 'track_number' => 2, 'duration' => 231],
            ['album' => 'DAMN.', 'title' => 'HUMBLE.', 'track_number' => 1, 'duration' => 177],
            ['album' => 'Happier Than Ever', 'title' => 'Your Power', 'track_number' => 7, 'duration' => 245],
            ['album' => 'Future Nostalgia', 'title' => 'Levitating', 'track_number' => 5, 'duration' => 203],
        ];
        foreach ($songs as $data) {
            $album = Album::where('title', $data['album'])->first();
            if ($album) {
                Song::firstOrCreate([
                    'album_id' => $album->id,
                    'title' => $data['title'],
                    'track_number' => $data['track_number'],
                    'duration' => $data['duration'],
                ]);
            }
        }
    }
}
