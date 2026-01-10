<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Album;
use App\Models\Artist;
use Illuminate\Support\Str;

class AlbumSeeder extends Seeder
{
    public function run(): void
    {
        $albums = [
            ['artist' => 'The Weeknd', 'title' => 'After Hours', 'year' => 2020, 'genre' => 'R&B'],
            ['artist' => 'Taylor Swift', 'title' => '1989', 'year' => 2014, 'genre' => 'Pop'],
            ['artist' => 'Kendrick Lamar', 'title' => 'DAMN.', 'year' => 2017, 'genre' => 'Hip-Hop'],
            ['artist' => 'Billie Eilish', 'title' => 'Happier Than Ever', 'year' => 2021, 'genre' => 'Alternative'],
            ['artist' => 'Dua Lipa', 'title' => 'Future Nostalgia', 'year' => 2020, 'genre' => 'Pop'],
        ];
        foreach ($albums as $data) {
            $artist = Artist::where('name', $data['artist'])->first();
            if ($artist) {
                Album::firstOrCreate([
                    'artist_id' => $artist->id,
                    'title' => $data['title'],
                    'slug' => Str::slug($data['title']),
                    'year' => $data['year'],
                    'genre' => $data['genre'],
                ]);
            }
        }
    }
}
