<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Summary;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendSummary;
use Livewire\WithPagination;

class DataSummary extends Component
{
    use WithPagination;

    public $summaryId, $nama_pengaju, $email_pengaju, $created_by, $nama_pelaku,  $summary;
    //public $email; alamat yang dituju utk mengirim summary ke pengaju
    public $isEdit = false;
    public $search;

    

    private function clearForm(){
        $this->nama_pengaju = '';
        $this->nama_pelaku = '';
        $this->summary = '';
        $this->created_by = '';
        $this->email_pengaju = ''; //email pengaju yang dituju
        
    }

    public function saveSummary(){
        $this->validate([
            'nama_pengaju' => 'required',
            'nama_pelaku' => 'required',
            'summary' => 'required',
            'created_by' => 'required',
            'email_pengaju' => 'required',
        ]);


        Summary::create([
            'nama_pengaju' => $this->nama_pengaju,
            'nama_pelaku' => $this->nama_pelaku,
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
        $this->nama_pelaku = $summary->nama_pelaku;
        $this->summary = $summary->summary;
        $this->email_pengaju = $summary->email_pengaju;
        $this->created_by = $summary->created_by;
        $this->isEdit = true;

    }

    public function updateSummary(){
        $this->validate([
            'nama_pengaju' => 'required',
            'nama_pelaku' => 'required',
            'summary' => 'required',
            'email_pengaju' => 'required'
            
        ]);

        $summary = Summary::findOrFail($this->summaryId);

            $updateData = [
                'nama_pengaju' => $this->nama_pengaju,
                'nama_pelaku' => $this->nama_pelaku,
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
        //     'nama_pelaku' => $this->nama_pelaku,
        //     'summary' => $this->summary,
        //     'email_pengaju' => $this->email_pengaju,
        // ];
        
        $summary = Summary::findOrFail($this->summaryId);
        
        // Mail::to('baennable00@gmail.com')->send(new SendSummary($this->nama_pengaju,$this->nama_pelaku,$this->summary));
        Mail::to($summary->email_pengaju)->send(new SendSummary($summary));
        

        session()->flash('message', 'Data tersimpan');
        $this->clearForm();
    }

    public function render()
    {
        return view('livewire.data-summary', [
            'summaries' => $this->search == null ?
                Summary::latest()->paginate(5) :
                Summary::latest()->where('nama_pelaku', 'like', '%' . $this->search . '%' )->paginate(5)
        ]);

    }

}
