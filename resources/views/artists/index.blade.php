@extends('layouts.app')
@section('title', 'Artists')
@section('content')

<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
    <h1 class="text-3xl font-bold text-white">Artists</h1>
    <a href="{{ route('artists.create') }}" class="inline-block px-4 py-2 rounded-lg bg-indigo-500 text-white font-semibold hover:bg-indigo-600 transition">Add Artist</a>
</div>
<form method="GET" class="mb-8 flex flex-col md:flex-row gap-4">
    <input type="text" name="search" class="px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-400 flex-1" placeholder="Search artists..." value="{{ request('search') }}">
    <button class="px-4 py-2 rounded-lg bg-indigo-500 text-white font-semibold hover:bg-indigo-600 transition" type="submit">Search</button>
</form>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($artists as $artist)
        <div class="bg-white/10 backdrop-blur rounded-xl shadow-lg p-6 border border-white/20 flex flex-col h-full hover:scale-105 transition-transform">
            <div class="flex items-center gap-4 mb-2">
                <h3 class="text-xl font-bold text-white">{{ $artist->name }}</h3>
            </div>
            <a href="{{ route('artists.show', $artist->slug) }}" class="mt-auto inline-block px-4 py-2 rounded-lg bg-indigo-500 text-white font-semibold hover:bg-indigo-600 transition">View Artist</a>
        </div>
    @empty
        <p class="text-white">No artists found.</p>
    @endforelse
</div>
<div class="mt-8">
    {{ $artists->withQueryString()->links() }}
</div>
@endsection
