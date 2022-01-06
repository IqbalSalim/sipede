<?php

namespace App\Http\Livewire\Apb;

use App\Models\Apb;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class IndexApb extends Component
{
    use WithPagination;

    public $paginate = 5, $search, $event, $deleteId;
    protected $queryString = ['search'];

    protected $listeners = ['delete', 'render'];

    public function render()
    {

        return view('livewire.apb.index-apb', [
            'apbs' => $this->search === null ?
                Apb::latest()->paginate($this->paginate) :
                Apb::where('nama', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ]);
    }

    public function getfilePdf($id)
    {
        $this->file = Apb::find($id);
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
            $apb = Apb::find($this->deleteId);
            if (Storage::disk('public')->exists($apb->filename)) {
                Storage::disk('public')->delete($apb->filename);
            }
            $apb->delete();
        }
    }
}
