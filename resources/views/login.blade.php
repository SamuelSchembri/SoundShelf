

<div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-indigo-900 via-purple-900 to-gray-900 py-8 px-4">
    <div class="w-full max-w-md bg-white/10 backdrop-blur rounded-xl shadow-lg p-8 border border-white/20">
        <h2 class="text-3xl font-bold text-center text-white mb-6">Login to SoundShelf</h2>
        @if (session('status'))
            <div class="mb-4 p-2 rounded bg-green-100 text-green-800 text-center text-sm">{{ session('status') }}</div>
        @endif
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-white mb-1">Email address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="w-full px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                @if ($errors->has('email'))
                    <div class="text-red-400 text-xs mt-1">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-white mb-1">Password</label>
                <input type="password" id="password" name="password" required autocomplete="current-password" class="w-full px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                @if ($errors->has('password'))
                    <div class="text-red-400 text-xs mt-1">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <div class="flex items-center justify-between">
                <label class="flex items-center text-white">
                    <input type="checkbox" id="remember_me" name="remember" class="rounded mr-2">
                    <span class="text-sm">Remember me</span>
                </label>
            </div>
            <button type="submit" class="w-full py-2 px-4 rounded-lg bg-indigo-500 text-white font-semibold hover:bg-indigo-600 transition">Log in</button>
        </form>
        <div class="mt-6 text-center">
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="text-indigo-300 hover:underline">Don't have an account? Register</a>
            @endif
        </div>
    </div>
</div>
