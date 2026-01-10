@extends('layouts.app')
@section('title', $artist->name)
@section('content')
<div class="max-w-2xl mx-auto bg-white/10 backdrop-blur rounded-xl shadow-lg p-8 border border-white/20 mt-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
        <div class="flex items-center gap-6">
            <h1 class="text-3xl font-bold text-white">{{ $artist->name }}</h1>
        </div>
        <div class="flex gap-2 flex-wrap">
            <a href="{{ route('artists.edit', $artist->slug) }}" class="px-4 py-2 rounded-lg bg-indigo-500 text-white font-semibold hover:bg-indigo-600 transition">Edit</a>
            <form action="{{ route('artists.destroy', $artist->slug) }}" method="POST" onsubmit="return confirm('Delete this artist?')">
                @csrf
                @method('DELETE')
                <button class="px-4 py-2 rounded-lg bg-red-600 text-white font-semibold hover:bg-red-700 transition">Delete</button>
            </form>
            <a href="{{ route('artists.index') }}" class="px-4 py-2 rounded-lg bg-gray-300 text-gray-800 font-semibold hover:bg-gray-400 transition">Back</a>
        </div>
    </div>
    @if($artist->albums->count())
        <h4 class="text-xl font-semibold text-white mt-6 mb-2">Albums</h4>
        <ul class="divide-y divide-white/20">
            @foreach($artist->albums as $album)
                <li class="py-2">
                    <a href="{{ route('albums.show', $album->slug) }}" class="text-indigo-200 hover:underline">{{ $album->title }}</a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
