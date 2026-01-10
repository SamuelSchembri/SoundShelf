@extends('layouts.app')
@section('title', 'Songs')
@section('content')

<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
    <h1 class="text-3xl font-bold text-white">Songs</h1>
    <a href="{{ route('songs.create') }}" class="inline-block px-4 py-2 rounded-lg bg-blue-500 text-white font-semibold hover:bg-blue-600 transition">Add Song</a>
</div>
<form method="GET" class="mb-8 flex flex-col md:flex-row gap-4">
    <input type="text" name="search" class="px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-400 flex-1" placeholder="Search songs..." value="{{ request('search') }}">
    <button class="px-4 py-2 rounded-lg bg-blue-500 text-white font-semibold hover:bg-blue-600 transition" type="submit">Search</button>
</form>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($songs as $song)
        <div class="bg-white/10 backdrop-blur rounded-xl shadow-lg p-6 border border-white/20 flex flex-col h-full hover:scale-105 transition-transform">
            <h3 class="text-xl font-bold text-white mb-2">{{ $song->title }}</h3>
            <p class="text-gray-200 mb-2">Album: {{ $song->album->title }}</p>
            <a href="{{ route('songs.show', $song->id) }}" class="mt-auto inline-block px-4 py-2 rounded-lg bg-blue-500 text-white font-semibold hover:bg-blue-600 transition">View Song</a>
        </div>
    @empty
        <p class="text-white">No songs found.</p>
    @endforelse
</div>
<div class="mt-8">
    {{ $songs->withQueryString()->links() }}
</div>
@endsection
