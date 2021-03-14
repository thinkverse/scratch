<nav class="flex items-center justify-between px-10 py-3 text-white bg-gray-800">
    <a href="{{ route('welcome') }}" class="mr-8">
        <svg class="w-auto h-8 text-white fill-current hover:text-gray-400 focus:text-gray-400" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"></path>
        </svg>
    </a>
    <form action="#" class="mr-8 text-sm" x-data="searchBar()">
        <label for="searchBar">
            <label for="search_bar" class="sr-only">Search or jump to.</label>
            <input class="w-64 px-2 py-1 font-medium placeholder-gray-100 transition-all duration-150 bg-gray-900 border border-gray-700 rounded-md focus:w-96 focus:font-normal focus:outline-none focus:border-blue-500"
                id="search_bar" type="text" placeholder="Search or jump to..." x-ref="input" @keydown.window="keybindings" />
        </label>
    </form>
    <ul class="flex mr-auto space-x-4 text-sm font-bold">
        <li><a href="{{ route('dashboard') }}" class="hover:text-gray-400 focus:text-gray-400">Pull requests</a></li>
        <li><a href="#" class="hover:text-gray-400 focus:text-gray-400">Issues</a></li>
        <li><a href="#" class="hover:text-gray-400 focus:text-gray-400">Marketplace</a></li>
        <li><a href="#" class="hover:text-gray-400 focus:text-gray-400">Explore</a></li>
    </ul>
    @if (Route::has('login'))
        <ul class="flex space-x-4 text-sm font-bold">
            @auth
            <li><a href="{{ route('dashboard') }}" class="hover:text-gray-400 focus:text-gray-400">Dashboard</a></li>
            @else
            <li><a href="{{ route('login') }}" class="hover:text-gray-400 focus:text-gray-400">Login</a></li>

                @if (Route::has('register'))
                    <li><a href="{{ route('register') }}" class="hover:text-gray-400 focus:text-gray-400">Register</a></li>
                @endif
            @endauth
        </ul>
    @endif
</nav>

@push('scripts')
    <script>
        function searchBar() {
            return {
                keybindings($event) {
                    if ($event.key == 'Escape' && this.$refs.input === document.activeElement) {
                        this.$refs.input.blur();
                    } else if ($event.key == '/' && this.$refs.input !== document.activeElement) {
                        $event.preventDefault();
                        this.$refs.input.focus();
                    }
                }
            }
        }
    </script>
@endpush
