<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\PlaylistController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Artists full CRUD
Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');
Route::get('/artists/create', [ArtistController::class, 'create'])->name('artists.create');
Route::post('/artists', [ArtistController::class, 'store'])->name('artists.store');
Route::get('/artists/{artist:slug}', [ArtistController::class, 'show'])->name('artists.show');
Route::get('/artists/{artist:slug}/edit', [ArtistController::class, 'edit'])->name('artists.edit');
Route::put('/artists/{artist:slug}', [ArtistController::class, 'update'])->name('artists.update');
Route::delete('/artists/{artist:slug}', [ArtistController::class, 'destroy'])->name('artists.destroy');

// Albums full CRUD
Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');
Route::get('/albums/create', [AlbumController::class, 'create'])->name('albums.create');
Route::post('/albums', [AlbumController::class, 'store'])->name('albums.store');
Route::get('/albums/{album:slug}', [AlbumController::class, 'show'])->name('albums.show');
Route::get('/albums/{album:slug}/edit', [AlbumController::class, 'edit'])->name('albums.edit');
Route::put('/albums/{album:slug}', [AlbumController::class, 'update'])->name('albums.update');
Route::delete('/albums/{album:slug}', [AlbumController::class, 'destroy'])->name('albums.destroy');

// Songs full CRUD
Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
Route::get('/songs/create', [SongController::class, 'create'])->name('songs.create');
Route::post('/songs', [SongController::class, 'store'])->name('songs.store');
Route::get('/songs/{song}', [SongController::class, 'show'])->name('songs.show');
Route::get('/songs/{song}/edit', [SongController::class, 'edit'])->name('songs.edit');
Route::put('/songs/{song}', [SongController::class, 'update'])->name('songs.update');
Route::delete('/songs/{song}', [SongController::class, 'destroy'])->name('songs.destroy');

// Playlists (user-specific, slug-based) full CRUD
Route::middleware(['auth'])->group(function () {
    Route::get('/playlists', [PlaylistController::class, 'index'])->name('playlists.index');
    Route::get('/playlists/create', [PlaylistController::class, 'create'])->name('playlists.create');
    Route::post('/playlists', [PlaylistController::class, 'store'])->name('playlists.store');
    Route::get('/playlists/{playlist:slug}', [PlaylistController::class, 'show'])->name('playlists.show');
    Route::get('/playlists/{playlist:slug}/edit', [PlaylistController::class, 'edit'])->name('playlists.edit');
    Route::put('/playlists/{playlist:slug}', [PlaylistController::class, 'update'])->name('playlists.update');
    Route::delete('/playlists/{playlist:slug}', [PlaylistController::class, 'destroy'])->name('playlists.destroy');
});

// Dashboard for authenticated users
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Profile Management Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php'; // makes auth routes available
