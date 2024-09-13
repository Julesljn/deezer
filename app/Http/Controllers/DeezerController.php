<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DeezerController extends Controller
{
    public function search(Request $request)
    {
        $artistName = $request->input('artist'); // Nom chanteur de la barre de recherche

        // Recherche api (ne pas faire ça seulement local)
        $response = Http::withOptions(['verify' => false])->get("https://api.deezer.com/search/artist?q=" . urlencode($artistName));
            // Recupérer en même temps l'id et $topTracksResponse = Http::get("https://api.deezer.com/artist/{$artistId}/top"
        $artistData = $response->json();

        // Check
        if (isset($artistData['data'][0])) {
            $artistId = $artistData['data'][0]['id'];
            $artistName = $artistData['data'][0]['name'];
            $artistPicture = $artistData['data'][0]['picture_medium'];

            // Envoie dans le blade
            return view('search', [
                'artistName' => $artistName,
                'artistPicture' => $artistPicture,
            ]);
        } else {
            // Message d'erreur
            return view('search')->with('error', 'Aucun artiste trouvé.');
        }
    }
}

