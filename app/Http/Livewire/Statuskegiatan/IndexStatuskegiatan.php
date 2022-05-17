<?php

namespace App\Http\Livewire\Statuskegiatan;

use App\Models\Bidang;
use App\Models\Usulan;
use Livewire\Component;
use Livewire\WithPagination;

class IndexStatuskegiatan extends Component
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
        return view('livewire.statuskegiatan.index-statuskegiatan', [
            'kegiatans' => ($this->search === null) ?
                Usulan::where('tahun', $this->tahun)->where('status', 'sesuai')->cariBidang($this->bidang)->latest()->paginate($this->paginate) :
                Usulan::where('tahun', $this->tahun)->where('status', 'sesuai')->cariBidang($this->bidang)->cariKegiatan($this->search)->latest()->paginate($this->paginate),
            'tahuns' => Usulan::select('tahun')->groupBy('tahun')->get(),
        ]);
    }
}
