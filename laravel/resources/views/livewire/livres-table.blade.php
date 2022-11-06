<div x-data="{ selection: @entangle('selection').defer }" class="container mt-5">
    {{-- <span x-html="JSON.stringify(selection)"></span> --}}

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <h1>Liste des livres</h1>


    <div class="row">
        <div class="col-md-4 d-flex items-center gap-4">
            <input type="text" name="search" id="search" class="form-control" placeholder="Rechercher un livre"
                wire:model.debounce.200ms="search">
            <div class="col-lg-1 my-3">
                <a class="btn btn-primary" href="{{ url('livre/create') }}">Ajouter </a>
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
                        <td>
                            <input type="checkbox" x-model="selection" value="{{ $livre->id }}">
                        </td>
                        <td class="align-middle">{{ $livre->title }}</td>
                        <td class="align-middle">{{ $livre->author }}</td>
                        <td class="align-middle"><img src="{{ Storage::url($livre->image) }}" alt="Cover"
                                class="coverImg"></td>
                        <td class="align-middle">{{ $livre->desc }}</td>
                        <td class="align-middle text-center">{{ $livre->price }} €</td>
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
                        <td>
                            <button class="btn btn-primary" wire:click="startEdit({{ $livre->id }})">Editer</button>
                        </td>
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

    </div>
</div>




<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5><button type="button" class="close"
                    data-dismiss="modal" aria-label="Close"><span aria-hidden="true close-btn">×</span></button>
            </div>
            <div class="modal-body">
                <p>Are you sure want to delete?</p>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-secondary close-btn"
                    data-dismiss="modal">Close</button><button type="button" wire:click.prevent="delete()"
                    class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete</button></div>
        </div>
    </div>
</div>
</div>
</div>
</div>
