<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pendamping;
use Livewire\WithPagination;

class DataPendamping extends Component
{
    use WithPagination;

    public $pendampingId, $nama_pendamping, $pendidikan,  $email, $no_tlp;
    //public $asal; asal instansi marger program pendampingan seperti Komnas Perempuan, peremPUAN, kompaks dll
    public $isEdit = false;
    public $search;

    

    private function clearForm(){
        $this->nama_pendamping = '';
        $this->pendidikan = '';
        $this->email = '';
        $this->no_tlp = '';
        // $this->asal = ''; asal komunitas/instansi pendamping
        
    }

    public function savePendamping(){
        $this->validate([
            'nama_pendamping' => 'required',
            'pendidikan' => 'required',
            'email' => 'required',
            'no_tlp' => 'required'
            //'asal' => 'required',
        ]);


        Pendamping::create([
            'nama_pendamping' => $this->nama_pendamping,
            'pendidikan' => $this->pendidikan,
            'email' => $this->email,
            'no_tlp' => $this->no_tlp
            //'asal' => $this->email,
        ]);

        session()->flash('message', 'Data tersimpan');
        $this->clearForm();
    }

    public function findPendampingById($id){
        $pendamping = Pendamping::findOrFail($id);
        
        $this->pendampingId = $id; 
        $this->nama_pendamping = $pendamping->nama_pendamping;
        $this->pendidikan = $pendamping->pendidikan;
        $this->email = $pendamping->email;
        $this->no_tlp = $pendamping->no_tlp;
        //$this->asal = $pendamping->asal;
        $this->isEdit = true;

    }

    public function updatePendamping(){
        $this->validate([
            'nama_pendamping' => 'required',
            'pendidikan' => 'required',
            'email' => 'required',
            'no_tlp' => 'required'
            //'asal' => 'required',
            
        ]);

        $pendamping = Pendamping::findOrFail($this->pendampingId);

            $updateData = [
                'nama_pendamping' => $this->nama_pendamping,
                'pendidikan' => $this->pendidikan,
                'email' => $this->email,
                'no_tlp' => $this->no_tlp
                //'asal' => $this->email,
            ];
        

        $pendamping->update($updateData);

        $this->clearForm();
    }

    public function deletePendamping($id){
        if($id) {
            $pendamping = Pendamping::find($id);
            $pendamping->delete();
            session()->flash('message', 'Data terhapus');
        }


    }

    public function render()
    {
        return view('livewire.data-pendamping', [
            'pendampings' => $this->search == null ?
                Pendamping::latest()->paginate(5) :
                Pendamping::latest()->where('nama_pendamping', 'like', '%' . $this->search . '%' )->paginate(5)
        ]);
    }
}
