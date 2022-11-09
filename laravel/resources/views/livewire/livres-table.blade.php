<div x-data="{ selection: @entangle('selection').defer }" class="container mt-5">
    {{-- <span x-html="JSON.stringify(selection)"></span> --}}

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible">
            {{ session('success') }}
        </div>
    @endif


    <h1>Liste des livres</h1>


    <div class="row">
        <div class="col-md-4 d-flex items-center gap-4">
            <input type="text" name="search" id="search" class="form-control" placeholder="Rechercher un livre"
                wire:model.debounce.200ms="search">
            <div class="col-lg-1 my-3">
                <a class="btn btn-primary" href="{{ route('livre.create') }}">Ajouter </a>
            </div>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>
                        <button class="btn btn-danger" x-show="selection.length > 0"
                            x-on:click="$wire.deleteLivres(selection)">Supprimer</button>
                    </th>
                    <x-table-header :direction="$orderDirection" name="title" :field='$orderField'>Titre
                    </x-table-header>
                    <x-table-header :direction="$orderDirection" name="author" :field='$orderField'>Auteur
                    </x-table-header>
                    <th class='col-1 text-center'>Image</th>
                    <th>Description</th>
                    <x-table-header :direction="$orderDirection" name="price" :field='$orderField'>Prix
                    </x-table-header>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="empty">
                @foreach ($livres as $livre)
                    <tr>
                        <td class="align-middle">
                            <input type="checkbox" x-model="selection" value="{{ $livre->id }}">
                        </td>
                        <td class="align-middle">{{ $livre->title }}</td>
                        <td class="align-middle">{{ $livre->author }}</td>
                        <td class="align-middle"><img src="{{ Storage::url($livre->image) }}" alt="Cover"
                                class="coverImg"></td>
                        <td class="align-middle">{{ $livre->desc }}</td>
                        <td class="align-middle text-center">{{ $livre->price }} € <button class="btn"
                                wire:click="startEdit({{ $livre->id }})">✍️</button>
                            @if ($editId === $livre->id)
                                <livewire:livre-form :livre="$livre" :key='$livre->id' />
                            @endif
                        </td>
                        <td class="align-middle">
                            <form action="{{ url('livre/' . $livre->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="d-flex gap-2 px-3 align-middle justify-center">
                                    <a class="btn btn-primary" href="{{ url('livre/' . $livre->id) }}">👀</a>
                                    <a class="btn btn-primary" href="{{ route('livre.edit', $livre->id) }}">✍️</a>
                                    <button type="submit" class="btn btn-danger">🗑️</button>
                                </div>
                            </form>
                        </td>
                        {{-- <td>
                            <button class="btn btn-primary" wire:click="startEdit({{ $livre->id }})">€</button>
                        </td> --}}
                    </tr>

                    @if ($editId === $livre->id)
                        <tr>
                            <livewire:livre-form :livre="$livre" :key='$livre->id' />
                        </tr>
                    @endif
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

        <a href="http://127.0.0.1:8000/livres">Liste sous forme JSON</a>

    </div>
</div>
