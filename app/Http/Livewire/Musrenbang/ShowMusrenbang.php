<?php

namespace App\Http\Livewire\Musrenbang;

use App\Models\Musrenbang;
use Livewire\Component;

class ShowMusrenbang extends Component
{
    public $file;
    protected $listeners = ['getfilePdf'];
    public function render()
    {
        return view('livewire.musrenbang.show-musrenbang');
    }

    public function getfilePdf($id)
    {
        $this->file = Musrenbang::find($id);
    }
}
