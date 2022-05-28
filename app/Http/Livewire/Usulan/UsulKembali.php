<?php

namespace App\Http\Livewire\Usulan;

use App\Models\Usulan;
use Livewire\Component;

class UsulKembali extends Component
{
    public $kegiatan;

    protected $listeners = [
        'getUsulKembali'
    ];

    public function mount()
    {
        $this->tahuns = collect(range(6, -4))->map(function ($item) {
            return (string) date('Y') - $item;
        });
        $this->tahun = (string) date('Y') + 1;
    }

    public function render()
    {
        return view('livewire.usulan.usul-kembali');
    }

    public function resetForm()
    {
        $this->tahun = (string) date('Y') + 1;
        $this->resetValidation();
    }

    public function getUsulKembali($id)
    {
        $this->kegiatan =  Usulan::find($id);
    }

    public function store()
    {
        Usulan::create([
            'kegiatan_id' => $this->kegiatan->kegiatan_id,
            'tahun' => $this->tahun,
            'status' => 'verifikasi',
            'lokasi' => $this->kegiatan->lokasi
        ]);

        $this->emit('render');
        $this->resetForm();
        $this->dispatchBrowserEvent('close-usul-kembali');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Usulan Kegiatan Berhasil Ditambahkan!',
            'text' => 'ini telah disimpan di tabel Usulan Kegiatan.'
        ]);
    }
}
