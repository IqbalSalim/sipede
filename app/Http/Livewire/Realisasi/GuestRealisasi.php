<?php

namespace App\Http\Livewire\Realisasi;

use App\Models\Bidang;
use App\Models\Realisasi;
use App\Models\Usulan;
use Livewire\Component;

class GuestRealisasi extends Component
{
    public $filter_tahun, $filter_bidang;
    public $bidangTerlaksanas, $bidangBelumTerlaksanas;
    public $paginateTerlaksana = 5, $paginateBelumTerlaksana = 5, $searchTerlaksana, $searchBelumTerlaksana, $bidangTerlaksana, $bidangBelumTerlaksana, $tahunTerlaksana, $tahunBelumTerlaksana;
    protected $queryString = ['searchTerlaksana', 'searchBelumTerlaksana'];

    public function mount()
    {
        $tahuns = Usulan::select('tahun')->groupBy('tahun')->get();
        $this->tahunTerlaksana = $tahuns[count($tahuns) - 1]->tahun;
        $this->tahunBelumTerlaksana = $tahuns[count($tahuns) - 1]->tahun;
        $this->bidangTerlaksanas = Bidang::all();
        $this->bidangBelumTerlaksanas = Bidang::all();
    }

    public function render()
    {
        return view('livewire.realisasi.guest-realisasi', [
            'terlaksana' => ($this->searchTerlaksana === null) ?
                Usulan::where('tahun', $this->tahunTerlaksana)->where('status_kegiatan', 'terlaksana')->cariBidang($this->bidangTerlaksana)->latest()->paginate($this->paginateTerlaksana) :
                Usulan::where('tahun', $this->tahunTerlaksana)->where('status_kegiatan', 'terlaksana')->cariBidang($this->bidangTerlaksana)->cariKegiatan($this->searchTerlaksana)->latest()->paginate($this->paginateTerlaksana),
            'tahunTerlaksanas' => Usulan::select('tahun')->groupBy('tahun')->get(),
            'belumTerlaksana' => ($this->searchBelumTerlaksana === null) ?
                Usulan::where('tahun', $this->tahunBelumTerlaksana)->where('status_kegiatan', 'belum terlaksana')->cariBidang($this->bidangBelumTerlaksana)->latest()->paginate($this->paginateBelumTerlaksana) :
                Usulan::where('tahun', $this->tahunBelumTerlaksana)->where('status_kegiatan', 'terlaksana')->cariBidang($this->bidangBelumTerlaksana)->cariKegiatan($this->searchBelumTerlaksana)->latest()->paginate($this->paginateBelumTerlaksana),
            'tahunBelumTerlaksanas' => Usulan::select('tahun')->groupBy('tahun')->get(),
        ])->layout('layouts.guest');
    }
}
