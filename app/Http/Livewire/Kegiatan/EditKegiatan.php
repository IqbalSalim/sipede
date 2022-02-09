<?php

namespace App\Http\Livewire\Kegiatan;

use App\Models\Bidang;
use App\Models\Kegiatan;
use App\Models\Subbidang;
use Livewire\Component;

class EditKegiatan extends Component
{
    public $bidangs = null, $subbidangs = null;
    public $bidang, $subbidang, $kegiatan, $kd_rek, $row;
    protected $listeners = ['getKegiatan'];

    public function mount()
    {
        $this->bidangs = Bidang::select('id', 'nama')->get();
    }

    public function getKegiatan($kegiatan_id)
    {
        $this->resetErrorBag();
        $this->row = Kegiatan::find($kegiatan_id);
        $this->subbidangs = Subbidang::where('bidang_id', '=', $this->row->subbidang->bidang->id)->get();
        $this->bidang = $this->row->subbidang->bidang->id;
        $this->subbidang = $this->row->subbidang->id;
        $this->kegiatan = $this->row->nama;
        $this->kd_rek = $this->row->kd_rek;
    }

    public function changeBidang()
    {
        if ($this->bidang != '') {
            $this->subbidang = null;
            return $this->subbidangs = Subbidang::where('bidang_id', '=', $this->bidang)->get();
        }
        return $this->subbidangs = null;
    }

    public function update()
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

        $this->row->update([
            'subbidang_id' => $this->subbidang,
            'kd_rek' => $this->kd_rek,
            'nama' => $this->kegiatan,
        ]);

        $this->emit('render');
        $this->resetForm();
        $this->dispatchBrowserEvent('close-modal-edit');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Kegiatan Berhasil Diubah!',
            'text' => 'ini telah disimpan di tabel Kegiatan.'
        ]);
    }

    public function resetForm()
    {
        $this->bidang = null;
        $this->subbidang = null;
        $this->kegiatan = null;
        $this->kd_rek = null;

        $this->subbidangs = null;
        $this->row = null;
    }

    public function render()
    {
        return view('livewire.kegiatan.edit-kegiatan');
    }
}
