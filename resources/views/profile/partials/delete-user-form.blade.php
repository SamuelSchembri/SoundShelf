

<section x-data="{ open: false }" class="relative">
    <h4 class="text-xl font-semibold text-red-400 mb-4">Delete Account</h4>
    <p class="text-red-200 mb-4">{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}</p>
    <!-- Button trigger modal -->
    <button type="button" @click="open = true" class="py-2 px-4 rounded-lg bg-red-600 text-white font-semibold hover:bg-red-700 transition">
        {{ __('Delete Account') }}
    </button>

    <!-- Modal (Alpine.js required) -->
    <div x-show="open" class="fixed inset-0 flex items-center justify-center z-50 bg-black/60" style="display: none;">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6 relative">
            <h5 class="text-lg font-bold mb-4 text-gray-900">{{ __('Are you sure you want to delete your account?') }}</h5>
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')
                <p class="mb-4 text-gray-700">{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}</p>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input id="password" name="password" type="password" class="w-full px-4 py-2 rounded-lg bg-gray-100 text-gray-900 focus:outline-none focus:ring-2 focus:ring-red-400" placeholder="{{ __('Password') }}">
                    @if ($errors->userDeletion->has('password'))
                        <div class="text-red-500 text-xs mt-1">{{ $errors->userDeletion->first('password') }}</div>
                    @endif
                </div>
                <div class="flex justify-end gap-3">
                    <button type="button" @click="open = false" class="py-2 px-4 rounded-lg bg-gray-200 text-gray-800 font-semibold hover:bg-gray-300 transition">Cancel</button>
                    <button type="submit" class="py-2 px-4 rounded-lg bg-red-600 text-white font-semibold hover:bg-red-700 transition">Delete Account</button>
                </div>
            </form>
            <button @click="open = false" class="absolute top-2 right-2 text-gray-400 hover:text-gray-700 text-2xl leading-none">&times;</button>
        </div>
    </div>
</section>
