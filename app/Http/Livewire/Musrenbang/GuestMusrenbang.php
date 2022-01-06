<?php

namespace App\Http\Livewire\Musrenbang;

use App\Models\Musrenbang;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class GuestMusrenbang extends Component
{
    use WithPagination;

    public $paginate = 5, $search;
    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.musrenbang.guest-musrenbang', [
            'musrenbangs' => $this->search === null ?
                Musrenbang::latest()->paginate($this->paginate) :
                Musrenbang::where('nama', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ])->layout('layouts.guest');
    }

    public function export($id)
    {
        $musrenbang = Musrenbang::find($id);
        return Storage::disk('public')->download($musrenbang->filename);
    }
}
