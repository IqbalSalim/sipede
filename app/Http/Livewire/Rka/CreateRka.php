<?php

namespace App\Http\Livewire\Rka;

use App\Models\Rka;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateRka extends Component
{
    use WithFileUploads;
    public $nama, $filename;

    public function render()
    {
        return view('livewire.rka.create-rka');
    }

    public function resetForm()
    {
        $this->nama = null;
        $this->file = null;
    }

    public function store()
    {
        $dataValid = $this->validate([
            'nama' => 'required|string',
            'filename' => 'required|file|mimes:pdf|max:1024',
        ]);
        $dataValid['filename'] = $this->filename->store('files', 'public');
        Rka::create($dataValid);
        $this->emit('render');
        $this->resetForm();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'RKA Desa Berhasil Ditambahkan!',
            'text' => 'ini telah disimpan di tabel RKA Desa.'
        ]);
    }
}
