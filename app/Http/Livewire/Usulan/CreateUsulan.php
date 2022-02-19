<?php

namespace App\Http\Livewire\Usulan;

use App\Models\Bidang;
use App\Models\Kegiatan;
use App\Models\Rkpdes;
use App\Models\Subbidang;
use App\Models\Usulan;
use Livewire\Component;

class CreateUsulan extends Component
{
    public $bidangs = null, $subbidangs = null, $kegiatans = null, $tahuns = null;
    public $bidang, $subbidang, $kegiatan, $lokasi, $tahun;


    public function mount()
    {
        $this->bidangs = Bidang::select('id', 'nama')->get();
        $this->tahuns = collect(range(6, -4))->map(function ($item) {
            return (string) date('Y') - $item;
        });
        $this->tahun = (string) date('Y') + 1;
    }
    public function render()
    {
        return view('livewire.usulan.create-usulan');
    }

    public function changeBidang()
    {
        if ($this->bidang != '') {
            return $this->subbidangs = Subbidang::where('bidang_id', '=', $this->bidang)->get();
        }
        return $this->subbidangs = null;
    }

    public function changeSubBidang()
    {
        if ($this->subbidang != '') {
            return $this->kegiatans = Kegiatan::where('subbidang_id', $this->subbidang)->get();
        }
        return $this->kegiatans = null;
    }

    public function store($formData)
    {
        $this->lokasi = $formData['lokasi'];
        $this->validate(
            [
                'tahun' => 'required',
                'bidang' => 'required',
                'subbidang' => 'required',
                'kegiatan' => 'required',
                'lokasi' => 'required',
            ],
            [],
            [
                'tahun' => 'Tahun',
                'bidang' => 'Bidang',
                'subbidang' => 'Sub Bidang',
                'kegiatan' => 'Kegiatan',
                'lokasi' => 'Lokasi',
            ]
        );

        Usulan::create([
            'kegiatan_id' => $this->kegiatan,
            'tahun' => $this->tahun,
            'status' => 'verifikasi',
            'lokasi' => $this->lokasi
        ]);


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
        $this->bidang = null;
        $this->subbidang = null;
        $this->kegiatan = null;
        $this->tahun = (string) date('Y') + 1;
        $this->lokasi = null;
        $this->subbidangs = null;
        $this->kegiatans = null;
        $this->dispatchBrowserEvent('items-load');
    }
}
