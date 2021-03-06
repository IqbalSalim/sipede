<?php

namespace App\Http\Livewire\Profil;

use App\Models\ProfilDesa;
use Livewire\Component;

class EditSejarahDesa extends Component
{
    public $sejarahDesa;

    public function mount()
    {
        $profil = ProfilDesa::first();
        if (!$profil) {
            return $this->sejarahDesa = '';
        }
        $this->sejarahDesa = $profil->sejarah_desa;
    }
    public function render()
    {
        return view('livewire.profil.edit-sejarah-desa');
    }

    public function update()
    {
        $profil = ProfilDesa::first();
        if (!$profil) {
            ProfilDesa::create([
                'sejarah_desa' => $this->sejarahDesa,
            ]);
        } else {
            $profil->update([
                'sejarah_desa' => $this->sejarahDesa,
            ]);
        }
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Sejarah Desa Berhasil Diubah!',
            'text' => 'perubahan ini telah disimpan di tabel Profil Desa.'
        ]);
    }
}
