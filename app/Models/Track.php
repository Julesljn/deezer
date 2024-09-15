<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'artist', 'deezer_id', 'album', 'duration'];

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class, 'playlist_track');
    }
}
