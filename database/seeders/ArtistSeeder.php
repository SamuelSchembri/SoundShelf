<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artist;
use Illuminate\Support\Str;

class ArtistSeeder extends Seeder
{
    public function run(): void
    {
        $artists = [
            'The Weeknd',
            'Taylor Swift',
            'Kendrick Lamar',
            'Billie Eilish',
            'Dua Lipa',
        ];
        foreach ($artists as $name) {
            Artist::firstOrCreate([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        }
    }
}
