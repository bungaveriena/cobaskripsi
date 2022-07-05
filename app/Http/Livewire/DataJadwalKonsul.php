<?php

namespace App\Http\Livewire;

use App\Models\JadwalKonsul;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
use Livewire\Component;

class DataJadwalKonsul extends Component
{
    public  $jadwalkonsulId, $pengaduan_id, $pendamping_id, $tanggal, $pukul, $kronologi, $keterangan;

    public function clearForm(){
        $this->tanggal = '';
        $this->pukul = '';
        $this->kronologi = '';
        $this->keterangan = '';
    }

    public function saveJadwal(){
        $this->validate([
            'tanggal' => 'required',
            'pukul' => 'required',
            'kronologi' => 'required',
            'keterangan' => 'required'
        ]);


        JadwalKonsul::create([
            'tanggal' => $this->tanggal,
            'pukul' => $this->pukul,
            'kronologi' => $this->kronologi,
            'keterangan' => $this->keterangan
        ]);
        session()->flash('message', 'Data tersimpan');
        $this->clearForm();
    }

    public function sendJadwal(){
        $jadwal = JadwalKonsul::findOrFail($this->jadwalkonsulId);
        
        // Mail::to('baennable00@gmail.com')->send(new SendSummary($this->nama_pengaju,$this->nama_diajukan,$this->summary));
        Mail::to($jadwal->data_pengajuan->email_pengaju)->send(new SendJadwal($jadwal));
    }
    public function render()
    {
        return view('livewire.data-jadwal-konsul');
    }
}
