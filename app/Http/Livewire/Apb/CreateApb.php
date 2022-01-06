<?php

namespace App\Http\Livewire\Apb;

use App\Models\Apb;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateApb extends Component
{
    use WithFileUploads;
    public $nama, $filename;

    public function render()
    {
        return view('livewire.apb.create-apb');
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
        Apb::create($dataValid);
        $this->emit('render');
        $this->resetForm();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'APB Desa Berhasil Ditambahkan!',
            'text' => 'ini telah disimpan di tabel APB Desa.'
        ]);
    }
}
