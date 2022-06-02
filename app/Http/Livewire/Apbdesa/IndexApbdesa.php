<?php

namespace App\Http\Livewire\Apbdesa;

use App\Models\Kegiatan;
use App\Models\Pendapatan;
use App\Models\Subbidang;
use App\Models\Usulan;
use Livewire\Component;

class IndexApbdesa extends Component
{
    public function mount()
    {
        $tahuns = Pendapatan::select('tahun')->groupBy('tahun')->get();
        $this->tahun = $tahuns[count($tahuns) - 1]->tahun;
        // $pendapatan = Pendapatan::where('tahun', $this->tahun)->get();

        // $que = Usulan::with('kegiatan')->where('tahun', $this->tahun)->where('status', 'sesuai')
        //     ->orderBy(Kegiatan::with('subbidang')->select('kd_rek')->whereColumn('kegiatans.id', 'usulans.kegiatan_id')->orderBy(Subbidang::select('kd_rek')->whereColumn('subbidangs.id', 'kegiatans.subbidang_id')))->get();

        // dd($que);
    }

    public function render()
    {
        return view('livewire.apbdesa.index-apbdesa', [
            'pendapatans' => Pendapatan::where('tahun', $this->tahun)->get(),
            'kegiatans' => Usulan::with('kegiatan')->where('tahun', $this->tahun)->where('status', 'sesuai')
                ->orderBy(Kegiatan::with('subbidang')->select('kd_rek')->whereColumn('kegiatans.id', 'usulans.kegiatan_id')->orderBy(Subbidang::select('kd_rek')->whereColumn('subbidangs.id', 'kegiatans.subbidang_id')))->get(),
            'tahuns' => Pendapatan::select('tahun')->groupBy('tahun')->get(),
        ]);
    }
}
