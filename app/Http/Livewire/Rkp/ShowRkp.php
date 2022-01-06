<?php

namespace App\Http\Livewire\Rkp;

use App\Models\Rkp;
use Livewire\Component;

class ShowRkp extends Component
{
    public $file;
    protected $listeners = ['getfilePdf'];
    public function render()
    {
        return view('livewire.rkp.show-rkp');
    }

    public function getfilePdf($id)
    {
        $this->file = Rkp::find($id);
    }
}
