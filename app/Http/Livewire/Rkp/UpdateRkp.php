<?php

namespace App\Http\Livewire\Rkp;

use App\Models\Rkp;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class UpdateRkp extends Component
{
    use WithFileUploads;
    public $nama, $rkp_id, $filename;
    protected $listeners = ['getRkp'];

    public function render()
    {
        return view('livewire.rkp.update-rkp');
    }

    public function getRkp($id)
    {
        $rkp = Rkp::find($id);
        $this->rkp_id = $rkp->id;
        $this->nama = $rkp->nama;
    }

    public function resetForm()
    {
        $this->rkp_id = null;
        $this->nama = null;
        $this->filename = null;
    }

    public function update()
    {
        if ($this->rkp_id) {
            $rkp = Rkp::find($this->rkp_id);

            if ($this->filename) {
                $dataValid = $this->validate([
                    'nama' => 'required|string',
                    'filename' => 'required|file|mimes:pdf|max:1024',
                ]);
                if (Storage::disk('public')->exists($rkp->filename)) {
                    Storage::disk('public')->delete($rkp->filename);
                }
                $dataValid['filename'] = $this->filename->store('files', 'public');
                $rkp->update($dataValid);
            } else {
                $dataValid = $this->validate([
                    'nama' => 'required|string',
                ]);
                $rkp->update($dataValid);
            }
            $this->emit('render');
            $this->resetForm();
            $this->dispatchBrowserEvent('close-modal-edit');
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'message' => 'RKP Desa Berhasil Diubah!',
                'text' => 'perubahan ini telah disimpan di tabel RKP Desa.'
            ]);
        }
    }
}
