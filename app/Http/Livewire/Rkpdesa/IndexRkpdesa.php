<?php

namespace App\Http\Livewire\Rkpdesa;

use App\Models\Rkpdes;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class IndexRkpdesa extends Component
{
    use WithPagination;


    public $paginate = 10, $search;

    public $queryString = ['search'];
    public $rkpdesa;
    public $kode_rekening, $sasaran, $waktu, $jumlah, $sumber, $pola, $rencana;


    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.rkpdesa.index-rkpdesa', [
            'listrkp' => $this->search === null ?
                Rkpdes::latest()->paginate($this->paginate) :
                Rkpdes::where('kegiatan', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ]);
    }

    public function getRowRkp($id)
    {
        $result = Rkpdes::find($id);
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
    }

    public function simpan()
    {
        $dataValid = $this->validate([
            'kode_rekening' => 'required|string',
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
