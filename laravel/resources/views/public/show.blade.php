@extends('layouts.public')
@section('content')
    <div class="container">
        <h1> {{ $livre->title }} </h1>
        <div class="row">

            <div class="col-4">
                <div class="card shadow">
                    <img src="{{ Storage::url($livre->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        {{-- <h5 class="card-title">{{ $livre->title }}</h5> --}}
                        <p class="card-text">{{ $livre->desc }}</p>
                        <p class="card-text">{{ $livre->author }}</p>
                        <p class="card-text">{{ $livre->price }} €</p>
                        <a href="{{route('livre.indexPublic')"></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
