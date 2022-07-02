<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\MapLocation;
use App\Http\Livewire\DataSummary;
use App\Http\Livewire\DataPendamping;
use App\Http\Livewire\DataPengaduan;
use App\Http\Livewire\FormPengaduan;
use App\Http\Livewire\DataPengajuancek;
use App\Http\Livewire\FormPengajuancek;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/map', MapLocation::class);
// Route::get('datapendamping', DataPendamping::class);

// Route::get('/summary', 'summary.index')->name('summary.index');
// Route::livewire('/create', 'summary.create')->name('summary.create');
// Route::livewire('/edit/{id}', 'summary.edit')->name('summary.edit');

Route::get('/summary', DataSummary::class);
Route::get('/pendamping', DataPendamping::class);
Route::get('/pengaduan', DataPengaduan::class);
Route::get('/formpengaduan', FormPengaduan::class);
Route::get('/pengajuancek', DataPengajuancek::class);
Route::get('/formpengajuancek', FormPengajuancek::class);