<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Livre;
use Livewire\Component;
// use Livewire\WithFileUploads;

class LivreForm extends Component
{

    public User $user;
    public Livre $livre;
    // use WithFileUploads;
    // public $image;

    // update image with new image in storage


    protected $rules = [
        'livre.title' => 'required|string|min:3',
        'livre.author' => 'required|string|min:3',
        'livre.desc' => 'required|string|min:3',
        'livre.price' => 'required|numeric|min:1',
        // 'livre.image' => 'image|max:1024', // 1MB Max

    ];

    public function save()
    {
        $this->validate();
        // $this->image->store('image', 'public');
        $this->livre->save();
        $this->emit('livreSaved');
    }


        public function render()
    {
        return view('livewire.livre-form');
    }




}
