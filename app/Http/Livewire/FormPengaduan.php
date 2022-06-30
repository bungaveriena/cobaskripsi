<?php

namespace App\Http\Livewire;

use App\Models\Pengaduan;
use Livewire\Component;

class FormPengaduan extends Component
{

    public $pengaduanId, $nama_korban, $alamat_korban, $email_korban, $notlp_korban;
    public $pembuat_pengaduan, $relasi_korban;
    public $nama_pelaku,  $alamat_pelaku, $email_pelaku, $notlp_pelaku;
    public $bukti, $bantuan;

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

    public function savePengaduan(){
        $this->validate([
            'nama_korban' => 'required',
            'alamat_korban' => 'required',
            'notlp_korban' => 'required',
            //'email_korban' => 'required',
            
            'pembuat_pengaduan' => 'required',
            'relasi_korban' => 'required',
            //'email_pengadu' => 'required',
            

            'nama_pelaku' => 'required',
            'alamat_pelaku' => 'required',
            //'email_pelaku' => 'required',
            'notlp_pelaku' => 'required',

            'bukti' => 'required',
            'bantuan' => 'required'
        ]);


        Pengaduan::create([
            'nama_korban' => $this->nama_korban,
            'alamat_korban' => $this->alamat_korban,
            'notlp_korban' => $this->notlp_korban,
            'email_korban' => $this->email_korban,

            'pembuat_pengaduan' => $this->pembuat_pengaduan,
            'relasi_korban' => $this->relasi_korban,
            //'email_pengadu' => $this->email_pengadu,
            

            'nama_pelaku' => $this->nama_pelaku,
            'alamat_pelaku' => $this->alamat_pelaku,
            'email_pelaku' => $this->email_pelaku,
            'notlp_pelaku' => $this->notlp_pelaku,

            'bukti' => $this->bukti,
            'bantuan' => $this->bantuan
        ]);

        session()->flash('message', 'Data tersimpan');
        $this->clearForm();
    }

    public function render()
    {
        return view('livewire.form-pengaduan');
    }
}
