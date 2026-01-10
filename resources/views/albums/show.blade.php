@extends('layouts.app')
@section('title', $album->title)
@section('content')
<div class="max-w-2xl mx-auto bg-white/10 backdrop-blur rounded-xl shadow-lg p-8 border border-white/20 mt-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
        <h1 class="text-3xl font-bold text-white">{{ $album->title }}</h1>
        <div class="flex gap-2 flex-wrap">
            <a href="{{ route('albums.edit', $album->slug) }}" class="px-4 py-2 rounded-lg bg-indigo-500 text-white font-semibold hover:bg-indigo-600 transition">Edit</a>
            <form action="{{ route('albums.destroy', $album->slug) }}" method="POST" onsubmit="return confirm('Delete this album?')">
                @csrf
                @method('DELETE')
                <button class="px-4 py-2 rounded-lg bg-red-600 text-white font-semibold hover:bg-red-700 transition">Delete</button>
            </form>
            <a href="{{ route('albums.index') }}" class="px-4 py-2 rounded-lg bg-gray-300 text-gray-800 font-semibold hover:bg-gray-400 transition">Back</a>
        </div>
    </div>
    <div class="mb-4">
        <p class="mb-2 text-white"><span class="font-bold">Artist:</span> <a href="{{ route('artists.show', $album->artist->slug) }}" class="text-indigo-300 hover:underline">{{ $album->artist->name }}</a></p>
        <p class="mb-2 text-white"><span class="font-bold">Year:</span> {{ $album->year }}</p>
        <p class="mb-2 text-white"><span class="font-bold">Genre:</span> {{ $album->genre }}</p>
    </div>
    @if($album->songs->count())
        <h4 class="text-xl font-semibold text-white mt-6 mb-2">Songs</h4>
        <ul class="divide-y divide-white/20">
            @foreach($album->songs as $song)
                <li class="py-2">
                    <a href="{{ route('songs.show', $song->id) }}" class="text-indigo-200 hover:underline">{{ $song->title }}</a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
