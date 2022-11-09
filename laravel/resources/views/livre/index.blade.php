<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Livres') }}
        </h2>
    </x-slot>

    <livewire:livres-table />

    {{-- @section('content')
        <livewire:livres-table />
    @endsection --}}


</x-app-layout>
