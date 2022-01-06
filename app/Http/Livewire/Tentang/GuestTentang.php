<?php

namespace App\Http\Livewire\Tentang;

use Livewire\Component;

class GuestTentang extends Component
{
    public function render()
    {
        return view('livewire.tentang.guest-tentang')->layout('layouts.guest');
    }
}
