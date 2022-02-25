<?php

namespace App\Http\Livewire\Rkpdesa;

use App\Models\Rkpdes;
use App\Models\Usulan;
use Livewire\Component;

class DetailRkpdesa extends Component
{
    public $rkpId;

    protected $listeners = [
        'getDetailRkp',
    ];

    public function render()
    {
        return view('livewire.rkpdesa.detail-rkpdesa', [
            'rkp' => Usulan::find($this->rkpId),
        ]);
    }

    public function getDetailRkp($id)
    {
        $this->rkpId = $id;
    }
}
