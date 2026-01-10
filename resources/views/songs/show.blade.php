@extends('layouts.app')
@section('title', $song->title)
@section('content')
<div class="max-w-2xl mx-auto bg-white/10 backdrop-blur rounded-xl shadow-lg p-8 border border-white/20 mt-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
        <h1 class="text-3xl font-bold text-white">{{ $song->title }}</h1>
        <div class="flex gap-2 flex-wrap">
            <a href="{{ route('songs.edit', $song->id) }}" class="px-4 py-2 rounded-lg bg-indigo-500 text-white font-semibold hover:bg-indigo-600 transition">Edit</a>
            <form action="{{ route('songs.destroy', $song->id) }}" method="POST" onsubmit="return confirm('Delete this song?')">
                @csrf
                @method('DELETE')
                <button class="px-4 py-2 rounded-lg bg-red-600 text-white font-semibold hover:bg-red-700 transition">Delete</button>
            </form>
            <a href="{{ route('songs.index') }}" class="px-4 py-2 rounded-lg bg-gray-300 text-gray-800 font-semibold hover:bg-gray-400 transition">Back</a>
        </div>
    </div>
    <div class="mb-4">
        <p class="mb-2 text-white"><span class="font-bold">Album:</span> <a href="{{ route('albums.show', $song->album->slug) }}" class="text-indigo-300 hover:underline">{{ $song->album->title }}</a></p>
        <p class="mb-2 text-white"><span class="font-bold">Track #:</span> {{ $song->track_number }}</p>
        <p class="mb-2 text-white"><span class="font-bold">Duration:</span> {{ $song->duration }} seconds</p>
    </div>
</div>
@endsection
