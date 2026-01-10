

<section>
    <h4 class="text-xl font-semibold text-white mb-4">Profile Information</h4>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <form method="post" action="{{ route('profile.update') }}" class="space-y-5">
        @csrf
        @method('patch')
        <div>
            <label for="name" class="block text-sm font-medium text-white mb-1">Name</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" class="w-full px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-400">
            @if ($errors->has('name'))
                <div class="text-red-400 text-xs mt-1">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-white mb-1">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="username" class="w-full px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-400">
            @if ($errors->has('email'))
                <div class="text-red-400 text-xs mt-1">{{ $errors->first('email') }}</div>
            @endif
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2 p-3 rounded bg-yellow-100/80 text-yellow-900 text-sm flex items-center gap-2">
                    <span>{{ __('Your email address is unverified.') }}</span>
                    <button form="send-verification" class="ml-2 underline text-indigo-700 hover:text-indigo-900">{{ __('Click here to re-send the verification email.') }}</button>
                </div>
                @if (session('status') === 'verification-link-sent')
                    <div class="mt-2 p-2 rounded bg-green-100/80 text-green-900 text-sm">{{ __('A new verification link has been sent to your email address.') }}</div>
                @endif
            @endif
        </div>
        <div class="flex items-center gap-3">
            <button type="submit" class="py-2 px-4 rounded-lg bg-indigo-500 text-white font-semibold hover:bg-indigo-600 transition">Save</button>
            @if (session('status') === 'profile-updated')
                <span class="text-green-300 text-sm">{{ __('Saved.') }}</span>
            @endif
        </div>
    </form>
</section>
