<?php

namespace App\Http\Livewire\Apb;

use App\Models\Apb;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Guest extends Component
{
    use WithPagination;

    public $paginate = 5, $search;
    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.apb.guest', [
            'apbs' => $this->search === null ?
                Apb::latest()->paginate($this->paginate) :
                Apb::where('nama', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ])->layout('layouts.guest');
    }

    public function export($id)
    {
        $apb = Apb::find($id);
        return Storage::disk('public')->download($apb->filename);
    }
}
