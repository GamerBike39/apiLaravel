{{-- <td colspan="6"> --}}
<form action="" enctype="multipart/form-data">
    {{-- <div class="field form-group mb-3">
            <label for="title">Titre</label>
            <input type="text" class="form-control" name="title" id="title" wire:model.defer="livre.title">
        </div> --}}
    {{-- <div class="field form-group mb-3">
            <label for="author">Auteur</label>
            <input type="text" class="form-control" name="author" id="author" wire:model.defer="livre.author">
        </div> --}}
    {{-- <div class="field form-group mb-3">
            <label for="desc">Description</label>
            <textarea name="desc" class="form-control" id="desc" cols="30" rows="5"
                wire:model.defer="livre.desc"></textarea>
        </div> --}}
    <div class="field form-group mb-3">
        <label for="price">Prix</label>
        <input type="number" class="form-control" name="price" id="price" wire:model.defer="livre.price">
    </div>
    {{-- <div class="field form-group mb-3">
            @if ($image)
                Photo Preview:
                <img src="{{ $image->temporaryUrl() }}">
            @endif
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" id="image" wire:model="livre.image">
        </div> --}}
    {{-- <div>
            <label for="image">Image de couverture</label>
            <input type="file" class='form-control' id="image" name="image">
        </div> --}}
    <div class="field form-group mb-3">
        <button type="submit" class="btn btn-primary" wire:click.prevent="save">🔃</button>
    </div>
</form>
{{-- </td> --}}
