<?php

use App\Http\Controllers\CetakAPB;
use App\Http\Controllers\CetakRekap;
use App\Http\Controllers\CetakRkpdesa;
use App\Http\Controllers\ExportUsulanController;
use App\Http\Livewire\Apb\Guest;
use App\Http\Livewire\Apb\IndexApb;
use App\Http\Livewire\Apb\Show;
use App\Http\Livewire\Apbdesa\IndexApbdesa;
use App\Http\Livewire\Dashboard\IndexDashboard;
use App\Http\Livewire\Editor;
use App\Http\Livewire\Kegiatan\IndexKegiatan;
use App\Http\Livewire\Musrenbang\GuestMusrenbang;
use App\Http\Livewire\Musrenbang\IndexMusrenbang;
use App\Http\Livewire\Profil\EditGambaranUmum;
use App\Http\Livewire\Profil\EditPerangkatDesa;
use App\Http\Livewire\Profil\EditSejarahDesa;
use App\Http\Livewire\Profil\EditVisiMisi;
use App\Http\Livewire\Profil\IndexProfil;
use App\Http\Livewire\Rapbdes\IndexRapbdes;
use App\Http\Livewire\Rka\GuestRka;
use App\Http\Livewire\Rka\IndexRka;
use App\Http\Livewire\Rkp\GuestRkp;
use App\Http\Livewire\Rkp\IndexRkp;
use App\Http\Livewire\Rkpdesa\IndexRkpdesa;
use App\Http\Livewire\Tentang\GuestTentang;
use App\Http\Livewire\User\IndexUser;
use App\Http\Livewire\Usulan\IndexUsulan;
use App\Http\Livewire\Usulan\RekapanUsulan;
use App\Http\Livewire\Warta\GuestWarta;
use App\Http\Livewire\Warta\IndexWarta;
use App\Http\Livewire\Warta\ShowWarta;
use App\Models\ProfilDesa;
use App\Models\Warta;
use Illuminate\Support\Facades\Route;

// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // $permission = Permission::create(['name' => 'crud usulan']);
    // $role = Role::where('name', 'sekretaris')->first();
    // $permission = Permission::where('name', 'crud usulan')->first();
    // $permission->assignRole($role);

    // return false;


    $wartas = Warta::latest()->take(3)->get();
    return view('welcome', ['wartas' => $wartas]);
})->name('welcome');

Route::group(['prefix' => '/transparansi', 'as' => 'transparansi'], function () {

    Route::get('/apb', Guest::class)->name('.apb');
    Route::get('/apb-index', IndexApb::class)->name('.apb-index');

    Route::get('/rkp', GuestRkp::class)->name('.rkp');
    Route::get('/rkp-index', IndexRkp::class)->name('.rkp-index');
});

Route::group(['prefix' => '/warta', 'as' => 'warta'], function () {
    Route::get('/warta-kegiatan', GuestWarta::class)->name('.warta-kegiatan');
    Route::get('/warta-index', IndexWarta::class)->name('.warta-index');
    Route::get('/warta-show/{id}', ShowWarta::class)->name('.warta-show');
});


Route::get('/profil-desa', IndexProfil::class)->name('profil-desa');

Route::get('/user', IndexUser::class)->name('user');

Route::get('/tentang-kami', GuestTentang::class)->name('tentang-kami');

Route::get('/dashboard', IndexDashboard::class)->middleware(['auth'])->name('dashboard');


Route::get('/cetak-rekap', [CetakRekap::class, 'cetakExel'])->name('cetak-rekap');
Route::get('/cetak-rkpdesa', [CetakRkpdesa::class, 'cetakExcel'])->name('cetak-rkpdesa');
Route::post('/cetak-apbdesa', [CetakAPB::class, 'cetakExcel'])->name('cetak-apbdesa');
Route::post('/export-usulan', [ExportUsulanController::class, 'exportUsulan'])->name('export-usulan');

Route::get('/kegiatan', IndexKegiatan::class)->middleware(['auth'])->name('kegiatan');

Route::group(['prefix' => '/master', 'as' => 'master', 'middleware' => 'auth'], function () {
    Route::get('/kegiatan', IndexKegiatan::class)->name('.kegiatan');
    Route::get('/user', IndexUser::class)->name('.user');
    Route::get('/visi-misi', EditVisiMisi::class)->name('.visi-misi');
    Route::get('/sejarah-desa', EditSejarahDesa::class)->name('.sejarah-desa');
    Route::get('/gambaran-umum', EditGambaranUmum::class)->name('.gambaran-umum');
    Route::get('/perangkat-desa', EditPerangkatDesa::class)->name('.perangkat-desa');
});

Route::group(['prefix' => '/perencanaan', 'as' => 'perencanaan', 'middleware' => 'auth'], function () {
    Route::get('/usulan', IndexUsulan::class)->name('.usulan');
    Route::get('/rkp-desa', IndexRkpdesa::class)->name('.rkp-desa');
    Route::get('/rapb-desa', IndexRapbdes::class)->name('.rapb-desa');
    Route::get('/apb-desa', IndexApbdesa::class)->name('.apb-desa');
});


require __DIR__ . '/auth.php';
