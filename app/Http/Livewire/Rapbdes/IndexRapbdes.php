<?php

namespace App\Http\Livewire\Rapbdes;

use App\Models\Pendapatan;
use Livewire\Component;
use Livewire\WithPagination;

class IndexRapbdes extends Component
{
    use WithPagination;


    public $paginate = 10, $search;

    public $queryString = ['search'];
    public $tahun;

    protected $listeners = ['render'];

    public function mount()
    {
        $this->tahun = date('Y') + 1;
    }

    public function render()
    {
        return view('livewire.rapbdes.index-rapbdes', [
            'pendapatans' => ($this->search === null) ?
                Pendapatan::where('tahun', $this->tahun)->paginate($this->paginate) :
                Pendapatan::where('tahun', $this->tahun)->where('uraian', 'like', '%' . $this->search . '%')->paginate($this->paginate),
            'tahuns' => Pendapatan::select('tahun')->groupBy('tahun')->get()
        ]);
    }
}
