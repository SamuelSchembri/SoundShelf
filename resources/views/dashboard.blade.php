@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="w-full py-8 px-4 flex flex-col items-center">
    <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4 drop-shadow-lg text-center">Welcome to <span class="text-indigo-400">SoundShelf</span></h1>
    <p class="text-lg md:text-xl text-gray-200 mb-8 text-center max-w-2xl">Your personal music library and playlist manager.<br>Discover, organize, and enjoy your favorite music with a modern, dark-themed dashboard.</p>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 w-full max-w-6xl justify-center">
        <div class="bg-white/10 backdrop-blur rounded-xl shadow-lg p-6 flex flex-col items-center border border-white/20 hover:scale-105 transition-transform">
            <div class="mb-4 flex items-center justify-center w-16 h-16 rounded-full bg-indigo-500/20">
                <svg class="w-8 h-8 text-indigo-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 19V6h13M9 6l-7 7 7 7"/></svg>
            </div>
            <h3 class="text-xl font-bold text-white mb-2">Artists</h3>
            <p class="text-gray-200 mb-4 text-center">Browse and manage your favorite artists.</p>
            <a href="{{ route('artists.index') }}" class="w-full inline-block text-center px-4 py-2 rounded-lg bg-indigo-500 text-white font-semibold hover:bg-indigo-600 transition">View Artists</a>
        </div>
        <div class="bg-white/10 backdrop-blur rounded-xl shadow-lg p-6 flex flex-col items-center border border-white/20 hover:scale-105 transition-transform">
            <div class="mb-4 flex items-center justify-center w-16 h-16 rounded-full bg-pink-500/20">
                <svg class="w-8 h-8 text-pink-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M8 12h8M12 8v8"/></svg>
            </div>
            <h3 class="text-xl font-bold text-white mb-2">Albums</h3>
            <p class="text-gray-200 mb-4 text-center">Explore albums by year, genre, or artist.</p>
            <a href="{{ route('albums.index') }}" class="w-full inline-block text-center px-4 py-2 rounded-lg bg-pink-500 text-white font-semibold hover:bg-pink-600 transition">View Albums</a>
        </div>
        <div class="bg-white/10 backdrop-blur rounded-xl shadow-lg p-6 flex flex-col items-center border border-white/20 hover:scale-105 transition-transform">
            <div class="mb-4 flex items-center justify-center w-16 h-16 rounded-full bg-blue-500/20">
                <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 19V6h13M9 6l-7 7 7 7"/><circle cx="12" cy="12" r="10"/></svg>
            </div>
            <h3 class="text-xl font-bold text-white mb-2">Songs</h3>
            <p class="text-gray-200 mb-4 text-center">Browse, add, and manage songs in your library.</p>
            <a href="{{ route('songs.index') }}" class="w-full inline-block text-center px-4 py-2 rounded-lg bg-blue-500 text-white font-semibold hover:bg-blue-600 transition">View Songs</a>
        </div>
        <div class="bg-white/10 backdrop-blur rounded-xl shadow-lg p-6 flex flex-col items-center border border-white/20 hover:scale-105 transition-transform">
            <div class="mb-4 flex items-center justify-center w-16 h-16 rounded-full bg-yellow-500/20">
                <svg class="w-8 h-8 text-yellow-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="4" y="4" width="16" height="16" rx="2"/><path d="M8 12h8"/></svg>
            </div>
            <h3 class="text-xl font-bold text-white mb-2">Playlists</h3>
            <p class="text-gray-200 mb-4 text-center">Create and manage your own playlists.</p>
            @auth
            <a href="{{ route('playlists.index') }}" class="w-full inline-block text-center px-4 py-2 rounded-lg bg-yellow-500 text-white font-semibold hover:bg-yellow-600 transition">My Playlists</a>
            @else
            <a href="{{ route('login') }}" class="w-full inline-block text-center px-4 py-2 rounded-lg bg-yellow-500 text-white font-semibold hover:bg-yellow-600 transition">Login to Access</a>
            @endauth
        </div>
    </div>
</div>
@endsection
