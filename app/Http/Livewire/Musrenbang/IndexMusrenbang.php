<?php

namespace App\Http\Livewire\Musrenbang;

use App\Models\Musrenbang;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class IndexMusrenbang extends Component
{
    use WithPagination;

    public $paginate = 5, $search, $event, $deleteId;
    protected $queryString = ['search'];

    protected $listeners = ['delete', 'render'];

    public function render()
    {

        return view('livewire.musrenbang.index-musrenbang', [
            'musrenbangs' => $this->search === null ?
                Musrenbang::latest()->paginate($this->paginate) :
                Musrenbang::where('nama', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ]);
    }

    public function getfilePdf($id)
    {
        $this->file = Musrenbang::find($id);
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
            $musrenbang = Musrenbang::find($this->deleteId);
            if (Storage::disk('public')->exists($musrenbang->filename)) {
                Storage::disk('public')->delete($musrenbang->filename);
            }
            $musrenbang->delete();
        }
    }
}
