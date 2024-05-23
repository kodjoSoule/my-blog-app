<x-app-layout>
    <x-slot name="header">
        <nav class="bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <!-- Logo -->
                    <div class="flex-shrink-0">
                        <a href="{{ route('dashboard') }}" class="text-white text-xl font-bold">Admin Dashboard</a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="hidden sm:block sm:ml-6">
                            <div class="flex space-x-4">
                                <a href="{{ route('users.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Utilisateurs</a>
                                <a href="{{ route('admin.posts.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Posts</a>
                                <div class="relative group">
                                    <button class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium flex items-center" id="commentsMenuButton">
                                        <i class="fas fa-comments mr-1"></i> Commentaires
                                        <svg class="w-4 h-4 inline-block ml-1 transform group-hover:rotate-180 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div id="commentsMenu" class="hidden group-hover:block absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-20 border border-gray-200 divide-y divide-gray-100 transition duration-200">
                                        <a href="{{ route('admin.comments.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                                            <i class="fas fa-list mr-1"></i> Tous les Commentaires
                                        </a>
                                        <a href="{{ route('admin.comments.create') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                                            <i class="fas fa-plus mr-1"></i> Créer un Commentaire
                                        </a>
                                    </div>
                                </div>
                                <a href="{{ route('reports.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Rapports</a>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const commentsMenuButton = document.getElementById('commentsMenuButton');
                            const commentsMenu = document.getElementById('commentsMenu');

                            commentsMenuButton.addEventListener('click', function(event) {
                                event.stopPropagation();
                                commentsMenu.classList.toggle('hidden');
                            });

                            document.addEventListener('click', function() {
                                if (!commentsMenu.classList.contains('hidden')) {
                                    commentsMenu.classList.add('hidden');
                                }
                            });
                        });
                    </script>

                    <!-- User Profile Dropdown -->
                    <div class="ml-3 relative">
                        <div>
                            <button type="button" class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="">
                            </button>
                        </div>
                        <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" id="user-menu">
                            {{-- <a href="{{ route('profile.show') }}" --}}
                            <a href="#"
                            class="block px-4 py-2 text-sm text-gray-700" role="menuitem">Votre Profil</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-sm text-gray-700" role="menuitem">Déconnexion</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </x-slot>

    {{-- Content for full posts management --}}
    <div class="container mx-auto px-4">
        <div class="py-8">
            <div class="flex justify-between mb-4">
                <h1 class="text-3xl font-bold">Tous les Posts</h1>
                <a href="{{ route('admin.posts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transform transition duration-500 hover:scale-105">Créer un Post</a>
            </div>
            <div class="bg-white rounded-lg shadow overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-left font-bold">
                            <th class="px-6 pt-6 pb-4">ID</th>
                            <th class="px-6 pt-6 pb-4">Titre</th>
                            <th class="px-6 pt-6 pb-4">Contenu</th>
                            {{-- is Published --}}
                            <th class="px-6 pt-6 pb-4">Publié</th>
                            <th class="px-6 pt-6 pb-4">Auteur</th>
                            <th class="px-6 pt-6 pb-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr class="hover:bg-gray-100 focus-within:bg-gray-100 " onclick="window.location.href='#'">
                                <td class="border-t px-6 py-4">{{ $post->id }}</td>
                                <td class="border-t px-6 py-4">{{ $post->title }}</td>
                                <td class="border-t px-6 py-4">{{ Str::limit($post->content, 50, '...') }}</td>
                                <td class="border-t px-6 py-4">{{ $post->is_published ? 'Oui' : 'Non' }}</td>


                                <td class="border-t px-6 py-4">{{ $post->user->name }}</td>

                                <td class="border-t px-6 py-4 flex justify-between">
                                    <a href="{{ route('admin.posts.show', $post->id) }}" class="text-blue-500 hover:text-blue-700 ml-4 transition duration-200">
                                        <i class="fas fa-eye">
                                            </i>
                                    </a>
                                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="text-green-500 hover:text-green-700 ml-4 transition duration-200">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <div class="tooltip cursor-pointer ml-4" onclick="event.stopPropagation(); openModal('{{ $post->id }}')">
                                        <button type="button" class="text-red-500 hover:text-red-700 ml-4 transition duration-200" onclick="event.stopPropagation(); openModal('{{ $post->id }}')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        {{-- <span class="tooltiptext">Supprimer le post</span> --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex justify-center mt-4 space-x-4 bg-blue-400 p-4 rounded-lg text-white">
                    {{ $posts->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Component for Delete Confirmation -->
    @foreach ($posts as $post)
        <x-modal name="confirm-delete-{{ $post->id }}">
            <div class="p-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Confirmation de suppression</h2>
                <p>Êtes-vous sûr de vouloir supprimer le post "{{ $post->title }}" ? Cette action est irréversible.</p>
                <div class="mt-6 flex justify-end">
                    <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-4" onclick="closeModal('{{ $post->id }}')">Annuler</button>
                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Supprimer</button>
                    </form>
                </div>
            </div>
        </x-modal>
    @endforeach

    <script>
        function openModal(postId) {
            window.dispatchEvent(new CustomEvent('open-modal', { detail: 'confirm-delete-' + postId }));
        }

        function closeModal(postId) {
            window.dispatchEvent(new CustomEvent('close-modal', { detail: 'confirm-delete-' + postId }));
        }
    </script>

</x-app-layout>
