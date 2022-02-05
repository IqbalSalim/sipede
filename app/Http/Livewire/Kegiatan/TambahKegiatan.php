<?php

namespace App\Http\Livewire\Kegiatan;

use App\Models\Bidang;
use App\Models\Kegiatan;
use App\Models\Subbidang;
use Livewire\Component;

class TambahKegiatan extends Component
{
    public $bidangs = null, $subbidangs = null;
    public $bidang, $subbidang, $kegiatan, $kd_rek;

    public function mount()
    {
        $this->bidangs = Bidang::select('id', 'nama')->get();
    }

    public function render()
    {
        return view('livewire.kegiatan.tambah-kegiatan');
    }

    public function changeBidang()
    {
        if ($this->bidang != '') {
            return $this->subbidangs = Subbidang::where('bidang_id', '=', $this->bidang)->get();
        }
        return $this->subbidangs = null;
    }

    public function store()
    {
        $this->validate(
            [
                'bidang' => 'required',
                'subbidang' => 'required',
                'kegiatan' => 'required',
                'kd_rek' => 'required|numeric',
            ],
            [],
            [
                'bidang' => 'Bidang',
                'subbidang' => 'Sub Bidang',
                'kegiatan' => 'Kegiatan',
                'kd_rek' => 'Kode Rekening',
            ]
        );

        Kegiatan::create([
            'subbidang_id' => $this->subbidang,
            'kd_rek' => $this->kd_rek,
            'nama' => $this->kegiatan,
        ]);

        $this->emit('render');
        $this->resetForm();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Kegiatan Berhasil Ditambahkan!',
            'text' => 'ini telah disimpan di tabel Kegiatan.'
        ]);
    }

    public function resetForm()
    {
        $this->bidang = null;
        $this->subbidang = null;
        $this->kegiatan = null;
        $this->kd_rek = null;
    }
}
