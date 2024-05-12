@extends('layouts.layout')

@section('title', 'Créer un nouveau post')

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
<div class="container mt-5">
    <h2>Créer un nouveau post</h2>
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Publier</button>
    </form>
</div>
@endsection

@section('footer')
    @include('components.footer')
@endsection
