<x-app-layout>
    <x-slot name="header">
        <nav class="bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <!-- Logo -->
                    <div class="flex-shrink-0">
                        <a href="{{ route('dashboard') }}" class="text-white text-xl font-bold">Admin Dashboard</a>
                    </div>

                    {{-- <!-- Navigation Links -->
                    <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="hidden sm:block sm:ml-6">
                            <div class="flex space-x-4">
                                <a href="{{ route('users.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Utilisateurs</a>
                                <a href="{{ route('posts.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Posts</a>
                                <a  class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Commentaires</a>
                                <a href="{{ route('reports.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Rapports</a>
                                <!-- Ajoutez d'autres liens si nécessaire -->
                            </div>
                        </div>
                    </div> --}}

                    <!-- Navigation Links -->
<div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
    <div class="hidden sm:block sm:ml-6">
        <div class="flex space-x-4">
            <a href="{{ route('users.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Utilisateurs</a>
            <a href="{{ route('admin.posts.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Posts</a>

            <!-- Dropdown Menu -->
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
                    <!-- Ajoutez d'autres options de commentaires si nécessaire -->
                </div>
            </div>

            <a href="{{ route('reports.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Rapports</a>
            <!-- Ajoutez d'autres liens si nécessaire -->
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
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            {{-- <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem">Votre Profil</a> --}}
                            <a class="block px-4 py-2 text-sm text-gray-700" role="menuitem">Votre Profil</a>
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
    <div class="py-12 bg-gray-100">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 gap-8" >
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Users Card -->
                <div class="bg-blue-500 overflow-hidden shadow-2xl sm:rounded-lg p-6 hover:scale-105 transition-all duration-200 ease-in-out transform">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-users text-white text-3xl mr-3"></i>
                        <h3 class="text-lg font-semibold text-white">Utilisateurs</h3>
                    </div>
                    <p class="text-white text-2xl">{{ $usersCount }} Utilisateur enregistrees</p>
                </div>

                <!-- Posts Card -->
                <div class="bg-green-500 overflow-hidden shadow-2xl sm:rounded-lg p-6 hover:scale-105 transition-all duration-200 ease-in-out transform">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-newspaper text-white text-3xl mr-3"></i>
                        <h3 class="text-lg font-semibold text-white">Posts</h3>
                    </div>
                    <p class="text-white text-2xl">{{ $postsCount }} post publier</p>
                </div>

                <!-- Comments Card -->
                <div class="bg-yellow-500 overflow-hidden shadow-2xl sm:rounded-lg p-6 hover:scale-105 transition-all duration-200 ease-in-out transform">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-comments text-white text-3xl mr-3"></i>
                        <h3 class="text-lg font-semibold text-white">Comments</h3>
                    </div>
                    <p class="text-white text-2xl">{{ $commentsCount }} comments made</p>
                </div>
            </div>
            {{-- chart js --}}
            <div class="flex flex-wrap mt-6">
                <div class="w-full sm:w-1/2 mb-2 p-2">
                    <div class="bg-white shadow rounded overflow-hidden">
                        <div class="p-6">
                            <h5 class="text-lg font-semibold mb-4">
                                Nombre de posts par mois
                            </h5>
                            <!-- Line Chart -->
                            <canvas id="lineChart" class="max-h-[400px]"></canvas>
                        </div>
                    </div>
                </div>

                {{-- nombre utilisatuer par mois --}}
                <div class="w-full sm:w-1/2 mb-2 p-2 ">
                    <div class="bg-white shadow rounded overflow-hidden">
                        <div class="p-6">
                            <h5 class="text-lg font-semibold mb-4">
                                Nombre d'utilisateurs par mois
                            </h5>
                            <!-- Line Chart -->
                            <canvas id="lineChart-user-by-month" class="max-h-[400px]"></canvas>
                        </div>
                    </div>
                </div>
                {{-- Pie chart : nombre de utilisateur par sexe --}}
                <div class="w-full sm:w-1/2 mb-2 p-2">
                    <div class="bg-white shadow rounded overflow-hidden">
                        <div class="p-6">
                            <h5 class="text-lg font-semibold mb-4">
                                Nombre d'utilisateurs par sexe
                            </h5>
                            <!-- Pie Chart -->
                            <canvas id="pieChart" class="max-h-[400px]"></canvas>
                        </div>
                    </div>
                </div>
                {{-- Bar Chart : nombre commentaire--}}
                <div class="w-full sm:w-1/2 mb-2 p-2">
                    <div class="bg-white shadow rounded overflow-hidden">
                        <div class="p-6">
                            <h5 class="text-lg font-semibold mb-4">
                                Nombre de commentaires par mois
                            </h5>
                            <!-- Bar Chart -->
                            <canvas id="barChart" class="max-h-[400px]"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
<script>
    document.addEventListener("DOMContentLoaded", () => {
	// <!-- Start Line CHart for posts -->
	new Chart(document.querySelector("#lineChart"), {
		type: "line",
		data: {
			labels: ["January", "February", "March", "April", "May", "June", "July"],
			datasets: [
				{
					label: "Line Chart",
					data: [65, 59, 80, 81, 56, 55, 40],

					fill: false,
					borderColor: "rgb(75, 192, 192)",
					tension: 0.1,
				},
			],
		},
		options: {
			scales: {
				y: {
					beginAtZero: true,
				},
			},
		},
	});
	// <!-- End Line CHart -->

    new Chart(document.querySelector("#lineChart-user-by-month"), {
        type: "line",
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "Line Chart",
                    // data: [65, 59, 80, 81, 56, 55, 40],
                    data: {!! json_encode($data_posts_by_month->pluck('user_count')) !!},

                    fill: false,
                    borderColor: "rgb(75, 192, 192)",
                    tension: 0.1,
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
    // <!-- End Line CHart -->

    // <!-- Start Pie CHart -->
    new Chart(document.querySelector("#pieChart"), {
        type: "pie",
        data: {
            labels: ["Homme", "Femme"],
            datasets: [
                {
                    label: "My First Dataset",
                    data: [300, 50, 100, 40, 120, 200],
                    backgroundColor: [
                        "rgb(255, 99, 132)",
                        "rgb(54, 162, 235)",
                        "rgb(255, 205, 86)",
                        "rgb(75, 192, 192)",
                        "rgb(153, 102, 255)",
                        "rgb(255, 159, 64)",
                    ],
                    hoverOffset: 4,
                },
            ],
        },
    });

    new Chart(document.querySelector("#barChart"), {
        type: "bar",
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "Bar Chart",
                    data: [65, 59, 80, 81, 56, 55, 40],
                    backgroundColor: "rgb(75, 192, 192)",
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });




	const config = {
		type: "bar",
		data: data,
		options: {},
	};
	// Créer le graphique
	const ctx = document.getElementById("myChart").getContext("2d");
	new Chart(ctx, config);
});

</script>
</x-app-layout>
