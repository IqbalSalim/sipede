<?php

namespace App\Http\Livewire\Profil;

use App\Models\ProfilDesa;
use Livewire\Component;

class IndexProfil extends Component
{
    public  $profil;

    public function render()
    {
        $this->profil = ProfilDesa::find(1);
        return view('livewire.profil.index-profil')->layout('layouts.guest');
    }
}
