<?php

namespace App\Http\Livewire\Apb;

use App\Models\Apb;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateApb extends Component
{
    use WithFileUploads;
    public $nama, $apb_id, $filename;
    protected $listeners = ['getApb'];

    public function render()
    {
        return view('livewire.apb.update-apb');
    }

    public function getApb($id)
    {
        $apb = Apb::find($id);
        $this->apb_id = $apb->id;
        $this->nama = $apb->nama;
    }

    public function resetForm()
    {
        $this->apb_id = null;
        $this->nama = null;
        $this->filename = null;
    }

    public function update()
    {
        if ($this->apb_id) {
            $apb = Apb::find($this->apb_id);

            if ($this->filename) {
                $dataValid = $this->validate([
                    'nama' => 'required|string',
                    'filename' => 'required|file|mimes:pdf|max:1024',
                ]);
                if (Storage::disk('public')->exists($apb->filename)) {
                    Storage::disk('public')->delete($apb->filename);
                }
                $dataValid['filename'] = $this->filename->store('files', 'public');
                $apb->update($dataValid);
            } else {
                $dataValid = $this->validate([
                    'nama' => 'required|string',
                ]);
                $apb->update($dataValid);
            }
            $this->emit('render');
            $this->resetForm();
            $this->dispatchBrowserEvent('close-modal-edit');
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'message' => 'APB Desa Berhasil Diubah!',
                'text' => 'perubahan ini telah disimpan di tabel APB Desa.'
            ]);
        }
    }
}
