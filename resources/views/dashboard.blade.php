<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
            {{-- menu de administration --}}
            {{ __('Tableau de bord') }}

        </h2>
    </x-slot>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6">
                <a href="{{ route('administration.posts.index') }}"
                class="card text-white bg-info mb-3">
                    <div class="card-body">
                                    <h5 class="card-title"><i class="fas fa-file-alt"></i> Nombre de vos posts</h5>
                                    <p class="card-text">{{ $postCount }}</p>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href=""
                 class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-comments"></i> Nombre de vos commentaires</h5>
                        <p class="card-text">{{ $commentCount }}</p>
                    </div>
                </a>
            </div>
        </div>

    </div>
</div>

</x-app-layout>
