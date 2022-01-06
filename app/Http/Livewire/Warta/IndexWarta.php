<?php

namespace App\Http\Livewire\Warta;

use App\Models\Warta;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class IndexWarta extends Component
{
    use WithPagination;

    public $paginate = 6, $search, $deleteId;
    protected $queryString = ['search'];
    protected $listeners = ['delete', 'render'];


    public function render()
    {
        return view('livewire.warta.index-warta', [
            'wartas' => $this->search === null ?
                Warta::latest()->paginate($this->paginate) :
                Warta::where('judul', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ]);
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
            $warta = Warta::find($this->deleteId);
            if (Storage::disk('public')->exists($warta->gambar)) {
                Storage::disk('public')->delete($warta->gambar);
            }
            $warta->delete();
        }
    }
}
