@extends('layouts.layout')

@section('title', 'Créer un nouveau post')

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
<div class="mx-auto p-4">
    <div class="jumbotron jumbotron-fluid text-center bg-gradient-to-r from-green-500 to-blue-600 text-white py-16 mb-8 rounded-lg shadow-lg animate__animated animate__fadeInDown">
        <div class="container">
            <h1 class="text-5xl font-bold">Créer un Nouveau Post</h1>
            <p class="text-xl mt-4">Remplissez le formulaire ci-dessous pour ajouter un nouveau post à votre blog.</p>
        </div>
    </div>
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg animate__animated animate__fadeInUp">
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Titre</label>
                <input type="text" id="title" name="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Contenu</label>
                <textarea id="content" name="content" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                <input type="file" id="image" name="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transform transition duration-500 hover:scale-105">
                    Publier
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('footer')
    @include('components.footer')
@endsection
