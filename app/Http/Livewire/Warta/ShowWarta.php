<?php

namespace App\Http\Livewire\Warta;

use App\Models\Warta;
use Livewire\Component;

class ShowWarta extends Component
{
    public $warta;

    public function mount($id)
    {
        $this->warta = Warta::find($id);
    }

    public function render()
    {
        return view('livewire.warta.show-warta')->layout('layouts.guest');
    }
}
