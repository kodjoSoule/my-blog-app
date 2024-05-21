@extends('layouts.layout')

@section('title', 'Tous les Articles')

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
<div class="container mx-auto p-4">
    <div class="jumbotron jumbotron-fluid text-center bg-gradient-to-r from-purple-500 to-indigo-600 text-white py-16 mb-8 rounded-lg shadow-lg animate__animated animate__fadeInDown">
        <div class="container">
            <h1 class="text-5xl font-bold">Tous les Articles</h1>
            <p class="text-xl mt-4">Explorez les articles les plus récents de notre blog.</p>
        </div>
    </div>
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Tous les Articles</h1>
        <a href="{{ route('posts.create') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-500 ease-in-out transform hover:scale-105">Créer un article</a>
    </div>
    <div class="flex flex-wrap -mx-4">
        @foreach($posts as $post)
            <div class="w-full md:w-1/2 px-4 mb-4">
                <div class="rounded overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 ease-in-out transform hover:-translate-y-1 animate__animated animate__fadeInUp">
                    <img class="w-full h-64 object-cover transition duration-500 ease-in-out transform hover:scale-105 cursor-pointer" src="{{ $post->image_path }}" alt="{{ $post->title }}">
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
    <div class="flex justify-center mt-8">
        {{ $posts->links('vendor.pagination.tailwind') }}
    </div>
</div>
@endsection

@section('footer')
    @include('components.footer')
@endsection
