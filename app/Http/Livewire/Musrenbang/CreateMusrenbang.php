<?php

namespace App\Http\Livewire\Musrenbang;

use App\Models\Musrenbang;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateMusrenbang extends Component
{
    use WithFileUploads;
    public $nama, $filename;

    public function render()
    {
        return view('livewire.musrenbang.create-musrenbang');
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
        Musrenbang::create($dataValid);
        $this->emit('render');
        $this->resetForm();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Musrenbang Desa Berhasil Ditambahkan!',
            'text' => 'ini telah disimpan di tabel Musrenbang Desa.'
        ]);
    }
}
