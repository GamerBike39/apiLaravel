<div class="container mt-5">
    <h1>Liste des livres</h1>


    <div class="row">
        <div class="col-md-4 d-flex items-center gap-4">
            <input type="text" name="search" id="search" class="form-control" placeholder="Rechercher un livre"
                wire:model.debounce.200ms="search">
            <div class="col-lg-1 my-3">
                <a class="btn btn-primary" href="{{ url('livre/create') }}">Ajouter </a>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <x-table-header :direction="$orderDirection" name="title" :field='$orderField'>Titre
                    </x-table-header>
                    <x-table-header :direction="$orderDirection" name="author" :field='$orderField'>Auteur
                    </x-table-header>
                    <th class='col-1'>Image</th>
                    <th>Description</th>
                    <x-table-header :direction="$orderDirection" name="price" :field='$orderField'>Prix
                    </x-table-header>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="empty">
                @foreach ($livres as $livre)
                    <tr>
                        <td class="align-middle">{{ $livre->title }}</td>
                        <td class="align-middle">{{ $livre->author }}</td>
                        <td class="align-middle"><img src="{{ Storage::url($livre->image) }}" alt="Cover"></td>
                        <td class="align-middle">{{ $livre->desc }}</td>
                        <td class="align-middle">{{ $livre->price }} €</td>
                        <td class="align-middle">
                            <form action="{{ url('livre/' . $livre->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="d-flex gap-2 px-3 align-middle">
                                    <a class="btn btn-primary" href="{{ url('livre/' . $livre->id) }}">👀</a>
                                    <a class="btn btn-primary" href="{{ route('livre.edit', $livre->id) }}">✍️</a>
                                    <button type="submit" class="btn btn-danger">🗑️</button>
                                </div>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if ($livres->isEmpty())
            <div class="alert alert-danger">
                <p>Aucun résultat pour la recherche "{{ $search }}"</p>
            </div>
        @endif

        <div class="d-flex justify-content-center item-center">
            {{ $livres->links() }}
        </div>

    </div>
</div>
