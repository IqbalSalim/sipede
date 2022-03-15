<?php

namespace App\Http\Livewire\Realisasi;

use App\Models\Realisasi;
use Livewire\Component;

class UpdateRealisasi extends Component
{
    public $rincian, $harga, $realisasi;

    protected $listeners = [
        'getRealisasi',
    ];

    public function render()
    {
        return view('livewire.realisasi.update-realisasi');
    }

    public function getRealisasi($id)
    {
        $realisasi = Realisasi::find($id);
        $this->rincian = $realisasi->uraian;
        $this->harga = $realisasi->harga;
        $this->realisasi = $realisasi;
    }

    public function resetForm()
    {
        $this->realisasiId = null;
        $this->rincian = null;
        $this->harga = null;
    }

    public function update()
    {
        $this->validate(
            [
                'rincian' => 'required|string|max:255',
                'harga' => 'required|integer',
            ],
            [],
            [
                'rincian' => 'Rincian',
                'harga' => 'Harga',
            ]
        );
        $this->realisasi->update([
            'uraian' => $this->rincian,
            'harga' => $this->harga
        ]);
        $this->emit('render');
        $this->resetForm();
        $this->dispatchBrowserEvent('close-modal-edit');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Realisasi Kegiatan Berhasil Diubah!',
            'text' => 'perubahan ini telah disimpan di tabel Realisasi Kegiatan.'
        ]);
    }
}
