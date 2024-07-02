<header class="sm:flex sm:justify-between sm:items-center sm:px-4 sm:py-3">
    <div class="flex items-center justify-between px-4 py-3 sm:p-0">
        <div>
            <a class="text-2xl font-semibold no-underline hover:text-blue-500" href="{{ url('/') }}">Mon Blog</a>
        </div>
        <div class="sm:hidden">
            <button id="menuButton" type="button" class="block text-black hover:text-blue-500 focus:text-blue-500 focus:outline-none">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M4 5h16a1 1 0 010 2H4a1 1 0 010-2zm0 6h16a1 1 0 010 2H4a1 1 0 010-2zm0 6h16a1 1 0 010 2H4a1 1 0 010-2z"/>
                </svg>
            </button>
        </div>
    </div>
    <nav id="navbarMenu" class="hidden sm:flex sm:items-center">
        <div class="sm:ml-6">
            <a class="{{ Request::routeIs('home') ? 'text-blue-500' : 'hover:text-blue-500' }}" href="{{ url('/') }}">Accueil</a>
            <a class="ml-3 {{ Request::routeIs('posts.*') ? 'text-blue-500' : 'hover:text-blue-500' }}" href="{{ url('/posts') }}">Posts</a>
            @auth
            <a class="ml-3 {{ Request::routeIs('dashboard') ? 'text-blue-500' : 'hover:text-blue-500' }}" href="{{ route('dashboard') }}">{{ auth()->user()->name }}</a>
            <form method="POST" action="{{ route('logout') }}" class="ml-3 inline-block">
                @csrf
                <button type="submit" class="hover:text-blue-500 bg-transparent border-none">Déconnexion</button>
            </form>
            @else
            <a class="ml-3 {{ Request::routeIs('login') ? 'text-blue-500' : 'hover:text-blue-500' }}" href="{{ route('login') }}">Connexion</a>
            <a class="ml-3 {{ Request::routeIs('register') ? 'text-blue-500' : 'hover:text-blue-500' }}" href="{{ route('register') }}">Inscription</a>
            @endauth
        </div>
    </nav>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuButton = document.getElementById('menuButton');
        const navbarMenu = document.getElementById('navbarMenu');

        menuButton.addEventListener('click', function() {
            // This will toggle the 'hidden' class on the navbarMenu
            navbarMenu.classList.toggle('hidden');
        });
    });
</script>
