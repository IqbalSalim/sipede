<?php

namespace App\Http\Livewire\Realisasi;

use Livewire\Component;

class GuestRealisasi extends Component
{
    public function render()
    {
        return view('livewire.realisasi.guest-realisasi')->layout('layouts.guest');
    }
}
