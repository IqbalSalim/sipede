<?php

namespace App\Http\Livewire\Usulan;

use App\Models\Usulan;
use Livewire\Component;

class StatusSesuai extends Component
{
    public $sdgs, $satuan, $volume, $usulan, $status;
    protected $listeners = ['getUsulanStatus'];

    public function getUsulanStatus($id, $status)
    {
        $this->usulan = Usulan::find($id);
        $this->status = $status;
    }

    public function render()
    {
        return view('livewire.usulan.status-sesuai');
    }

    public function resetForm()
    {
        $this->sdgs = null;
        $this->satuan = null;
        $this->volume = null;
        $this->usulan = null;
        $this->status = null;
        $this->resetValidation();
    }

    public function update()
    {
        $dataValid = $this->validate([
            'sdgs' => 'required|string',
            'volume' => 'required|integer',
            'satuan' => 'required|string',
        ]);
        $this->emit('updateStatusSesuai', $dataValid);
    }
}
