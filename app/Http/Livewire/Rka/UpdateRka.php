<?php

namespace App\Http\Livewire\Rka;

use App\Models\Rka;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class UpdateRka extends Component
{
    use WithFileUploads;
    public $nama, $rka_id, $filename;
    protected $listeners = ['getRka'];

    public function render()
    {
        return view('livewire.rka.update-rka');
    }

    public function getRka($id)
    {
        $rka = Rka::find($id);
        $this->rka_id = $rka->id;
        $this->nama = $rka->nama;
    }

    public function resetForm()
    {
        $this->rka_id = null;
        $this->nama = null;
        $this->filename = null;
    }

    public function update()
    {
        if ($this->rka_id) {
            $rka = Rka::find($this->rka_id);

            if ($this->filename) {
                $dataValid = $this->validate([
                    'nama' => 'required|string',
                    'filename' => 'required|file|mimes:pdf|max:1024',
                ]);
                if (Storage::disk('public')->exists($rka->filename)) {
                    Storage::disk('public')->delete($rka->filename);
                }
                $dataValid['filename'] = $this->filename->store('files', 'public');
                $rka->update($dataValid);
            } else {
                $dataValid = $this->validate([
                    'nama' => 'required|string',
                ]);
                $rka->update($dataValid);
            }
            $this->emit('render');
            $this->resetForm();
            $this->dispatchBrowserEvent('close-modal-edit');
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'message' => 'RKA Desa Berhasil Diubah!',
                'text' => 'perubahan ini telah disimpan di tabel RKA Desa.'
            ]);
        }
    }
}
