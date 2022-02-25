<?php

namespace App\Http\Livewire\Rkpdesa;

use App\Models\Usulan;
use Livewire\Component;

class EditRkpdesa extends Component
{
    public $rkpdesa;
    public $sasaran, $waktu, $jumlah, $sumber, $pola, $rencana;
    protected $listeners = ['getEditRkp'];

    public function render()
    {
        return view('livewire.rkpdesa.edit-rkpdesa');
    }

    public function getEditRkp($id)
    {
        $result = Usulan::find($id);
        $this->rkpdesa  = $result;

        $this->kode_rekening = $result->kode_rekening;
        $this->sasaran = $result->sasaran;
        $this->waktu = $result->waktu;
        $this->sumber = $result->sumber;
        $this->pola = $result->pola;
        $this->rencana = $result->rencana;
        $this->jumlah = (string) $result->jumlah;
    }

    public function resetForm()
    {
        $this->kode_rekening = null;
        $this->sasaran = null;
        $this->waktu = null;
        $this->jumlah = null;
        $this->sumber = null;
        $this->pola = null;
        $this->rencana = null;
        $this->rkpdesa = null;
        $this->resetValidation();
    }

    public function simpan()
    {
        $dataValid = $this->validate([
            'sasaran' => 'required|string',
            'waktu' => 'required|string',
            'jumlah' => 'required|integer|digits_between:1,20',
            'sumber' => 'required|string',
            'pola' => 'required|string',
            'rencana' => 'required|string',
        ]);

        $this->rkpdesa->update($dataValid);
        $this->emit('render');
        $this->resetForm();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'RKP Desa Berhasil Diubah!',
            'text' => 'perubahan ini telah disimpan di tabel RKP Desa.'
        ]);
    }
}
