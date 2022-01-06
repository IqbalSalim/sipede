<?php

namespace App\Http\Livewire\Usulan;

use App\Models\Rkpdes;
use Livewire\Component;
use Livewire\WithPagination;

class RekapanUsulan extends Component
{
    use WithPagination;

    public $paginate = 5, $search;
    protected $queryString = ['search'];

    public $sdgs = [], $volume = [], $satuan = [];

    public function mount()
    {
        $query = Rkpdes::all();
        foreach ($query as $key => $value) {
            $this->sdgs[$value->id] = $value->sdgs;
            $this->volume[$value->id] = $value->volume;
            $this->satuan[$value->id] = $value->satuan;
        }
    }


    public function render()
    {
        return view('livewire.usulan.rekapan-usulan', [
            'usulan' => $this->search === null ?
                Rkpdes::latest()->paginate($this->paginate) :
                Rkpdes::where('kegiatan', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ]);
    }

    public function update()
    {
        foreach ($this->sdgs as $key => $row) {
            $query = Rkpdes::find($key);
            $query->update([
                'sdgs' => $row,
            ]);
        }
        foreach ($this->volume as $key => $row) {
            $query = Rkpdes::find($key);
            $query->update([
                'volume' => $row,
            ]);
        }
        foreach ($this->satuan as $key => $row) {
            $query = Rkpdes::find($key);
            $query->update([
                'satuan' => $row,
            ]);
        }

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Perubahan Berhasil disimpan!',
            'text' => 'perubahan ini telah disimpan di tabel Usulan Kegiatan.'
        ]);
    }
}
