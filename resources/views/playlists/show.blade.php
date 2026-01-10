@extends('layouts.app')
@section('title', $playlist->name)
@section('content')
<div class="max-w-2xl mx-auto bg-white/10 backdrop-blur rounded-xl shadow-lg p-8 border border-white/20 mt-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
        <h1 class="text-3xl font-bold text-white">{{ $playlist->name }}</h1>
        <div class="flex gap-2">
            <a href="{{ route('playlists.edit', $playlist->slug) }}" class="px-4 py-2 rounded-lg bg-yellow-500 text-white font-semibold hover:bg-yellow-600 transition">Edit</a>
            <form action="{{ route('playlists.destroy', $playlist->slug) }}" method="POST" onsubmit="return confirm('Delete this playlist?')">
                @csrf
                @method('DELETE')
                <button class="px-4 py-2 rounded-lg bg-red-500 text-white font-semibold hover:bg-red-600 transition">Delete</button>
            </form>
            <a href="{{ route('playlists.index') }}" class="px-4 py-2 rounded-lg bg-gray-300 text-gray-800 font-semibold hover:bg-gray-400 transition">Back</a>
        </div>
    </div>
    @if($songs->count())
        <h4 class="text-xl font-semibold text-white mb-4">Songs in Playlist</h4>
        <ul class="divide-y divide-white/20">
            @foreach($songs as $song)
                <li class="py-3 flex items-center justify-between">
                    <a href="{{ route('songs.show', $song->id) }}" class="text-white hover:underline">{{ $song->title }}</a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-white">No songs in this playlist yet.</p>
    @endif
</div>
@endsection
