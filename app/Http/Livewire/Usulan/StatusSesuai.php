<?php

namespace App\Http\Livewire\Usulan;

use App\Models\Sdgs;
use App\Models\Usulan;
use Livewire\Component;

class StatusSesuai extends Component
{
    public $sdgs, $satuan, $volume, $usulan, $status, $listSdgs;
    protected $listeners = ['getUsulanStatus'];

    public function getUsulanStatus($id, $status)
    {
        $this->usulan = Usulan::find($id);
        $this->status = $status;
    }

    public function mount()
    {
        $this->listSdgs = Sdgs::all();
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

    public function update($formData)
    {
        $this->sdgs = $formData['sdgs'];
        $dataValid = $this->validate([
            'sdgs' => 'required|string',
            'volume' => 'required|integer',
            'satuan' => 'required|string',
        ]);
        $this->emit('updateStatusSesuai', $dataValid);
        $this->resetForm();
    }
}
