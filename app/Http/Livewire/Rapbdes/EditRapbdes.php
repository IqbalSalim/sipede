<?php

namespace App\Http\Livewire\Rapbdes;

use App\Models\KategoriPendapatan;
use App\Models\Pendapatan;
use App\Models\Usulan;
use Livewire\Component;

class EditRapbdes extends Component
{
    public $tahun, $kategori, $uraian, $anggaran, $sumberDana, $pendapatan;

    protected $listeners = ['getPendapatan'];

    public function render()
    {
        return view('livewire.rapbdes.edit-rapbdes', [
            'kategories' => KategoriPendapatan::all(),
            'tahuns' => Usulan::select('tahun')->groupBy('tahun')->orderBy('tahun')->get(),
        ]);
    }

    public function getPendapatan($id)
    {
        $this->resetErrorBag();
        $row = Pendapatan::find($id);
        $this->pendapatan = $row;
        $this->tahun = $row->tahun;
        $this->kategori = $row->kategori_id;
        $this->uraian = $row->uraian;
        $this->anggaran = $row->anggaran;
        $this->sumberDana = $row->sumber_dana;
    }

    public function update()
    {
        $this->validate(
            [
                'tahun' => 'required',
                'kategori' => 'required',
                'uraian' => 'required|string',
                'anggaran' => 'required|integer',
                'sumberDana' => 'required|string',
            ],
            [],
            [
                'tahun' => 'Tahun',
                'kategori' => 'Kategori',
                'uraian' => 'Uraian',
                'anggaran' => 'Anggaran',
                'sumberDana' => 'Sumber Dana',
            ]
        );

        $this->pendapatan->update([
            'kategori_id' => $this->kategori,
            'uraian' => $this->uraian,
            'anggaran' => $this->anggaran,
            'sumber_dana' => $this->sumberDana,
            'tahun' => $this->tahun,
        ]);


        $this->emit('render');
        $this->resetForm();
        $this->dispatchBrowserEvent('close-modal-edit');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Pendapatan Berhasil Diubah!',
            'text' => 'ini telah disimpan di tabel Pendapatan.'
        ]);
    }

    public function resetForm()
    {
        $this->pendapatan = null;
        $this->tahun = null;
        $this->kategori = null;
        $this->uraian = null;
        $this->anggaran = null;
        $this->sumberDana = null;
        $this->resetErrorBag();
    }
}
