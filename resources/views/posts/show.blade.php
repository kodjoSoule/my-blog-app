@extends('layouts.layout')

@section('title', 'Affichage d\'un article')

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
<div class="mx-auto p-4">
    <div class="rounded overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 ease-in-out transform hover:-translate-y-1 animate__animated animate__fadeInUp">
        <img class="w-full h-64 object-cover transition duration-500 ease-in-out transform hover:scale-105 cursor-pointer " src="{{ $post->image_path }}" alt="{{ $post->title }}">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2 text-gray-800 transition duration-500 ease-in-out transform hover:text-blue-500">{{ $post->title }}</div>
            <p class="text-gray-700 text-base">{{ $post->content }}</p>
        </div>
        <div class="px-6 pt-4 pb-2">
            <p class="text-gray-500 text-sm">Publié par {{ $post->user->name }}</p>
            <a href="{{ route('posts.index') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2 transition duration-500 ease-in-out transform hover:scale-105">Retour aux articles</a>
        </div>
    </div>

    <div class="mt-5">
        <h2 class="text-3xl font-bold text-gray-800"><i class="fas fa-comments"></i> Commentaires</h2>
        <ul class="mt-4">
            @if($post->comments->isEmpty())
                <li class="border rounded-lg p-4 mb-4 animate-pulse">Aucun commentaire pour cet article.</li>
            @else
                @foreach($post->comments as $comment)
                    <li class="border rounded-lg p-4 mb-4 bg-white shadow-md">
                        <div class="mb-4">
                            <p class="text-gray-700">{{ $comment->content }}</p>
                            <p class="text-gray-500 text-sm"><i class="fas fa-user"></i> Publié par {{ $comment->user->name }} |
                                {{$comment->created_at}}
                            </p>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="mt-5">
        <h2 class="text-3xl font-bold text-gray-800"><i class="fas fa-comments"></i> Laisser un commentaire</h2>
        @guest
            <p class="mt-4">Veuillez vous <a href="{{ route('login') }}" class="btn btn-link">connecter</a> pour laisser un commentaire.</p>
        @else
        <form class="form mt-4" method="post" action="{{ route('comments.store', $post->id) }}">
            @csrf
            @method('post')
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <div class="form-group">
                <label for="content">Votre commentaire</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Envoyer</button>
        </form>
        @endguest
    </div>
</div>
@endsection

@section('footer')
    @include('components.footer')
@endsection
