@extends('layouts.app')
@section('title', 'My Playlists')
@section('content')

<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
    <h1 class="text-3xl font-bold text-white">My Playlists</h1>
    <a href="{{ route('playlists.create') }}" class="inline-block px-4 py-2 rounded-lg bg-yellow-500 text-white font-semibold hover:bg-yellow-600 transition">Add Playlist</a>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($playlists as $playlist)
        <div class="bg-white/10 backdrop-blur rounded-xl shadow-lg p-6 border border-white/20 flex flex-col h-full hover:scale-105 transition-transform">
            <h3 class="text-xl font-bold text-white mb-2">{{ $playlist->name }}</h3>
            <a href="{{ route('playlists.show', $playlist->slug) }}" class="mt-auto inline-block px-4 py-2 rounded-lg bg-yellow-500 text-white font-semibold hover:bg-yellow-600 transition">View Playlist</a>
        </div>
    @empty
        <p class="text-white">No playlists found.</p>
    @endforelse
</div>
<div class="mt-8">
    {{ $playlists->links() }}
</div>
@endsection
