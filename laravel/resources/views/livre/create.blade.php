@extends('layouts.app')
@section('content')

    <div class="container mt-5">
        <h1>Ajouter un livre</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('livre') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="author">Auteur :</label>
                <input type="text" class="form-control" id="author" placeholder="Entrez le nom de l'auteur"
                    name="author">
            </div>
            <div class="form-group mb-3">
                <label for="title">Titre:</label>
                <input type="text" class="form-control" id="title" placeholder="Titre du livre" name="title">
            </div>
            <div class="form-group mb-3">
                <label for="desc">Description :</label>
                <input type="text" class="form-control" id="desc" placeholder="Description du livre" name="desc">
            </div>

            <div class="form-group mb-3">
                <label for="image">Image de couverture :</label>
                <input type="file" class="form-control" id="cover" name="image">
            </div>


            <div class="form-group mb-3">
                <label for="price">prix :</label>
                <input type="number" class="form-control block" id="price" placeholder="prix du livre" name="price">
            </div>
            <button type="submit" class="btn btn-primary">Enregister</button>
        </form>
    </div>

@endsection
