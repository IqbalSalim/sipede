<?php

namespace App\Http\Livewire\Apb;

use App\Models\Apb;
use Livewire\Component;


class Show extends Component
{
    public $file;
    protected $listeners = ['getfilePdf'];
    public function render()
    {
        return view('livewire.apb.show');
    }

    public function getfilePdf($id)
    {
        $this->file = Apb::find($id);
    }
}
