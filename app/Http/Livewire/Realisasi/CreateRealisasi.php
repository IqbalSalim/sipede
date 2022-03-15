<?php

namespace App\Http\Livewire\Realisasi;

use App\Models\Realisasi;
use Livewire\Component;

class CreateRealisasi extends Component
{
    public $kegiatanId, $rincian, $harga;

    protected $listeners = [
        'getKegiatan',
    ];

    public function render()
    {
        return view('livewire.realisasi.create-realisasi');
    }

    public function getKegiatan($id)
    {
        $this->kegiatanId = $id;
    }

    public function store()
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

        Realisasi::create([
            'usulan_id' => $this->kegiatanId,
            'uraian' => $this->rincian,
            'harga' => $this->harga

        ]);

        $this->emit('render');
        $this->resetForm();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Rincian Kegiatan Berhasil Ditambahkan!',
            'text' => 'ini telah disimpan di tabel Rincian Kegiatan.'
        ]);
    }

    public function resetForm()
    {
        $this->kegiatanId = null;
        $this->rincian = null;
        $this->harga = null;
    }
}
