<?php

namespace App\Http\Livewire\Usulan;

use App\Enums\UsulanStatus;
use App\Models\Bidang;
use App\Models\Kegiatan;
use App\Models\Rkpdes;
use App\Models\Usulan;
use Livewire\Component;
use Livewire\WithPagination;

class IndexUsulan extends Component
{
    use WithPagination;

    public $filter_tahun, $filter_bidang;
    public $bidangs;
    public $paginate = 5, $search, $deleteId, $status, $usulan, $statusTemp, $bidang, $tahun;
    protected $queryString = ['search'];

    protected $listeners = ['delete', 'render', 'updateStatus', 'updateStatusSesuai'];

    public function mount()
    {
        $this->tahun = date('Y') + 1;
        $this->bidangs = Bidang::all();


        $usulan = Usulan::all();
        foreach ($usulan as $row) {
            $this->status[$row->id] = $row->status;
        }
    }


    public function render()
    {
        return view('livewire.usulan.index-usulan', [
            'kegiatans' => ($this->search === null) ?
                Usulan::where('tahun', $this->tahun)->cariBidang($this->bidang)->latest()->paginate($this->paginate) :
                Usulan::where('tahun', $this->tahun)->cariBidang($this->bidang)->cariKegiatan($this->search)->latest()->paginate($this->paginate),

            'tahuns' => Usulan::select('tahun')->groupBy('tahun')->get(),
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
            $usulan = Usulan::find($this->deleteId);
            $usulan->delete();
        }
    }

    public function changeStatus($id)
    {
        $this->usulan = Usulan::find($id);
        if ($this->status[$id] == 'tidak sesuai') {
            $this->dispatchBrowserEvent('swal:addDescription', [
                'message' => 'Keterangan Usulan Yang Tidak Sesuai',
            ]);
            $this->statusTemp = $this->status[$id];
            $this->status[$id] = $this->usulan->status;
        } elseif ($this->status[$id] == 'sesuai') {
            $this->emit('getUsulanStatus', $id, 'sesuai');
            $this->dispatchBrowserEvent('open-modal-status');
            $this->statusTemp = $this->status[$id];
            $this->status[$id] = $this->usulan->status;
        } else {
            $this->usulan->update([
                'status' => $this->status[$id],
                'keterangan' => null,
            ]);

            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'message' => 'Status Usulan Kegiatan Berhasil Diubah!',
                'text' => 'perubahan ini telah disimpan di tabel Usulan Kegiatan.'
            ]);
        }
    }

    public function updateStatus($keterangan)
    {
        $this->usulan->update([
            'status' => $this->statusTemp,
            'keterangan' => $keterangan,
        ]);

        $this->status[$this->usulan->id] = $this->usulan->status;

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Status Usulan Kegiatan Berhasil Diubah!',
            'text' => 'perubahan ini telah disimpan di tabel Usulan Kegiatan.'
        ]);
    }

    public function updateStatusSesuai($data)
    {
        $data['status'] = $this->statusTemp;
        $this->usulan->update($data);

        $this->status[$this->usulan->id] = $this->usulan->status;
        $this->dispatchBrowserEvent('close-modal-status');

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Status Usulan Kegiatan Berhasil Diubah!',
            'text' => 'perubahan ini telah disimpan di tabel Usulan Kegiatan.'
        ]);
    }
}
