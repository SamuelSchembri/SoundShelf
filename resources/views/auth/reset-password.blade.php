

@extends('layouts.app')
@section('title', 'Reset Password')
@section('content')
<div class="fixed inset-0 w-full h-full flex items-center justify-center bg-gradient-to-br from-indigo-900 via-purple-900 to-gray-900">
    <div class="w-full max-w-md bg-white/10 backdrop-blur rounded-xl shadow-lg p-8 border border-white/20">
        <h2 class="text-3xl font-bold text-center text-white mb-6">Reset Password</h2>
        <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div>
                <label for="email" class="block text-sm font-medium text-white mb-1">Email address</label>
                <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" class="w-full px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                @if ($errors->has('email'))
                    <div class="text-red-400 text-xs mt-1">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-white mb-1">Password</label>
                <input type="password" id="password" name="password" required autocomplete="new-password" class="w-full px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                @if ($errors->has('password'))
                    <div class="text-red-400 text-xs mt-1">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-white mb-1">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" class="w-full px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                @if ($errors->has('password_confirmation'))
                    <div class="text-red-400 text-xs mt-1">{{ $errors->first('password_confirmation') }}</div>
                @endif
            </div>
            <button type="submit" class="w-full py-2 px-4 rounded-lg bg-indigo-500 text-white font-semibold hover:bg-indigo-600 transition">Reset Password</button>
        </form>
        <div class="mt-6 text-center">
            <a href="{{ route('login') }}" class="text-indigo-300 hover:underline">Back to login</a>
        </div>
    </div>
</div>
@endsection
