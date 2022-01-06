<?php

namespace App\Http\Livewire\Musrenbang;

use App\Models\Musrenbang;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class UpdateMusrenbang extends Component
{
    use WithFileUploads;
    public $nama, $rka_id, $filename;
    protected $listeners = ['getMusrenbang'];

    public function render()
    {
        return view('livewire.musrenbang.update-musrenbang');
    }

    public function getMusrenbang($id)
    {
        $musrenbang = Musrenbang::find($id);
        $this->musrenbang_id = $musrenbang->id;
        $this->nama = $musrenbang->nama;
    }

    public function resetForm()
    {
        $this->musrenbang_id = null;
        $this->nama = null;
        $this->filename = null;
    }

    public function update()
    {
        if ($this->musrenbang_id) {
            $musrenbang = Musrenbang::find($this->musrenbang_id);

            if ($this->filename) {
                $dataValid = $this->validate([
                    'nama' => 'required|string',
                    'filename' => 'required|file|mimes:pdf|max:1024',
                ]);
                if (Storage::disk('public')->exists($musrenbang->filename)) {
                    Storage::disk('public')->delete($musrenbang->filename);
                }
                $dataValid['filename'] = $this->filename->store('files', 'public');
                $musrenbang->update($dataValid);
            } else {
                $dataValid = $this->validate([
                    'nama' => 'required|string',
                ]);
                $musrenbang->update($dataValid);
            }
            $this->emit('render');
            $this->resetForm();
            $this->dispatchBrowserEvent('close-modal-edit');
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'message' => 'Musrenbang Desa Berhasil Diubah!',
                'text' => 'perubahan ini telah disimpan di tabel Musrenbang Desa.'
            ]);
        }
    }
}
