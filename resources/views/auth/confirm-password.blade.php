

@extends('layouts.app')
@section('title', 'Confirm Password')
@section('content')
<div class="fixed inset-0 w-full h-full flex items-center justify-center bg-gradient-to-br from-indigo-900 via-purple-900 to-gray-900">
    <div class="w-full max-w-md bg-white/10 backdrop-blur rounded-xl shadow-lg p-8 border border-white/20">
        <h2 class="text-3xl font-bold text-center text-white mb-6">Confirm Password</h2>
        <div class="mb-5 text-indigo-100 text-sm text-center">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>
        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
            @csrf
            <div>
                <label for="password" class="block text-sm font-medium text-white mb-1">Password</label>
                <input type="password" id="password" name="password" required autocomplete="current-password" class="w-full px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                @if ($errors->has('password'))
                    <div class="text-red-400 text-xs mt-1">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <button type="submit" class="w-full py-2 px-4 rounded-lg bg-indigo-500 text-white font-semibold hover:bg-indigo-600 transition">Confirm</button>
        </form>
    </div>
</div>
@endsection
