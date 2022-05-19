<?php

namespace App\Http\Livewire\Realisasi;

use App\Models\Realisasi;
use App\Models\Usulan;
use Livewire\Component;

class DetailRealisasi extends Component
{
    public $realisasi, $rkp, $status;

    protected $listeners = [
        'getDetailRealisasi',
    ];

    public function render()
    {
        return view('livewire.realisasi.detail-realisasi', [
            'realisasi' => Realisasi::where('usulan_id', 1)->get(),
            'rkp' => Usulan::find(1),
        ]);
    }

    public function close()
    {
        $this->dispatchBrowserEvent('close-detail');
    }

    public function getDetailRealisasi($id, $status)
    {
        $this->realisasi = Realisasi::where('usulan_id', $id)->get();
        $this->rkp = Usulan::find($id);

        $this->status = $status;
    }
}
