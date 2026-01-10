@extends('layouts.app')
@section('title', 'Edit Playlist')
@section('content')
<div class="max-w-xl mx-auto bg-white/10 backdrop-blur rounded-xl shadow-lg p-8 border border-white/20 mt-8">
    <h1 class="text-3xl font-bold text-white mb-6">Edit Playlist</h1>
    <form method="POST" action="{{ route('playlists.update', $playlist->slug) }}" class="space-y-5">
        @csrf
        @method('PUT')
        <div>
            <label for="name" class="block text-sm font-medium text-white mb-1">Playlist Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $playlist->name) }}" required class="w-full px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>
        <div>
            <label for="song_ids" class="block text-sm font-medium text-white mb-1">Songs in Playlist</label>
            <select name="song_ids[]" id="song_ids" class="w-full px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" multiple size="8">
                @foreach($songs as $song)
                    <option value="{{ $song->id }}" @selected($playlist->songs->contains($song->id))>{{ $song->title }}</option>
                @endforeach
            </select>
            <small class="text-gray-200">Hold Ctrl (Cmd on Mac) to select multiple songs.</small>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="px-4 py-2 rounded-lg bg-yellow-500 text-white font-semibold hover:bg-yellow-600 transition">Update</button>
            <a href="{{ route('playlists.show', $playlist->slug) }}" class="px-4 py-2 rounded-lg bg-gray-300 text-gray-800 font-semibold hover:bg-gray-400 transition">Cancel</a>
        </div>
    </form>
</div>
@endsection
