<?php

namespace App\Http\Livewire;

use App\Models\Pengaduan;
use Livewire\Component;

class DataPengaduan extends Component
{

        public $pengaduanId, $nama_korban, $alamat_korban, $email_korban, $notlp_korban;
        public $pembuat_pengaduan, $relasi_korban;
        public $nama_pelaku,  $alamat_pelaku, $email_pelaku, $notlp_pelaku;
        public $bukti, $bantuan;
        public $isDetail = false;
        public $search;

    private function clearForm(){
            $this->nama_korban = '';
            $this->alamat_korban = '';
            $this->email_korban = '';
            $this->notlp_korban = '';
           
            $this->pembuat_pengaduan = '';
            $this->relasi_korban = '';
    
            $this->nama_pelaku = '';
            $this->alamat_pelaku = '';
            $this->email_pelaku = '';
            $this->notlp_pelaku = '';

            $this->bukti = '';
            $this->bantuan = '';
            
    }

    public function findPengaduanById($id){
        $data_pengaduan = Pengaduan::findOrFail($id);
        
        $this->pengaduanId = $id; 
        $this->nama_korban = $data_pengaduan->nama_korban;
        $this->alamat_korban = $data_pengaduan->alamat_korban;
        $this->email_korban = $data_pengaduan->email_korban;
        $this->notlp_korban = $data_pengaduan->notlp_korban;

        $this->pembuat_pengaduan = $data_pengaduan->pembuat_pengaduan;
        $this->relasi_korban = $data_pengaduan->relasi_korban;

        $this->nama_pelaku = $data_pengaduan->nama_pelaku;
        $this->alamat_pelaku = $data_pengaduan->alamat_pelaku;
        $this->email_pelaku = $data_pengaduan->email_pelaku;
        $this->notlp_pelaku = $data_pengaduan->notlp_pelaku;

        $this->bukti = $data_pengaduan->bukti;
        $this->bantuan = $data_pengaduan->bantuan;
        $this->isDetail = true;

    }
    

    public function render()
    {
        return view('livewire.data-pengaduan',[
            'data_pengaduans' => Pengaduan::latest()->get()
        ]);
    }
}
