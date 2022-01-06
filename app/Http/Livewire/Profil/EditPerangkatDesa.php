<?php

namespace App\Http\Livewire\Profil;

use App\Models\ProfilDesa;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPerangkatDesa extends Component
{
    use WithFileUploads;
    public $perangkat_desa, $gambar;
    public function render()
    {
        $this->gambar = ProfilDesa::find(1)->perangkat_desa;
        return view('livewire.profil.edit-perangkat-desa');
    }

    public function update()
    {

        $profil = ProfilDesa::find(1);
        $dataValid = $this->validate([
            'perangkat_desa' => 'required|image|max:2048',
        ]);
        if (Storage::disk('public')->exists($profil->perangkat_desa)) {
            Storage::disk('public')->delete($profil->perangkat_desa);
        }
        $dataValid['perangkat_desa'] = $this->perangkat_desa->store('images', 'public');
        $profil->update($dataValid);

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Perangkat Desa Berhasil Diubah!',
            'text' => 'perubahan ini telah disimpan di tabel Profil Desa.'
        ]);
    }
}
