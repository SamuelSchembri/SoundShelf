@extends('layouts.app')
@section('title', 'Edit Album')
@section('content')
<div class="max-w-xl mx-auto bg-white/10 backdrop-blur rounded-xl shadow-lg p-8 border border-white/20 mt-8">
    <h1 class="text-3xl font-bold text-white mb-6">Edit Album</h1>
    <form method="POST" action="{{ route('albums.update', $album->slug) }}" class="space-y-5">
        @csrf
        @method('PUT')
        <div>
            <label for="artist_id" class="block text-sm font-medium text-white mb-1">Artist</label>
            <select name="artist_id" id="artist_id" required class="w-full px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-pink-400">
                @foreach($artists as $artist)
                    <option value="{{ $artist->id }}" @selected(old('artist_id', $album->artist_id) == $artist->id)>{{ $artist->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="title" class="block text-sm font-medium text-white mb-1">Album Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $album->title) }}" required class="w-full px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-pink-400">
        </div>
        <div>
            <label for="year" class="block text-sm font-medium text-white mb-1">Year</label>
            <input type="number" id="year" name="year" value="{{ old('year', $album->year) }}" class="w-full px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-pink-400">
        </div>
        <div>
            <label for="genre" class="block text-sm font-medium text-white mb-1">Genre</label>
            <input type="text" id="genre" name="genre" value="{{ old('genre', $album->genre) }}" class="w-full px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-pink-400">
        </div>
        <div class="flex gap-3">
            <button type="submit" class="px-4 py-2 rounded-lg bg-pink-500 text-white font-semibold hover:bg-pink-600 transition">Update</button>
            <a href="{{ route('albums.show', $album->slug) }}" class="px-4 py-2 rounded-lg bg-gray-300 text-gray-800 font-semibold hover:bg-gray-400 transition">Cancel</a>
        </div>
    </form>
</div>
@endsection
