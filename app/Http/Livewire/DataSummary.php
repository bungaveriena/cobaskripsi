<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PengajuanCek;
use App\Models\Summary;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendSummary;
use Livewire\WithPagination;

class DataSummary extends Component
{
    use WithPagination;

    public $summaryId, $nama_pengaju, $email_pengaju, $created_by, $nama_diajukan,  $summary;
    public $pengajuanId;
    //public $email; alamat yang dituju utk mengirim summary ke pengaju
    public $isDetailPengajuan = false;
    public $isEdit = false;
    public $search;

    

    private function clearForm(){
        $this->nama_pengaju = '';
        $this->nama_diajukan = '';
        $this->summary = '';
        $this->created_by = '';
        $this->email_pengaju = ''; //email pengaju yang dituju
        
    }

    // public function findPengajuanById($id){
    //     $pengajuan = PengajuanCek::findOrFail($id);
        
    //     $this->pengajuanId = $id; 
    //     $this->nama_pengaju = $pengajuan->nama_pengaju;
    //     $this->nama_diajukan = $pengajuan->nama_diajukan;
    //     $this->email_pengaju = $pengajuan->email_pengaju;
    //     $this->isDetailPengajuan = true;

    // }
    
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
            //'nama_pengaju' => $this->nama_pengaju,
            'nama_diajukan' => $this->nama_diajukan,
            'summary' => $this->summary,
            'created_by' => $this->created_by,
            'email_pengaju' => $this->email_pengaju
        ]);



        session()->flash('message', 'Data tersimpan');
        $this->clearForm();
    }

    public function findSummaryById($id){
        $summary = Summary::findOrFail($id);
        
        $this->summaryId = $id; 
        $this->nama_pengaju = $summary->nama_pengaju;
        $this->nama_diajukan = $summary->nama_diajukan;
        $this->summary = $summary->summary;
        $this->email_pengaju = $summary->email_pengaju;
        $this->created_by = $summary->created_by;
        $this->isEdit = true;

    }

    public function updateSummary(){
        $this->validate([
            'nama_pengaju' => 'required',
            'nama_diajukan' => 'required',
            'summary' => 'required',
            'email_pengaju' => 'required'
            
        ]);

        $summary = Summary::findOrFail($this->summaryId);

            $updateData = [
                'nama_pengaju' => $this->nama_pengaju,
                'nama_diajukan' => $this->nama_diajukan,
                'summary' => $this->summary,
                'email_pengaju' => $this->email_pengaju,
                'created_by' => $this->created_by
            ];
        

        $summary->update($updateData);

        $this->clearForm();
    }

    public function deleteSummary($id){
        if($id) {
            $summary = Summary::find($id);
            $summary->delete();
            session()->flash('message', 'Data terhapus');
        }


    }

    public function sendSummary(){
       
        
        // $konten_email = [
        //     'nama_pengaju' => $this->nama_pengaju,
        //     'nama_diajukan' => $this->nama_diajukan,
        //     'summary' => $this->summary,
        //     'email_pengaju' => $this->email_pengaju,
        // ];
        
        $summary = Summary::findOrFail($this->summaryId);
        
        // Mail::to('baennable00@gmail.com')->send(new SendSummary($this->nama_pengaju,$this->nama_diajukan,$this->summary));
        Mail::to($summary->email_pengaju)->send(new SendSummary($summary));
        

        session()->flash('message', 'Data tersimpan');
        $this->clearForm();
    }

    public function render()
    {
        return view('livewire.data-summary', [
            'summaries' => $this->search == null ?
                Summary::latest()->paginate(5) :
                Summary::latest()->where('nama_diajukan', 'like', '%' . $this->search . '%' )->paginate(5)
        ]);

    }

}
