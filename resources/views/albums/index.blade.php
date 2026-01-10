@extends('layouts.app')
@section('title', 'Albums')
@section('content')
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
    <h1 class="text-3xl font-bold text-white">Albums</h1>
    <a href="{{ route('albums.create') }}" class="inline-block px-4 py-2 rounded-lg bg-pink-500 text-white font-semibold hover:bg-pink-600 transition">Add Album</a>
</div>
<form method="GET" class="mb-8 grid grid-cols-1 md:grid-cols-4 gap-4">
    <input type="text" name="search" class="px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-pink-400" placeholder="Search albums..." value="{{ request('search') }}">
    <select name="genre" class="px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-pink-400">
        <option value="">All Genres</option>
        @foreach($albums->pluck('genre')->unique()->filter() as $genre)
            <option value="{{ $genre }}" @selected(request('genre') == $genre)> {{ $genre }} </option>
        @endforeach
    </select>
    <select name="sort" class="px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-pink-400">
        <option value="year" @selected(request('sort') == 'year')>Sort by Year</option>
        <option value="title" @selected(request('sort') == 'title')>Sort by Title</option>
    </select>
    <button class="px-4 py-2 rounded-lg bg-pink-500 text-white font-semibold hover:bg-pink-600 transition" type="submit">Filter</button>
</form>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($albums as $album)
        <div class="bg-white/10 backdrop-blur rounded-xl shadow-lg p-6 border border-white/20 flex flex-col h-full hover:scale-105 transition-transform">
            <h3 class="text-xl font-bold text-white mb-2">{{ $album->title }}</h3>
            <p class="text-gray-200 mb-2">{{ $album->artist->name }}</p>
            <p class="text-gray-400 text-sm mb-4">{{ $album->year }} | {{ $album->genre }}</p>
            <a href="{{ route('albums.show', $album->slug) }}" class="mt-auto inline-block px-4 py-2 rounded-lg bg-indigo-500 text-white font-semibold hover:bg-indigo-600 transition">View Album</a>
        </div>
    @empty
        <p class="text-white">No albums found.</p>
    @endforelse
</div>
<div class="mt-8">
    {{ $albums->withQueryString()->links() }}
</div>
@endsection
