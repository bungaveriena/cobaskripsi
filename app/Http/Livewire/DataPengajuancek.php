<?php

namespace App\Http\Livewire;

use App\Models\PengajuanCek;
use Livewire\Component;

class DataPengajuancek extends Component
{
    public $pengajuanId, $nama_pengaju, $alamat, $no_tlp, $email_pengaju;
        public $asal_instansi, $nama_diajukan;
        public $relasi,  $keperluan;
        public $isDetail = false;
        public $isMakeSummary = false;
        public $search;
    
        public function findPengajuanById($id){
            $data_pengajuan = PengajuanCek::findOrFail($id);
            
            $this->pengajuanId = $id; 
            $this->nama_pengaju = $data_pengajuan->nama_pengaju;
            $this->alamat = $data_pengajuan->alamat;
            $this->no_tlp = $data_pengajuan->no_tlp;
            $this->email_pengaju = $data_pengajuan->email_pengaju;
    
            $this->asal_instansi = $data_pengajuan->asal_instansi;
            $this->nama_diajukan = $data_pengajuan->nama_diajukan;
    
            $this->relasi = $data_pengajuan->relasi;
            $this->keperluan = $data_pengajuan->keperluan;
            $this->isDetail = true;
    
        }

    public function makeSummary($id){
        $this->isMakeSummary = true;
        $data_pengajuan = PengajuanCek::findOrFail($id);
        $this->emit('makeSummary', $data_pengajuan);
        
            
            // $this->pengajuanId = $id; 
            // $this->nama_pengaju = $data_pengajuan->nama_pengaju;
            // $this->alamat = $data_pengajuan->alamat;
            // $this->no_tlp = $data_pengajuan->no_tlp;
            // $this->email_pengaju = $data_pengajuan->email_pengaju;
    
            // $this->asal_instansi = $data_pengajuan->asal_instansi;
            // $this->nama_diajukan = $data_pengajuan->nama_diajukan;
    
            // $this->relasi = $data_pengajuan->relasi;
            // $this->keperluan = $data_pengajuan->keperluan;
            // $this->isDetail = true;
        return redirect()->to('summary');
    }

    public function render()
    {
        return view('livewire.data-pengajuancek', [
            'data_pengajuan_ceks' => PengajuanCek::latest()->get()
        ]);
    }
}
