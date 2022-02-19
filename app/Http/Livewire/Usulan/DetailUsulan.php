<?php

namespace App\Http\Livewire\Usulan;

use App\Models\Kegiatan;
use App\Models\Usulan;
use Livewire\Component;

class DetailUsulan extends Component
{
    public $usulan_id;
    protected $listeners = ['getDetailUsulan'];

    public function render()
    {
        return view('livewire.usulan.detail-usulan', [
            'usulan' => Usulan::find($this->usulan_id),
        ]);
    }

    public function getDetailUsulan($id)
    {
        $this->usulan_id = $id;
    }
}
