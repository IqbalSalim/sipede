<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Apb;
use App\Models\Musrenbang;
use App\Models\Rka;
use App\Models\Rkp;
use Livewire\Component;

class IndexDashboard extends Component
{
    public $total_rka, $total_rkp, $total_apb, $total_musrenbang;
    public $apbs, $rkps, $rkas, $musrenbangs;

    public function render()
    {
        $this->total_rkp = Rkp::count();
        $this->total_rka = Rka::count();
        $this->total_apb = Apb::count();
        $this->total_musrenbang = Musrenbang::count();

        $this->apbs = Apb::latest()->limit(5)->get();
        $this->rkps = Rkp::latest()->limit(5)->get();
        $this->rkas = Rka::latest()->limit(5)->get();
        $this->musrenbangs = Musrenbang::latest()->limit(5)->get();
        // dd($this->rkps);
        return view('livewire.dashboard.index-dashboard');
    }
}
