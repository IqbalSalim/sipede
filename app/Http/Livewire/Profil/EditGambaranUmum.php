<?php

namespace App\Http\Livewire\Profil;

use App\Models\ProfilDesa;
use Livewire\Component;

class EditGambaranUmum extends Component
{
    public $gambaranUmum;

    public function mount()
    {
        $profil = ProfilDesa::find(1);
        $this->gambaranUmum = $profil->gambaran_umum;
    }

    public function render()
    {
        return view('livewire.profil.edit-gambaran-umum');
    }

    public function update()
    {
        $profil = ProfilDesa::find(1);
        $profil->update([
            'gambaran_umum' => $this->gambaranUmum,
        ]);
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Gambaran Umum Desa Berhasil Diubah!',
            'text' => 'perubahan ini telah disimpan di tabel Profil Desa.'
        ]);
    }
}
