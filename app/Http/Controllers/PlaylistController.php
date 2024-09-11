<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use Illuminate\Support\Facades\Storage;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Playlist::all(); // Récupère toutes les playlists depuis la bdd
        return view('home', compact('playlists'));
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

}
