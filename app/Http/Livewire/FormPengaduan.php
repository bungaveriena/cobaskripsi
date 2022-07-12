<?php

namespace App\Http\Livewire;

use App\Models\Pengaduan;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class FormPengaduan extends Component
{
    use WithFileUploads;

    public $pengaduanId, $nama_korban, $alamat_korban, $email_korban, $notlp_korban;
    public $pembuat_pengaduan, $relasi_korban;
    public $nama_pelaku,  $alamat_pelaku, $email_pelaku, $notlp_pelaku;
    public $kronologi, $bukti, $bantuan;

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

        $this->kronologi = '';
        $this->bukti = '';
        $this->bantuan = '';
    }

    public function saveData(){
            $this->validate([
            'nama_korban' => 'required',
            'alamat_korban' => 'required',
            'notlp_korban' => 'required',
            
            'pembuat_pengaduan' => 'required',
            'relasi_korban' => 'required',
            

            'nama_pelaku' => 'required',
            'alamat_pelaku' => 'required',
            'notlp_pelaku' => 'required',

            'kronologi' => 'required',
            'bukti' => 'required',
            'bantuan' => 'required'
        ]);

        $fileName = md5($this->bukti.microtime()).'.'.$this->bukti->extension();

        Storage::putFileAs(
            'public/filebukti',
            $this->bukti,
            $fileName
        );

        Pengaduan::create([
            'nama_korban' => $this->nama_korban,
            'alamat_korban' => $this->alamat_korban,
            'notlp_korban' => $this->notlp_korban,
            'email_korban' => $this->email_korban,

            'pembuat_pengaduan' => $this->pembuat_pengaduan,
            'relasi_korban' => $this->relasi_korban,
            'nama_pelaku' => $this->nama_pelaku,
            'alamat_pelaku' => $this->alamat_pelaku,
            'email_pelaku' => $this->email_pelaku,
            'notlp_pelaku' => $this->notlp_pelaku,
        
            'kronologi' => $this->kronologi,
            'bantuan' => $this->bantuan,
            'bukti' => $fileName,
        ]);

        session()->flash('message', 'Data tersimpan');
        $this->clearForm();
    }

    // public function savePengaduan(){
    //     $this->validate([
    //         'nama_korban' => 'required',
    //         'alamat_korban' => 'required',
    //         'notlp_korban' => 'required',
    //         //'email_korban' => 'required',
            
    //         'pembuat_pengaduan' => 'required',
    //         'relasi_korban' => 'required',
    //         //'email_pengadu' => 'required',
            

    //         'nama_pelaku' => 'required',
    //         'alamat_pelaku' => 'required',
    //         //'email_pelaku' => 'required',
    //         'notlp_pelaku' => 'required',

    //         'bukti' => 'required',
    //         'bantuan' => 'required'
    //     ]);

    //     // $file = $this->bukti;
    //     // $fileName = $file->getClientOriginalExtension();
    //     // $file->move('buktipengaduan/', $fileName);

    //     //  $bukti = md5($this->bukti.microtime()).'.'.$this->bukti->extension();

    //     // Storage::putFileAs(
    //     //     'public/buktipengaduan',
    //     //     $this->bukti,
    //     //     $bukti
    //     // );

    //     // $bukti = $this->bukti->store('buktipengaduan','public');

    //     // $buktiFile = $this->bukti->extension();
    //     // Storage::putFile(
    //     //      'public/buktipengaduan',
    //     //      $this->bukti,
    //     //     );

    //     // laravel crud upload
    //     // $bukti = $this->bukti->file('bukti');
    //     // $bukti->storeAs('public/buktipengaduan', $this->bukti);


    //     Pengaduan::create([
    //         'nama_korban' => $this->nama_korban,
    //         'alamat_korban' => $this->alamat_korban,
    //         'notlp_korban' => $this->notlp_korban,
    //         'email_korban' => $this->email_korban,

    //         'pembuat_pengaduan' => $this->pembuat_pengaduan,
    //         'relasi_korban' => $this->relasi_korban,
    //         //'email_pengadu' => $this->email_pengadu,
            

    //         'nama_pelaku' => $this->nama_pelaku,
    //         'alamat_pelaku' => $this->alamat_pelaku,
    //         'email_pelaku' => $this->email_pelaku,
    //         'notlp_pelaku' => $this->notlp_pelaku,

    //         'bukti' => $this->bukti,
    //         'bantuan' => $this->bantuan
    //     ]);

    //     session()->flash('message', 'Data tersimpan');
    //     $this->clearForm();
    // }

    public function render()
    {
        return view('livewire.form-pengaduan');
    }
}
