@extends('layouts.app')
@section('title', 'Add Playlist')
@section('content')
<div class="max-w-xl mx-auto bg-white/10 backdrop-blur rounded-xl shadow-lg p-8 border border-white/20 mt-8">
    <h1 class="text-3xl font-bold text-white mb-6">Add Playlist</h1>
    <form method="POST" action="{{ route('playlists.store') }}" class="space-y-5">
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium text-white mb-1">Playlist Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>
        <div class="flex gap-3">
            <button type="submit" class="px-4 py-2 rounded-lg bg-yellow-500 text-white font-semibold hover:bg-yellow-600 transition">Create</button>
            <a href="{{ route('playlists.index') }}" class="px-4 py-2 rounded-lg bg-gray-300 text-gray-800 font-semibold hover:bg-gray-400 transition">Cancel</a>
        </div>
    </form>
</div>
@endsection
