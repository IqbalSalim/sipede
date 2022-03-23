<?php

namespace App\Http\Livewire\Rkpdesa;

use App\Models\Bidang;
use App\Models\Rkpdes;
use App\Models\Usulan;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class IndexRkpdesa extends Component
{
    use WithPagination;


    public $paginate = 10, $search;

    public $queryString = ['search'];
    public $bidang, $tahun;

    protected $listeners = ['render'];

    public function mount()
    {
        $this->tahun = date('Y') + 1;
        $this->bidangs = Bidang::all();
    }
    public function render()
    {
        return view('livewire.rkpdesa.index-rkpdesa', [
            'kegiatans' => ($this->search === null) ?
                Usulan::where('tahun', $this->tahun)->where('status', 'sesuai')->cariBidang($this->bidang)->latest()->paginate($this->paginate) :
                Usulan::where('tahun', $this->tahun)->where('status', 'sesuai')->cariBidang($this->bidang)->cariKegiatan($this->search)->latest()->paginate($this->paginate),
            'tahuns' => Usulan::select('tahun')->groupBy('tahun')->get(),
        ]);
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
