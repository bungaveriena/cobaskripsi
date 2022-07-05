<?php

namespace App\Http\Livewire;

use App\Models\PengajuanCek;
use Livewire\Component;

class FormPengajuancek extends Component
{
    public $pengajuanId, $nama_pengaju, $alamat, $no_tlp, $email_pengaju;
    public $asal_instansi, $nama_diajukan;
    public $relasi,  $keperluan;


    private function clearForm(){
        $this->nama_pengaju = '';
        $this->alamat = '';
        $this->no_tlp = '';
        $this->email_pengaju = '';
       
        $this->asal_instansi = '';
        $this->nama_diajukan = '';

        $this->relasi = '';
        $this->keperluan = '';
       
    }

    public function savePengajuan(){
        $this->validate([
            'nama_pengaju' => 'required',
            'alamat' => 'required',
            'email_pengaju' => 'required',
            //'no_tlp' => 'required',
            
            'asal_instansi' => 'required',
            'nama_diajukan' => 'required',
            //'email_pengaju_pengadu' => 'required',
            

            'relasi' => 'required',
            'keperluan' => 'required',
            
        ]);


        PengajuanCek::create([
            'nama_pengaju' => $this->nama_pengaju,
            'alamat' => $this->alamat,
            'email_pengaju' => $this->email_pengaju,
            'no_tlp' => $this->no_tlp,

            'asal_instansi' => $this->asal_instansi,
            'nama_diajukan' => $this->nama_diajukan,
            //'email_pengaju_pengadu' => $this->email_pengaju_pengadu,
            

            'relasi' => $this->relasi,
            'keperluan' => $this->keperluan,

        ]);

        session()->flash('message', 'Data tersimpan');
        $this->clearForm();
    }

    public function render()
    {
        return view('livewire.form-pengajuancek');
    }
}
