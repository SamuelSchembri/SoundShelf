

<nav class="bg-white border-b border-gray-200 shadow-sm w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-indigo-600">SoundShelf</a>
                <a href="{{ route('dashboard') }}" class="hidden sm:inline-block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100 {{ request()->routeIs('dashboard') ? 'bg-gray-100 font-semibold' : '' }}">Dashboard</a>
            </div>
            <div class="flex items-center space-x-2">
                @auth
                <div class="relative group">
                    <button class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100 focus:outline-none">
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-md shadow-lg opacity-0 group-hover:opacity-100 group-focus-within:opacity-100 transition-opacity z-50">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Log Out</button>
                        </form>
                    </div>
                </div>
                @else
                <a href="{{ route('login') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">Login</a>
                <a href="{{ route('register') }}" class="ml-2 px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
