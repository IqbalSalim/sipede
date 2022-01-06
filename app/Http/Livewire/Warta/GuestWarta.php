<?php

namespace App\Http\Livewire\Warta;

use App\Models\Warta;
use Livewire\Component;
use Livewire\WithPagination;

class GuestWarta extends Component
{

    use WithPagination;

    public $paginate = 5, $search;
    protected $queryString = ['search'];
    public function render()
    {
        return view('livewire.warta.guest-warta', [
            'wartas' => $this->search === null ?
                Warta::latest()->paginate($this->paginate) :
                Warta::where('judul', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ])->layout('layouts.guest');
    }
}
