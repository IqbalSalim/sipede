<?php

namespace App\Http\Livewire\Warta;

use App\Models\Warta;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateWarta extends Component
{
    use WithFileUploads;

    public $judul, $isi, $penulis, $gambar, $warta_id;
    protected $listeners = ['getWarta'];

    public function render()
    {
        return view('livewire.warta.update-warta');
    }

    public function getWarta($id)
    {
        $warta = Warta::find($id);
        $this->judul = $warta->judul;
        $this->isi = $warta->isi;
        $this->penulis = $warta->penulis;
        $this->gambar = $warta->gambar;
        $this->warta_id = $id;
    }

    public function resetForm()
    {
        $this->judul = null;
        $this->isi = null;
        $this->penulis = null;
        $this->gambar = null;
        $this->warta_id = null;
    }

    public function update()
    {
        if ($this->warta_id) {
            $warta = Warta::find($this->warta_id);
            if ($this->gambar) {
                $dataValid = $this->validate(
                    [
                        'judul' => 'required|string|max:255',
                        'isi' => 'required|string',
                        'penulis' => 'required|string|max:255',
                        'gambar' => 'required|image|max:1024',

                    ]
                );
                if (Storage::disk('public')->exists($warta->gambar)) {
                    Storage::disk('public')->delete($warta->gambar);
                }
                $dataValid['gambar'] = $this->gambar->store('images', 'public');
                $warta->update($dataValid);
            } else {
                $dataValid = $this->validate(
                    [
                        'judul' => 'required|string|max:255',
                        'isi' => 'required|string',
                        'penulis' => 'required|string|max:255|',
                    ]
                );
                $warta->update($dataValid);
            }
        }
        $this->emit('render');
        $this->resetForm();
        $this->dispatchBrowserEvent('close-modal-edit');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Warta Kegiatan Berhasil Diubah!',
            'text' => 'perubahan ini telah disimpan di tabel Warta Kegiatan.'
        ]);
    }
}
