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

    public function mount()
    {
    }
    public function render()
    {
        $profil = ProfilDesa::first();
        if (!$profil) {
            $this->gambar = 'images/no-image.jpg';
        } else {
            $this->gambar = 'storage/' . $profil->perangkat_desa;
        }
        return view('livewire.profil.edit-perangkat-desa');
    }

    public function update()
    {
        $dataValid = $this->validate([
            'perangkat_desa' => 'required|image|max:2048',
        ]);
        $profil = ProfilDesa::first();
        if (!$profil) {
            $dataValid['perangkat_desa'] = $this->perangkat_desa->store('images', 'public');
            ProfilDesa::create($dataValid);
        } else {
            if (Storage::disk('public')->exists($profil->perangkat_desa)) {
                Storage::disk('public')->delete($profil->perangkat_desa);
            }
            $dataValid['perangkat_desa'] = $this->perangkat_desa->store('images', 'public');
            $profil->update($dataValid);
        }

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Perangkat Desa Berhasil Diubah!',
            'text' => 'perubahan ini telah disimpan di tabel Profil Desa.'
        ]);
    }
}
