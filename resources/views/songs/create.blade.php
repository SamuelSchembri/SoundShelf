@extends('layouts.app')
@section('title', 'Add Song')
@section('content')
<div class="max-w-xl mx-auto bg-white/10 backdrop-blur rounded-xl shadow-lg p-8 border border-white/20 mt-8">
    <h1 class="text-3xl font-bold text-white mb-6">Add Song</h1>
    <form method="POST" action="{{ route('songs.store') }}" class="space-y-5">
        @csrf
        <div>
            <label for="album_id" class="block text-sm font-medium text-white mb-1">Album</label>
            <select name="album_id" id="album_id" required class="w-full px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                <option value="">Select album</option>
                @foreach($albums as $album)
                    <option value="{{ $album->id }}" @selected(old('album_id') == $album->id)>{{ $album->title }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="title" class="block text-sm font-medium text-white mb-1">Song Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required class="w-full px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-400">
        </div>
        <div>
            <label for="track_number" class="block text-sm font-medium text-white mb-1">Track Number</label>
            <input type="number" id="track_number" name="track_number" value="{{ old('track_number') }}" class="w-full px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-400">
        </div>
        <div>
            <label for="duration" class="block text-sm font-medium text-white mb-1">Duration (seconds)</label>
            <input type="number" id="duration" name="duration" value="{{ old('duration') }}" class="w-full px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-400">
        </div>
        <div class="flex gap-3">
            <button type="submit" class="px-4 py-2 rounded-lg bg-indigo-500 text-white font-semibold hover:bg-indigo-600 transition">Create</button>
            <a href="{{ route('songs.index') }}" class="px-4 py-2 rounded-lg bg-gray-300 text-gray-800 font-semibold hover:bg-gray-400 transition">Cancel</a>
        </div>
    </form>
</div>
@endsection
