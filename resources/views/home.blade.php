@extends('layouts.layout')

@section('title', 'Page d\'accueil')

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
<div class="container">
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1>Bienvenue sur Mon Blog!</h1>
            <p>Ceci est la page d'accueil de mon application Laravel.</p>
        </div>
    </div>
<div class="row mb-2">
<div class="col">
    <h2>Les derniers articles</h2>
</div>
</div>
    <div class="row">

        @foreach($posts as $post)
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->content }}</p>

                        <p class="text-muted">Publié par {{ $post->user->name }} |
                            <a href="{{ route('posts.show', $post->id) }}" class="text-primary">Lire la suite</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('footer')
    @include('components.footer')
@endsection
