@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Liste des livres</h1>
        <div class="col-lg-1 my-3">
            <a class="btn btn-primary" href="{{ url('livre/create') }}">Ajouter </a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-2">Titre</th>
                    <th class="col-2">Auteur</th>
                    <th class="overflow-hidden">Description</th>
                    <th class='col-1'>Image</th>
                    <th class='col-1'>Prix</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($livres as $livre)
                    <tr>
                        <td class="align-middle">{{ $livre->title }}</td>
                        <td class="align-middle">{{ $livre->author }}</td>
                        <td class="align-middle">{{ $livre->desc }}</td>
                        <td class="align-middle"><img src="{{ Storage::url($livre->image) }}" alt="Cover"></td>
                        <td class="align-middle">{{ $livre->price }} €</td>
                        <td class="align-middle">
                            <form action="{{ url('livre/' . $livre->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="d-flex gap-2 px-3 align-middle">
                                    <a class="btn btn-primary" href="{{ url('livre/' . $livre->id) }}">👀</a>
                                    <a class="btn btn-primary" href="{{ route('livre.edit', $livre->id) }}">✍️</a>
                                    <button type="submit" class="btn btn-danger">🚮</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
