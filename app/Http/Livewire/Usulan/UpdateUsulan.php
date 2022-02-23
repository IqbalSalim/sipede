<?php

namespace App\Http\Livewire\Usulan;

use App\Models\Bidang;
use App\Models\Rkpdes;
use App\Models\Usulan;
use Livewire\Component;

class UpdateUsulan extends Component
{
    public $bidangs = null, $subbidangs = null, $kegiatans = null, $tahuns = null;
    public $bidang, $subbidang, $kegiatan, $lokasi, $tahun, $usulan_id;
    protected $listeners = ['getUsulan'];

    public function mount()
    {
        $this->bidangs = Bidang::select('id', 'nama')->get();
        $this->tahuns = collect(range(6, -4))->map(function ($item) {
            return (string) date('Y') - $item;
        });
    }

    public function render()
    {
        return view('livewire.usulan.update-usulan');
    }

    public function getUsulan($id)
    {
        $usulan = Usulan::find($id);
        $this->tahun = $usulan->tahun;
        $this->bidang = $usulan->kegiatan->subbidang->bidang_id;
        $this->subbidang = $usulan->kegiatan->subbidang_id;
        $this->kegiatan = $usulan->kegiatan->nama;
        $this->lokasi = $usulan->kegiatan->nama;
    }

    public function resetForm()
    {
        $this->kategori = null;
        $this->kegiatan = null;
        $this->lokasi = null;
        $this->usulan_id = null;
        $this->usulan = null;
        $this->resetValidation();
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
