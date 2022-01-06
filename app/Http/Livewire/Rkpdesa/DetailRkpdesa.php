<?php

namespace App\Http\Livewire\Rkpdesa;

use App\Models\Rkpdes;
use Livewire\Component;

class DetailRkpdesa extends Component
{
    public $detail;

    protected $listeners = [
        'getDetail',
    ];

    public function render()
    {
        return view('livewire.rkpdesa.detail-rkpdesa');
    }

    public function getDetail($id)
    {
        $this->detail = Rkpdes::find($id);
    }
}
