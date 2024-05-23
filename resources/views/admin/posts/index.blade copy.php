@extends('layouts.admin')

@section('title', 'Gestion des Posts')

@section('navbar')
    @include('components.admin-navbar')
@endsection

@section('content')
<div class="container mx-auto px-4 mt-5">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-primary">Gestion des Posts</h1>
        <a href="{{ route('admin.posts.create') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Créer un Post</a>
    </div>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Titre</th>
                <th class="py-2 px-4 border-b">Auteur</th>
                <th class="py-2 px-4 border-b">Date de Publication</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $post->title }}</td>
                    <td class="py-2 px-4 border-b">{{ $post->user->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $post->created_at->format('d/m/Y') }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="text-blue-500 hover:text-blue-700">Modifier</a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 ml-4" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce post ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex justify-center mt-4 space-x-4">
        {{ $posts->links('vendor.pagination.tailwind') }}
    </div>
</div>
@endsection

@section('footer')
    @include('components.admin-footer')
@endsection
