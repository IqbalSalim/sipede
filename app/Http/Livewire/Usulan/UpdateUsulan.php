<?php

namespace App\Http\Livewire\Usulan;

use App\Models\Rkpdes;
use Livewire\Component;

class UpdateUsulan extends Component
{
    public $kategori, $kegiatan, $lokasi, $usulan_id, $usulan;
    protected $listeners = ['getUsulan'];

    public function render()
    {
        return view('livewire.usulan.update-usulan');
    }

    public function getUsulan($id)
    {
        $this->usulan = Rkpdes::find($id);
        $this->kategori = $this->usulan->kategori;
        $this->kegiatan = $this->usulan->kegiatan;
        $this->lokasi = $this->usulan->lokasi;
        $this->usulan_id = $this->usulan->id;
    }

    public function resetForm()
    {
        $this->kategori = null;
        $this->kegiatan = null;
        $this->lokasi = null;
        $this->usulan_id = null;
        $this->usulan = null;
    }

    public function update()
    {
        $dataValid = $this->validate([
            'kategori' => 'required|string',
            'kegiatan' => 'required|string',
            'lokasi' => 'required|string',
        ]);
        $this->usulan->update($dataValid);
        $this->emit('render');
        $this->resetForm();
        $this->dispatchBrowserEvent('close-modal-edit');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Usulan Kegiatan Berhasil Diubah!',
            'text' => 'perubahan ini telah disimpan di tabel Usulan Kegiatan.'
        ]);
    }
}
