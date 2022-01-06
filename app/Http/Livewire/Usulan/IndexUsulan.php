<?php

namespace App\Http\Livewire\Usulan;

use App\Models\Rkpdes;
use Livewire\Component;
use Livewire\WithPagination;

class IndexUsulan extends Component
{
    use WithPagination;

    public $paginate = 5, $search;
    protected $queryString = ['search'];

    protected $listeners = ['delete', 'render'];

    public function render()
    {
        return view('livewire.usulan.index-usulan', [
            'usulan' => $this->search === null ?
                Rkpdes::latest()->paginate($this->paginate) :
                Rkpdes::where('kegiatan', 'like', '%' . $this->search . '%')->paginate($this->paginate)
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
            $usulan = Rkpdes::find($this->deleteId);
            $usulan->delete();
        }
    }
}
