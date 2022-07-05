<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Summary;

class MakeSummary extends Component
{
    public $summaryId, $nama_pengaju, $email_pengaju, $created_by, $nama_diajukan,  $summary;
    public $pengajuanId;
    //public $email; alamat yang dituju utk mengirim summary ke pengaju
    public $isDetailPengajuan = false;
    public $isEdit = false;
    public $search;


    public function saveSummary(){
        $this->validate([
            'nama_pengaju' => 'required',
            'nama_diajukan' => 'required',
            'summary' => 'required',
            'created_by' => 'required',
            'email_pengaju' => 'required',
        ]);


        Summary::create([
            'nama_pengaju' => $this->nama_pengaju,
            'nama_diajukan' => $this->nama_diajukan,
            'summary' => $this->summary,
            'created_by' => $this->created_by,
            'email_pengaju' => $this->email_pengaju
        ]);



        session()->flash('message', 'Data tersimpan');
        $this->clearForm();
    }

    protected $listerners = [
        'makeSummary' => 'makeSummary'
    ];
    
    public function makeSummary($data_pengajuan){
        $this->nama_pengaju = $data_pengajuan['nama_pengaju'];
        $this->email_pengaju =$data_pengajuan['email_pengaju'];
        $this->nama_diajukan = $data_pengajuan['nama_diajukan'];
        $this->pengajuanId =$data_pengajuan['pengajuanId'];
        
        //$this->created_by =$data_pengajuan['nama_pengaju'];
    }

    public function render()
    {
        return view('livewire.make-summary');
    }

    
}
