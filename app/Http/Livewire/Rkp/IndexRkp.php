<?php

namespace App\Http\Livewire\Rkp;

use App\Models\Rkp;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class IndexRkp extends Component
{
    use WithPagination;

    public $paginate = 5, $search, $event, $deleteId;
    protected $queryString = ['search'];

    protected $listeners = ['delete', 'render'];

    public function render()
    {

        return view('livewire.rkp.index-rkp', [
            'rkps' => $this->search === null ?
                Rkp::latest()->paginate($this->paginate) :
                Rkp::where('nama', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ]);
    }

    public function getfilePdf($id)
    {
        $this->file = Rkp::find($id);
    }

    public function alertConfirm($id)
    {
        $this->deleteId = $id;
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'message' => 'Apakah Anda Yakin?',
            'text' => 'Jika dihapus, Anda tidak akan dapat mengembalikan file ini!'
        ]);
    }
    public function delete()
    {
        if ($this->deleteId) {
            $rkp = Rkp::find($this->deleteId);
            if (Storage::disk('public')->exists($rkp->filename)) {
                Storage::disk('public')->delete($rkp->filename);
            }
            $rkp->delete();
        }
    }
}
