<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaylistController;

Route::get('/', function () {
    return view('home');
});
Route::get('/search', function () {
    return view('search');
});

Route::get('/', [PlaylistController::class, 'index'])->name('home');
Route::post('/playlists', [PlaylistController::class, 'store'])->name('playlists.store');
Route::post('/playlists/{id}/delete', [PlaylistController::class, 'destroy'])->name('playlists.destroy');