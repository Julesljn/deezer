<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Playlist;

class DeezerController extends Controller
{
    public function search(Request $request)
    {
        $playlists = Playlist::all(); // Récupère toutes les playlists // Paginate

        $artistName = $request->input('artist');

        // Recherche l'artiste
        $response = Http::withOptions(['verify' => false])->get("https://api.deezer.com/search/artist?q=" . urlencode($artistName));
        $artistData = $response->json();

        // Vérifie si l'artiste est trouvé
        if (isset($artistData['data'][0])) {
            $artistId = $artistData['data'][0]['id'];
            $artistName = $artistData['data'][0]['name'];
            $artistPicture = $artistData['data'][0]['picture_medium'];

            // Récupère le top 10 des musiques de l'artiste
            $topTracksResponse = Http::withOptions(['verify' => false])->get("https://api.deezer.com/artist/{$artistId}/top?limit=10");
            $topTracksData = $topTracksResponse->json();

            if (isset($topTracksData['data'])) {
                $topTracks = $topTracksData['data'];
            } else {
                $topTracks = [];
            }

            return view('search', [
                'artistName' => $artistName,
                'artistPicture' => $artistPicture,
                'topTracks' => $topTracks,
                'playlists' => $playlists // Envoie des playlists à la vue !!!!!!!!!
            ]);
        } else {
            return view('search', [
                'error' => 'Aucun artiste trouvé.',
                'playlists' => $playlists
            ]);
        }
    }
}
