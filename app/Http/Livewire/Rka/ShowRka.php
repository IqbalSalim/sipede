<?php

namespace App\Http\Livewire\Rka;

use App\Models\Rka;
use Livewire\Component;

class ShowRka extends Component
{
    public $file;
    protected $listeners = ['getfilePdf'];
    public function render()
    {
        return view('livewire.rka.show-rka');
    }

    public function getfilePdf($id)
    {
        $this->file = Rka::find($id);
    }
}
