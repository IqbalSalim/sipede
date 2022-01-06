<?php

namespace App\Http\Livewire\Rkp;

use App\Models\Rkp;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class GuestRkp extends Component
{
    use WithPagination;

    public $paginate = 5, $search;
    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.rkp.guest-rkp', [
            'rkps' => $this->search === null ?
                Rkp::latest()->paginate($this->paginate) :
                Rkp::where('nama', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ])->layout('layouts.guest');
    }

    public function export($id)
    {
        $rkp = Rkp::find($id);
        return Storage::disk('public')->download($rkp->filename);
    }
}
