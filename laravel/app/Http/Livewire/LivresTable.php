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
    public array $selection = [];


    public function setOrderField(string $title)
    {
        if ($this->orderField === $title) {
            $this->orderDirection = $this->orderDirection === 'ASC' ? 'DESC' : 'ASC';
        } else {
            $this->orderField = $title;
            $this->orderDirection = 'ASC';
        }
    }


    public function deleteLivres(array $id){
        Livre::destroy($id);
        session()->flash('success', 'Votre sélection à bien été supprimée');
        $this->selection = [];
    }



    public function startEdit(int $id)
    {
        $this->editId = $id;
    }

    protected $listeners = ['livreSaved' => 'onLivreSaved'];

    public function onLivreSaved()
    {
        session()->flash('success', 'Livre bien mis à jour.');
        $this->reset('editId');
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

    public function selection()
    {
        $this->emit('livresSelected', $this->selection);
    }

    public function livresSelected($livres)
    {
        $this->selection = $livres;
    }






}
