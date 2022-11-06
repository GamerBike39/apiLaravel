@if ($name == 'price')
    <th wire:click="setOrderField('{{ $name }}')" class="col-1 text-center click">
    @else
    <th wire:click="setOrderField('{{ $name }}')" class="col-2 click">
@endif
{{ $slot }}
@if ($visible)
    @if ($direction == 'ASC')
        <i class="fas fa-sort-up"></i>
    @else
        <i class="fas fa-sort-down"></i>
    @endif
@endif
</th>
