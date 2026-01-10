<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\PlaylistController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Artists
Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');
Route::get('/artists/create', [ArtistController::class, 'create'])->name('artists.create');
Route::post('/artists', [ArtistController::class, 'store'])->name('artists.store');
Route::get('/artists/{artist:slug}', [ArtistController::class, 'show'])->name('artists.show');
Route::get('/artists/{artist:slug}/edit', [ArtistController::class, 'edit'])->name('artists.edit');
Route::put('/artists/{artist:slug}', [ArtistController::class, 'update'])->name('artists.update');
Route::delete('/artists/{artist:slug}', [ArtistController::class, 'destroy'])->name('artists.destroy');

// Albums
Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');
Route::get('/albums/create', [AlbumController::class, 'create'])->name('albums.create');
Route::post('/albums', [AlbumController::class, 'store'])->name('albums.store');
Route::get('/albums/{album:slug}', [AlbumController::class, 'show'])->name('albums.show');
Route::get('/albums/{album:slug}/edit', [AlbumController::class, 'edit'])->name('albums.edit');
Route::put('/albums/{album:slug}', [AlbumController::class, 'update'])->name('albums.update');
Route::delete('/albums/{album:slug}', [AlbumController::class, 'destroy'])->name('albums.destroy');

// Songs
Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
Route::get('/songs/create', [SongController::class, 'create'])->name('songs.create');
Route::post('/songs', [SongController::class, 'store'])->name('songs.store');
Route::get('/songs/{song}', [SongController::class, 'show'])->name('songs.show');
Route::get('/songs/{song}/edit', [SongController::class, 'edit'])->name('songs.edit');
Route::put('/songs/{song}', [SongController::class, 'update'])->name('songs.update');
Route::delete('/songs/{song}', [SongController::class, 'destroy'])->name('songs.destroy');

// Playlists (user-specific, slug-based)
Route::middleware(['auth'])->group(function () {
    Route::get('/playlists', [PlaylistController::class, 'index'])->name('playlists.index');
    Route::get('/playlists/create', [PlaylistController::class, 'create'])->name('playlists.create');
    Route::post('/playlists', [PlaylistController::class, 'store'])->name('playlists.store');
    Route::get('/playlists/{playlist:slug}', [PlaylistController::class, 'show'])->name('playlists.show');
    Route::get('/playlists/{playlist:slug}/edit', [PlaylistController::class, 'edit'])->name('playlists.edit');
    Route::put('/playlists/{playlist:slug}', [PlaylistController::class, 'update'])->name('playlists.update');
    Route::delete('/playlists/{playlist:slug}', [PlaylistController::class, 'destroy'])->name('playlists.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
