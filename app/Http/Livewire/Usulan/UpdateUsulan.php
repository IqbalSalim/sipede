<?php

namespace App\Http\Livewire\Usulan;

use App\Models\Bidang;
use App\Models\Kegiatan;
use App\Models\Rkpdes;
use App\Models\Subbidang;
use App\Models\Usulan;
use Livewire\Component;

class UpdateUsulan extends Component
{
    public $bidangs = null, $subbidangs = null, $kegiatans = null, $tahuns = null;
    public $bidang, $subbidang, $kegiatan, $lokasi, $tahun, $usulan_id, $usulan;
    protected $listeners = ['getUsulan'];

    public function mount()
    {
        $this->bidangs = Bidang::select('id', 'nama')->get();
        $this->tahuns = collect(range(6, -4))->map(function ($item) {
            return (string) date('Y') - $item;
        });
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

    public function render()
    {
        return view('livewire.usulan.update-usulan');
    }

    public function getUsulan($id)
    {
        $usulan = Usulan::find($id);
        $this->tahun = $usulan->tahun;
        $this->bidang = $usulan->kegiatan->subbidang->bidang_id;
        $this->subbidangs = Subbidang::where('bidang_id', '=', $this->bidang)->get();

        $this->subbidang = $usulan->kegiatan->subbidang_id;
        $this->kegiatans = Kegiatan::where('subbidang_id', $this->subbidang)->get();
        $this->kegiatan = $usulan->kegiatan->id;
        $this->lokasi = $usulan->lokasi;
        $this->usulan = $usulan;
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

    public function update($formData)
    {
        if ($formData['lokasi'] !== '') {
            $this->lokasi = $formData['lokasi'];
        }
        $dataValid = $this->validate(
            [
                'tahun' => 'required',
                'bidang' => 'required',
                'subbidang' => 'required',
                'kegiatan' => 'required',
                'lokasi' => 'required',
            ],
            [],
            []
        );
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
