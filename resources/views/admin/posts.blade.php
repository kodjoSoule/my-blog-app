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
            <div class="col-12">
                <h2>
                    Listes de vos postess
                </h2>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Contenu</th>
                            <th>
                                est publié
                            </th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->content }}</td>
                            <td>
                                @if ($post->is_published)
                                <span class="badge bg-success">Oui</span>
                                @else
                                <span class="badge bg-danger">Non</span>
                                @endif
                            </td>
                            <td colspan="3">
                            <a href="" class="btn btn-success">Publier</a>
                                <a href="{{ route('administration.posts.edit', $post->id) }}" class="btn btn-light">
                                    Editer
                                </a>
                                <form class="form" action="{{ route('administration.posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-secondary">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    </div>
    </div>

</x-app-layout>
