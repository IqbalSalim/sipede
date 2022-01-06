<?php

namespace App\Http\Livewire\Rkp;

use App\Models\Rkp;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateRkp extends Component
{
    use WithFileUploads;
    public $nama, $filename;

    public function render()
    {
        return view('livewire.rkp.create-rkp');
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
        Rkp::create($dataValid);
        $this->emit('render');
        $this->resetForm();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'RKP Desa Berhasil Ditambahkan!',
            'text' => 'ini telah disimpan di tabel RKP Desa.'
        ]);
    }
}
