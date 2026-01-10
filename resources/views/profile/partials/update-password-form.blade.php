

<section>
    <h4 class="text-xl font-semibold text-white mb-4">Update Password</h4>
    <form method="post" action="{{ route('password.update') }}" class="space-y-5">
        @csrf
        @method('put')
        <div>
            <label for="update_password_current_password" class="block text-sm font-medium text-white mb-1">Current Password</label>
            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password" class="w-full px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-400">
            @if ($errors->updatePassword->has('current_password'))
                <div class="text-red-400 text-xs mt-1">{{ $errors->updatePassword->first('current_password') }}</div>
            @endif
        </div>
        <div>
            <label for="update_password_password" class="block text-sm font-medium text-white mb-1">New Password</label>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password" class="w-full px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-400">
            @if ($errors->updatePassword->has('password'))
                <div class="text-red-400 text-xs mt-1">{{ $errors->updatePassword->first('password') }}</div>
            @endif
        </div>
        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-medium text-white mb-1">Confirm Password</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" class="w-full px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-400">
            @if ($errors->updatePassword->has('password_confirmation'))
                <div class="text-red-400 text-xs mt-1">{{ $errors->updatePassword->first('password_confirmation') }}</div>
            @endif
        </div>
        <div class="flex items-center gap-3">
            <button type="submit" class="py-2 px-4 rounded-lg bg-indigo-500 text-white font-semibold hover:bg-indigo-600 transition">Save</button>
            @if (session('status') === 'password-updated')
                <span class="text-green-300 text-sm">{{ __('Saved.') }}</span>
            @endif
        </div>
    </form>
</section>
