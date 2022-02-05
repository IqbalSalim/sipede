<?php

namespace App\Http\Livewire\Kegiatan;

use App\Models\Bidang;
use App\Models\Kegiatan;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class IndexKegiatan extends Component
{
    public $cekModal = 0;
    protected $listeners = ['delete', 'render'];

    // public function mount()
    // {
    // $query = Kegiatan::whereHas('subbidang', function (Builder $query) {
    //     $query->select('subbidang.*')->where('nama', 'like', 'Sub Bidang Pertanahan');
    // })->get();
    // $this->kegiatans = Kegiatan::join('subbidangs', 'subbidangs.id', '=', 'kegiatans.subbidang_id')->select('subbidangs.bidang_id as a', 'subbidangs.kd_rek as b', 'subbidangs.nama as sub_nama', 'kegiatans.*')->get();
    // dd($query);
    // }

    public function render()
    {
        return view('livewire.kegiatan.index-kegiatan', [
            'kegiatans' => Kegiatan::join('subbidangs', 'subbidangs.id', '=', 'kegiatans.subbidang_id')->select('subbidangs.bidang_id as a', 'subbidangs.kd_rek as b', 'subbidangs.nama as sub_nama', 'kegiatans.*')->get()
        ]);
    }

    public function tambahModal()
    {
        $this->cekModal = 1;
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
        // if ($this->deleteId) {
        //     $usulan = Rkpdes::find($this->deleteId);
        //     $usulan->delete();
        // }
    }
}
