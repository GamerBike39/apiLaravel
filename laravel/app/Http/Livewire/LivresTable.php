<?php

namespace App\Http\Livewire;

use App\Models\Livre;
use Livewire\Component;
use Livewire\WithPagination;

class LivresTable extends Component
{

    use WithPagination;

    public string $search = '';
    public function render()
    {
        // multiple search
        $livres = Livre::where('title', 'like', '%' . $this->search . '%')
            ->orWhere('author', 'like', '%' . $this->search . '%')
            ->orWhere('desc', 'like', '%' . $this->search . '%')
            ->orWhere('price', 'like', '%' . $this->search . '%')
            // ->get();
            ->paginate(4);
        return view('livewire.livres-table', compact('livres'));
    }

    public function queryString()
    {
        return [
            'search' => ['except' => ''],
        ];
    }

    public function paginationView()
    {
        return 'livewire.pagination';
    }


}
