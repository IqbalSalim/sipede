<?php

namespace App\Http\Livewire\Kegiatan;

use App\Models\Kegiatan;
use Livewire\Component;

class IndexKegiatan extends Component
{

    protected $listeners = ['delete', 'render'];
    public $deleteId;


    public function render()
    {
        return view('livewire.kegiatan.index-kegiatan', [
            'kegiatans' => Kegiatan::join('subbidangs', 'subbidangs.id', '=', 'kegiatans.subbidang_id')->select('subbidangs.bidang_id as a', 'subbidangs.kd_rek as b', 'subbidangs.nama as sub_nama', 'kegiatans.*')->get()
        ]);
    }


    public function alertConfirm($kegiatan_id)
    {
        $this->deleteId = $kegiatan_id;
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'message' => 'Apakah Anda Yakin?',
            'text' => 'Jika dihapus, Anda tidak akan dapat mengembalikan data ini!'
        ]);
    }
    public function delete()
    {
        if ($this->deleteId) {
            $kegiatan = Kegiatan::find($this->deleteId);
            $kegiatan->delete();
        }
    }
}
