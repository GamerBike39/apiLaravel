<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Livre;
use Livewire\Component;

class LivreForm extends Component
{

    public User $user;
    public Livre $livre;

    protected $rules = [
        'livre.title' => 'required|string|min:3',
        'livre.author' => 'required|string|min:3',
        'livre.desc' => 'required|string|min:3',
        'livre.price' => 'required|numeric|min:1',
        // 'livre.image' => 'required',
    ];

    public function save()
    {
        $this->validate();
        $this->livre->save();
        $this->emit('livreSaved');
    }

    // protected $listeners = ['livreSaved' => 'onLivreSaved'];

    public function onLivreSaved()
    {
        $this->reset('editId');
    }

    public function update()
    {
        $this->validate();
        $this->livre->save();
        $this->emit('livreUpdated');
    }






    public function render()
    {
        return view('livewire.livre-form');
    }





}
