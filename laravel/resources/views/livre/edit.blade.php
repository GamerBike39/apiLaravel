@extends('layouts.app')


@section('content')

    <div class="container mt-5">

        <h1>Modifier</h1>


        @if ($errors->any())
            <div class="alert alert-danger">

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif

        <form method="post" action="{{ url('livre/' . $livre->id) }}" enctype="multipart/form-data">

            @method('PATCH')
            @csrf

            <div class="form-group mb-3">
                <label for="author">Auteur :</label>
                <input type="text" class="form-control" id="author" placeholder="Entrez le nom de l'auteur"
                    name="author" value="{{ $livre->author }}">
            </div>

            <div class="form-group mb-3">
                <label for="title">Titre:</label>
                <input type="text" class="form-control" id="title" placeholder="Titre du livre" name="title"
                    value="{{ $livre->title }}">
            </div>
            <div class="form-group mb-3">
                <label for="desc">Description :</label>
                {{-- <input type="text" class="form-control-area" id="desc" placeholder="Description du livre"
                    name="desc" value="{{ $livre->desc }}"> --}}
                <textarea class="form-control" id="desc" rows="3" name="desc">{{ $livre->desc }}</textarea>
            </div>
            <div class="form-group mb-3">
                <div>
                    <label for="image">Image de couverture</label>
                    <input type="file" class='form-control' id="image" name="image">
                </div>
                <div class="d-flex items-center columns Regular shadow">
                    <p>Couverture : </p>
                    <div class="previewContainer col-2">
                        <img class="preview" src="{{ Storage::url($livre->image) }}" alt="Cover">
                    </div>
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="price">prix :</label>
                <input type="number" class="form-control" id="price" placeholder="prix du livre" name="price"
                    value="{{ $livre->price }}">
            </div>



            <button type="submit" class="btn btn-primary">Enregistrer</button>

        </form>

        <a href="{{ route('livre.index') }}">Retour à la liste des livres</a>
    </div>
    </div>

    <script>
        const image = document.getElementById('image');
        const previewContainer = document.querySelector('.previewContainer');
        const preview = document.querySelector('.preview');
        image.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                previewContainer.style.display = 'block';
                preview.style.display = 'block';

                reader.addEventListener('load', function() {
                    preview.setAttribute('src', this.result);
                });

                reader.readAsDataURL(file);
            } else {
                previewContainer.style.display = null;
                preview.style.display = null;
                preview.setAttribute('src', '');
            }
        });
    </script>

@endsection
