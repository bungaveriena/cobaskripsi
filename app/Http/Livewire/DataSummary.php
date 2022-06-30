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

    public $summaryId, $nama_pengaju, $nama_pelaku,  $summary;
    //public $email; alamat yang dituju utk mengirim summary ke pengaju
    public $isEdit = false;
    public $search;

    

    private function clearForm(){
        $this->nama_pengaju = '';
        $this->nama_pelaku = '';
        $this->summary = '';
        // $this->email = ''; email pengaju yang dituju
        
    }

    public function saveSummary(){
        $this->validate([
            'nama_pengaju' => 'required',
            'nama_pelaku' => 'required',
            'summary' => 'required'
            //'email' => 'required',
        ]);


        Summary::create([
            'nama_pengaju' => $this->nama_pengaju,
            'nama_pelaku' => $this->nama_pelaku,
            'summary' => $this->summary
            //'email' => $this->email,
        ]);

        Mail::to('baennable00@gmail.com')->send(new SendSummary($this->nama_pengaju,$this->nama_pelaku,$this->summary));


        session()->flash('message', 'Data tersimpan');
        $this->clearForm();
    }

    public function findSummaryById($id){
        $summary = Summary::findOrFail($id);
        
        $this->summaryId = $id; 
        $this->nama_pengaju = $summary->nama_pengaju;
        $this->nama_pelaku = $summary->nama_pelaku;
        $this->summary = $summary->summary;
        //$this->email = $summary->email;
        $this->isEdit = true;

    }

    public function updateSummary(){
        $this->validate([
            'nama_pengaju' => 'required',
            'nama_pelaku' => 'required',
            'summary' => 'required',
            //'email' => 'required',
            
        ]);

        $summary = Summary::findOrFail($this->summaryId);

            $updateData = [
                'nama_pengaju' => $this->nama_pengaju,
                'nama_pelaku' => $this->nama_pelaku,
                'summary' => $this->summary
                // 'email' => $this->email,
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

    // public function sendSummary(){
    //     $this->validate([
    //         'nama_pengaju' => 'required',
    //         'nama_pelaku' => 'required',
    //         'summary' => 'required'
    //         //'email' => 'required',
    //     ]);


    //     // Summary::create([
    //     //     'nama_pengaju' => $this->nama_pengaju,
    //     //     'nama_pelaku' => $this->nama_pelaku,
    //     //     'summary' => $this->summary
    //     //     //'email' => $this->email,
    //     // ]);

    //     session()->flash('message', 'Data tersimpan');
    //     $this->clearForm();
    // }

    public function render()
    {
        return view('livewire.data-summary', [
            'summaries' => $this->search == null ?
                Summary::latest()->paginate(5) :
                Summary::latest()->where('nama_pelaku', 'like', '%' . $this->search . '%' )->paginate(5)
        ]);

    }

}
