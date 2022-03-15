<?php

namespace App\Http\Livewire\Realisasi;

use App\Models\Bidang;
use App\Models\Realisasi;
use App\Models\Usulan;
use Livewire\Component;
use Livewire\WithPagination;

class IndexRealisasi extends Component
{
    use WithPagination;

    public $filter_tahun, $filter_bidang;
    public $usulans, $kegiatan;
    public $paginate = 5, $search, $deleteId, $status, $usulan, $statusTemp, $bidang, $tahun;
    protected $queryString = ['search'];

    protected $listeners = ['delete', 'render', 'updateStatus', 'updateStatusSesuai'];

    public function mount()
    {
        $this->tahun = date('Y') + 1;
        $usulan = Usulan::where('tahun', $this->tahun);
        if (!$usulan->exists()) {
            $this->usulans = null;
        } else {
            $this->usulans = $usulan->get();
        }
    }

    public function render()
    {
        return view('livewire.realisasi.index-realisasi', [
            'infoKegiatan' => ($this->kegiatan === '' || $this->kegiatan === null) ?
                '' :
                Usulan::where('id', $this->kegiatan)->first(),
            'tahuns' => Usulan::select('tahun')->groupBy('tahun')->get(),
            'kegiatans' => ($this->search === null) ?
                Realisasi::where('usulan_id', $this->kegiatan)->paginate($this->paginate) :
                Realisasi::where('usulan_id', $this->kegiatan)->where('uraian', 'like', '%' . $this->search . '%')->paginate($this->paginate),
        ]);
    }

    public function alertConfirm($id)
    {
        $this->deleteId = $id;
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'message' => 'Apakah Anda Yakin?',
            'text' => 'Jika dihapus, Anda tidak akan dapat mengembalikan data ini!'
        ]);
    }
    public function delete()
    {
        if ($this->deleteId) {
            $realisasi = Realisasi::find($this->deleteId);
            $realisasi->delete();
        }
    }
}
