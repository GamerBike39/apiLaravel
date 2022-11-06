<?php

namespace App\Http\Livewire;

use App\Models\Livre;
use Livewire\Component;
use Livewire\WithPagination;

class LivresTable extends Component
{

    use WithPagination;

    public string $search = '';
    public string $orderField = 'title';
    public string $orderDirection = 'ASC';
    public int $editId = 0;


    public function setOrderField(string $title)
    {
        if ($this->orderField === $title) {
            $this->orderDirection = $this->orderDirection === 'ASC' ? 'DESC' : 'ASC';
        } else {
            $this->orderField = $title;
            $this->orderDirection = 'ASC';
        }
    }

    public function startEdit(int $id)
    {
        $this->editId = $id;
    }







    public function render()
    {
        $livres = Livre::where('title', 'like', '%' . $this->search . '%')
            ->orWhere('author', 'like', '%' . $this->search . '%')
            ->orWhere('desc', 'like', '%' . $this->search . '%')
            ->orWhere('price', 'like', '%' . $this->search . '%')
            ->orderBy($this->orderField, $this->orderDirection)
            // ->get();
            ->paginate(4);
        return view('livewire.livres-table', compact('livres'));
    }

    public function queryString()
    {
        return [
            'search' => ['except' => ''],
            'orderField' => ['except' => 'title'],
            'orderDirection' => ['except' => 'ASC'],
        ];
    }

    public function paginationView()
    {
        return 'livewire.pagination';
    }

    public function onLivreSaved()
    {
        $this->reset('editId');
    }


}
