@extends('layouts.layout')

@section('title', 'Page d\'accueil')

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
<div class=" mx-auto p-4">
    <div class="jumbotron jumbotron-fluid text-center bg-gradient-to-r from-blue-500 to-purple-600 text-white py-16 mb-8 rounded-lg shadow-lg animate__animated animate__fadeInDown">
        <div class="container">
            <h1 class="text-5xl font-bold">Bienvenue sur Mon Blog!</h1>
            <p class="text-xl mt-4">Ceci est la page d'accueil de mon application Laravel.</p>
        </div>
    </div>
    <div class="mb-4">
        <h2 class="text-3xl font-bold text-gray-800">Les derniers articles</h2>
    </div>
    <div class="flex flex-wrap -mx-4">
        @foreach($posts as $post)
            <div class="w-full md:w-1/2 px-4 mb-4">
                <div class="rounded overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 ease-in-out transform hover:-translate-y-1 animate__animated animate__fadeInUp">
                    <img class="w-full h-64 object-cover transition duration-500 ease-in-out transform hover:scale-105 cursor-pointer " src="{{ $post->image_path }}" alt="{{ $post->title }}">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2 text-gray-800 transition duration-500 ease-in-out transform hover:text-blue-500">{{ $post->title }}</div>
                        <p class="text-gray-700 text-base">{{ Str::limit($post->content, 150, '...') }}</p>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        <p class="text-gray-500 text-sm">Publié par {{ $post->user->name }}</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2 transition duration-500 ease-in-out transform hover:scale-105">Lire la suite</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- voir plus de posts bouton --}}
    <div class="flex justify-center mt-8">
        <a href="{{ route('posts.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-500 ease-in-out transform hover:scale-105">Voir plus de posts</a>
    </div>
</div>
@endsection

@section('footer')
    @include('components.footer')
@endsection
