<?php

namespace App\Http\Livewire\Rka;

use App\Models\Rka;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class IndexRka extends Component
{
    use WithPagination;

    public $paginate = 5, $search, $event, $deleteId;
    protected $queryString = ['search'];

    protected $listeners = ['delete', 'render'];

    public function render()
    {

        return view('livewire.rka.index-rka', [
            'rkas' => $this->search === null ?
                Rka::latest()->paginate($this->paginate) :
                Rka::where('nama', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ]);
    }

    public function getfilePdf($id)
    {
        $this->file = Rka::find($id);
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
            $rka = Rka::find($this->deleteId);
            if (Storage::disk('public')->exists($rka->filename)) {
                Storage::disk('public')->delete($rka->filename);
            }
            $rka->delete();
        }
    }
}
