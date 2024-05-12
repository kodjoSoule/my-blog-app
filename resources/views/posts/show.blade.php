@extends('layouts.layout')

@section('title', 'Page d\'accueil')

@section('navbar')
    @include('components.navbar')
@endsection
@section('content')
<div class="container mt-5">
    <h1 class="text-primary">
        <i class="fas fa-newspaper"></i> Article {{ $post->title }}
    </h1>
    <div class="row mt-3">
            <div class="col">
                <div class="card mb-4 shadow">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->content }}</p>
                        <p class="text-muted"><i class="fas fa-user"></i> Publié par {{ $post->user->name }} | {{$post->published_at}}</p>
                    </div>
                </div>
            </div>
    </div>



    <div class="row">
        <div class="col-md-6">
            <h2><i class="fas fa-comments"></i> Commentaires</h2>
            <ul class="list-group">
                @foreach($post->comments as $comment)
                    <li class="list-group">
                        <div class="card mb-4 shadow">
                            <div class="card-body">
                                <p class="card-text">{{ $comment->content }}</p>
                                <p class="text-muted"><i class="fas fa-user"></i> Publié par {{ $comment->user->name }} |
                                    {{$comment->created_at}}
                                </p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h2><i class="fas fa-comments"></i> Commentaires</h2>
            @guest
                <p>Veuillez vous <a href="{{ route('login') }}" class="btn btn-link">connecter</a> pour laisser un commentaire.</p>
            @else
            <form class="form" method="post" action="{{ route('comments.store', $post->id) }}">
                @csrf
                @method('post')
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <div class="form-group">
                    <label for="content">Votre commentaire</label>
                    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
            @endguest
        </div>
    </div>
</div>

@endsection

@section('footer')
    @include('components.footer')
@endsection
