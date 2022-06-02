<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Apb;
use App\Models\Kegiatan;
use App\Models\Musrenbang;
use App\Models\Rka;
use App\Models\Rkp;
use Livewire\Component;


class IndexDashboard extends Component
{
    public $total_rkp, $total_apb;
    public $apbs, $rkps;


    public function render()
    {
        $this->total_rkp = Rkp::count();
        $this->total_apb = Apb::count();

        $this->apbs = Apb::latest()->limit(5)->get();
        $this->rkps = Rkp::latest()->limit(5)->get();

        return view('livewire.dashboard.index-dashboard');
    }
}
