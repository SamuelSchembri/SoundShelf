

@extends('layouts.app')
@section('title', 'Verify Email')
@section('content')
<div class="fixed inset-0 w-full h-full flex items-center justify-center bg-gradient-to-br from-indigo-900 via-purple-900 to-gray-900">
    <div class="w-full max-w-md bg-white/10 backdrop-blur rounded-xl shadow-lg p-8 border border-white/20">
        <h2 class="text-3xl font-bold text-center text-white mb-6">Verify Email</h2>
        <div class="mb-5 text-indigo-100 text-sm text-center">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>
        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 text-green-300 text-center font-medium">{{ __('A new verification link has been sent to the email address you provided during registration.') }}</div>
        @endif
        <div class="flex flex-col sm:flex-row justify-between gap-3 mt-6">
            <form method="POST" action="{{ route('verification.send') }}" class="flex-1">
                @csrf
                <button type="submit" class="w-full py-2 px-4 rounded-lg bg-indigo-500 text-white font-semibold hover:bg-indigo-600 transition">Resend Verification Email</button>
            </form>
            <form method="POST" action="{{ route('logout') }}" class="flex-1">
                @csrf
                <button type="submit" class="w-full py-2 px-4 rounded-lg bg-white/20 text-indigo-100 font-semibold hover:bg-white/40 transition">Log Out</button>
            </form>
        </div>
    </div>
</div>
@endsection
