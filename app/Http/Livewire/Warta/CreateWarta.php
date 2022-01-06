<?php

namespace App\Http\Livewire\Warta;

use App\Models\Warta;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateWarta extends Component
{
    use WithFileUploads;

    public $judul, $isi, $penulis, $gambar;

    public function render()
    {
        return view('livewire.warta.create-warta');
    }

    public function resetForm()
    {
        $this->judul = null;
        $this->isi = null;
        $this->penulis = null;
        $this->gambar = null;
    }

    public function store()
    {

        $this->validate(
            [
                'judul' => 'required|string|max:255',
                'isi' => 'required|string',
                'penulis' => 'required|string|max:255',
                'gambar' => 'image|max:1024',

            ]
        );
        $gambar = $this->gambar->store('images', 'public');

        Warta::create([
            'judul' => $this->judul,
            'isi' => $this->isi,
            'penulis' => $this->penulis,
            'gambar' => $gambar,
        ]);

        $this->emit('render');
        $this->resetForm();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Warta Kegiatan Berhasil Ditambahkan!',
            'text' => 'ini telah disimpan di tabel Warta Kegiatan.'
        ]);
    }
}
