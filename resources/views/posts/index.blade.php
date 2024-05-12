@extends('layouts.layout')

@section('title', 'Page d\'accueil')

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
<div class="container mt-5">
    <h1 class="text-primary">Tous les Articles
<span>
    <a href="{{ route('posts.create') }}" class="btn btn-primary ms-5">Créer un article</a>
</span>
    </h1>
    <div class="row mt-3">
        @foreach($posts as $post)
            <div class="col-md-4">
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
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection

@section('footer')
    @include('components.footer')
@endsection
