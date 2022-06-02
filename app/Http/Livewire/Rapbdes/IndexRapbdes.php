<?php

namespace App\Http\Livewire\Rapbdes;

use App\Models\Pendapatan;
use Livewire\Component;
use Livewire\WithPagination;

class IndexRapbdes extends Component
{
    use WithPagination;


    public $paginate = 10, $search, $deleteId;

    public $queryString = ['search'];
    public $tahun;

    protected $listeners = ['render', 'delete'];

    public function mount()
    {
        $tahuns = Pendapatan::select('tahun')->groupBy('tahun')->get();
        $this->tahun = $tahuns[count($tahuns) - 1]->tahun;
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

    public function alertConfirm($id)
    {
        $this->deleteId = $id;
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'message' => 'Apakah Anda Yakin?',
            'text' => 'Jika dihapus, Anda tidak akan dapat mengembalikan data ini!'
        ]);
    }
    public function delete()
    {
        if ($this->deleteId) {
            $usulan = Pendapatan::find($this->deleteId);
            $usulan->delete();
        }
    }
}
