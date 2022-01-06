<?php

namespace App\Http\Livewire\Usulan;

use App\Models\Rkpdes;
use Livewire\Component;

class CreateUsulan extends Component
{
    public $kategori, $kegiatan, $lokasi;
    public function render()
    {
        return view('livewire.usulan.create-usulan');
    }

    public function store()
    {
        $dataValid = $this->validate([
            'kategori' => 'required|string',
            'kegiatan' => 'required|string',
            'lokasi' => 'required|string',
        ]);
        Rkpdes::create($dataValid);
        $this->emit('render');
        $this->resetForm();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Usulan Kegiatan Berhasil Ditambahkan!',
            'text' => 'ini telah disimpan di tabel Usulan Kegiatan.'
        ]);
    }

    public function resetForm()
    {
        $this->kategori = null;
        $this->kegiatan = null;
        $this->lokasi = null;
    }
}
