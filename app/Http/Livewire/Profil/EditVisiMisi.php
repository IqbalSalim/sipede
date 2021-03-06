<?php

namespace App\Http\Livewire\Profil;

use App\Models\ProfilDesa;
use Livewire\Component;

class EditVisiMisi extends Component
{
    public $visiMisi;

    public function mount()
    {
        $profil = ProfilDesa::first();
        if (!$profil) {
            return $this->visiMisi = '';
        }
        $this->visiMisi = $profil->visi_misi;
    }


    public function render()
    {
        return view('livewire.profil.edit-visi-misi');
    }

    public function update()
    {
        $profil = ProfilDesa::first();
        if (!$profil) {
            ProfilDesa::create([
                'visi_misi' => $this->visiMisi,
            ]);
        } else {
            $profil->update([
                'visi_misi' => $this->visiMisi,
            ]);
        }

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Visi Misi Desa Berhasil Diubah!',
            'text' => 'perubahan ini telah disimpan di tabel Profil Desa.'
        ]);
    }
}
