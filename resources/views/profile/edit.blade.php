
@extends('layouts.app')
@section('title', 'Profile')
@section('content')
<div class="fixed inset-0 w-full h-full bg-gradient-to-br from-indigo-900 via-purple-900 to-gray-900 flex flex-col">
    <div class="flex-grow flex flex-col items-center justify-center w-full px-4">
        <div class="w-full max-w-3xl">
            <div class="flex justify-start mb-4">
                <a href="{{ url('/dashboard') }}" class="inline-flex items-center px-4 py-2 rounded-lg bg-indigo-500 text-white font-semibold hover:bg-indigo-600 transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
                    Back to Dashboard
                </a>
            </div>
            <h2 class="text-3xl font-bold text-white mb-8">Profile</h2>
            <div class="space-y-8">
                <div class="bg-white/10 backdrop-blur rounded-xl shadow-lg p-6 border border-white/20">
                    @include('profile.partials.update-profile-information-form')
                </div>
                <div class="bg-white/10 backdrop-blur rounded-xl shadow-lg p-6 border border-white/20">
                    @include('profile.partials.update-password-form')
                </div>
                <div class="bg-white/10 backdrop-blur rounded-xl shadow-lg p-6 border border-white/20">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
