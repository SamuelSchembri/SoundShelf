<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class CoverArtService
{
    /**
     * Fetch album cover from Cover Art Archive using MusicBrainz release-group ID.
     * @param string $releaseGroupId
     * @return string|null
     */
    public function getAlbumCover(string $releaseGroupId): ?string
    {
        $url = "https://coverartarchive.org/release-group/{$releaseGroupId}";
        $response = Http::timeout(5)->get($url);
        if ($response->successful()) {
            $data = $response->json();
            if (isset($data['images'][0]['image'])) {
                return $data['images'][0]['image'];
            }
        }
        return null;
    }
}
