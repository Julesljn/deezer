<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use App\Models\Track;
use Illuminate\Support\Facades\Storage;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Playlist::all(); // Récupère toutes les playlists depuis la bdd // Paginate
        return view('home', compact('playlists'));
    }
    public function pSearch()
    {
        $playlists = Playlist::all(); // Récupère toutes les playlists depuis la bdd
        return view('search', compact('playlists'));
    }


    public function store(Request $request) // Ajoute la playlist en bdd
    {
        $request->validate([
            'playlist_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('playlists_images', 'public');
        }

        Playlist::create([
            'name' => $request->input('playlist_name'),
            'image' => $imagePath,
        ]);

        return redirect()->route('home')->with('success', 'Playlist créée avec succès');
    }


    public function destroy($id) // Supprime la playlist de la bdd
    {
        $playlist = Playlist::findOrFail($id);
        if ($playlist->image) {
            Storage::disk('public')->delete($playlist->image);
        }
        $playlist->delete();
        return redirect()->route('home')->with('success', 'Playlist supprimée avec succès');

    }

    public function addTrack(Request $request)
    {
        $validated = $request->validate([
            'track_title' => 'required|string',
            'artist_name' => 'required|string',
            'deezer_id' => 'required|string',
            'playlist_id' => 'required|exists:playlists,id',
        ]);

        $track = Track::firstOrCreate([ // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!///////////\\\\\\\\\
            'deezer_id' => $validated['deezer_id'],
        ], [
            'title' => $validated['track_title'],
            'artist' => $validated['artist_name'],
        ]);

        // Récupérer la playlist
        $playlist = Playlist::find($validated['playlist_id']);

        // Ajouter la track à la playlist
        if (!$playlist->tracks->contains($track->id)) {
            $playlist->tracks()->attach($track->id);
        }

        return redirect()->back()->with('success', 'Musique ajoutée à la playlist !');
    }

}
