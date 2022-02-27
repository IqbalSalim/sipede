<?php

namespace App\Http\Livewire\Rapbdes;

use App\Models\KategoriPendapatan;
use App\Models\Pendapatan;
use App\Models\Usulan;
use Livewire\Component;

class CreateRapbdes extends Component
{
    public $kategories;
    public $tahun, $kategori, $uraian, $anggaran, $sumberDana;
    public function mount()
    {
        $this->kategories = KategoriPendapatan::all();


        $this->tahun = (string) date('Y') + 1;
    }

    public function render()
    {
        return view('livewire.rapbdes.create-rapbdes', [
            'tahuns' => Usulan::select('tahun')->groupBy('tahun')->orderBy('tahun')->get(),
        ]);
    }

    public function store()
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

        Pendapatan::create([
            'kategori_id' => $this->kategori,
            'uraian' => $this->uraian,
            'anggaran' => $this->anggaran,
            'sumber_dana' => $this->sumberDana,
            'tahun' => $this->tahun,
        ]);


        $this->emit('render');
        $this->resetForm();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Pendapatan Berhasil Ditambahkan!',
            'text' => 'ini telah disimpan di tabel Pendapatan.'
        ]);
    }

    public function resetForm()
    {
        $this->tahun = null;
        $this->kategori = null;
        $this->uraian = null;
        $this->anggaran;
        $this->sumberDana;
    }
}
