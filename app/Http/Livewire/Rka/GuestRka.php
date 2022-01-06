<?php

namespace App\Http\Livewire\Rka;

use App\Models\Rka;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class GuestRka extends Component
{
    use WithPagination;

    public $paginate = 5, $search;
    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.rka.guest-rka', [
            'rkas' => $this->search === null ?
                Rka::latest()->paginate($this->paginate) :
                Rka::where('nama', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ])->layout('layouts.guest');
    }

    public function export($id)
    {
        $rka = Rka::find($id);
        return Storage::disk('public')->download($rka->filename);
    }
}
