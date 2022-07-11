<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JadwalKonsulController;
use App\Http\Controllers\PengaduanKonsulController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\DashboardAdmin;
use App\Http\Livewire\DataJadwalKonsul;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\MapLocation;
use App\Http\Livewire\DataSummary;
use App\Http\Livewire\DataPendamping;
use App\Http\Livewire\DataPengaduan;
use App\Http\Livewire\FormPengaduan;
use App\Http\Livewire\DataPengajuancek;
use App\Http\Livewire\FormPengajuancek;
use App\Http\Livewire\HomeIndex;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes();

Route::post('proses_regis', [AuthController::class, 'proses_regis'])->name('proses_regis');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('datapendamping', DataPendamping::class);

// Route::get('/summary', 'summary.index')->name('summary.index');
// Route::livewire('/create', 'summary.create')->name('summary.create');
// Route::livewire('/edit/{id}', 'summary.edit')->name('summary.edit');

//Route::get('/summary', DataSummary::class);



//Route::get('/datajadwalkonsul', JadwalKonsulController::class);
Route::resource('/datajadwalkonsul', JadwalKonsulController::class);
//Route::resource('/pengaduankonsul', PengaduanKonsulController::class);



Route::get('/pengaduan', DataPengaduan::class);
//Route::get('/jadwalkonsul', DataJadwalKonsul::class);
Route::get('/formpengaduan', FormPengaduan::class);
Route::get('/pengajuancek', DataPengajuancek::class);
Route::get('/formpengajuancek', FormPengajuancek::class);
Route::get('/index', HomeIndex::class);


Route::group(['middleware' => ['auth', 'cekroleuser: 1,2']], function() {
    //Route::group(['middleware' => ['cekroleuser']])
    Route::get('/dashboard', DashboardAdmin::class);
    Route::get('/pendamping', DataPendamping::class);
    Route::resource('/user', UserController::class);
    Route::resource('/summary', SummaryController::class);
    Route::get('/map', MapLocation::class);
    Route::get('/list', [SummaryController::class, 'listSummary'])->name('listSummary');
    Route::get('/list/{summary}', [SummaryController::class, 'sendSummary'])->name('sendSummary'); //untuk button send email di summary.summary
});