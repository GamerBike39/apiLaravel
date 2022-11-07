{{-- @extends('layouts.guest') --}}
<x-app-layout layout="guest">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('public') }}
        </h2>
        <div class="container">
            <h1>Liste de nos livres : </h1>
            <div class="row">
                @foreach ($livres as $livre)
                    <div class="col-4">
                        <div class="card shadow">
                            <img src="{{ Storage::url($livre->image) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $livre->title }}</h5>
                                <p class="card-text">{{ $livre->desc }}</p>
                                <p class="card-text">{{ $livre->author }}</p>
                                <p class="card-text">{{ $livre->price }} €</p>
                                <a href="{{ url('livre/' . $livre->id) }}" class="btn btn-primary">Voir</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-slot>
</x-app-layout>
