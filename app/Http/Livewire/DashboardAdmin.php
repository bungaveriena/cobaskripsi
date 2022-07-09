<?php

namespace App\Http\Livewire;

namespace App\Http\Livewire;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

use Livewire\Component;
use App\Models\Location;
use App\Models\User;


class DashboardAdmin extends Component
{
    use WithFileUploads;

    public $locationId, $long, $lat, $nama_pelaku, $keterangan, $alamat, $image;
    public $geoJson;
    public $userId, $name, $email, $password, $role_id;
    public $imageUrl;
    public $isEdit = false;

    // private function loadUser(){
    //     $users = User::all();

    //     foreach($users as $user){

    //     }
    // }
    
    private function loadLocations(){
        $locations = Location::orderBy('created_at', 'asc')->get();

        $customLocations = [];

        foreach($locations as $location){
            $customLocations[] =[
                'type' => 'Feature',
                'geometry' => [
                    'coordinates' => [$location->long, $location->lat],
                ],
                'properties' => [
                    'locationId' => $location->id,
                    'nama_pelaku' => $location->nama_pelaku,
                    'image'=> $location->image,
                    'keterangan'=> $location->keterangan
                ]

            ];        
        }

        $geoLocation = [
            'type' => 'FeatureCollection',
            'features' => $customLocations
        ];

        $geoJson = collect($geoLocation)->toJson();
        $this->geoJson = $geoJson;
    }
    
    private function clearForm(){
        $this->long = '';
        $this->lat = '';
        $this->nama_pelaku = '';
        $this->alamat = '';
        $this->keterangan = '';
        $this->image = '';
    }

    public function saveLocation(){
        $this->validate([
            'long' => 'required',
            'lat' => 'required',
            'nama_pelaku' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required',
            'image' => 'image|max:2048|required',
        ]);

        $imageName = md5($this->image.microtime()).'.'.$this->image->extension();

        Storage::putFileAs(
            'public/images',
            $this->image,
            $imageName
        );

        Location::create([
            'long' => $this->long,
            'lat' => $this->lat,
            'nama_pelaku' => $this->nama_pelaku,
            'alamat' => $this->alamat,
            'keterangan' => $this->keterangan,
            'image' => $imageName,
        ]);

        $this->clearForm();
        $this->loadLocations();
        $this->dispatchBrowserEvent('locationAdded', $this->geoJson);
    }

    public function findLocationById($id){
        $location = Location::findOrFail($id);
        
        $this->locationId = $id; 
        $this->long = $location->long;
        $this->lat = $location->lat;
        $this->nama_pelaku = $location->nama_pelaku;
        $this->alamat = $location->alamat;
        $this->keterangan = $location->keterangan;
        $this->imageUrl = $location->image;
        $this->isEdit = true;

    }

    public function saveUser(){
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
            
        ]);


        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role_id' => $this->role_id
        ]);



        session()->flash('message', 'Data tersimpan');
        $this->clearForm();
    }

    public function findUserById($id){
        $user = User::findOrFail($id);
        
        $this->userId = $id; 
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role_id = $user->role_id;
        $this->isEdit = true;

    }

    public function updateUser(){
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
            
        ]);

        $user = User::findOrFail($this->userId);

            $updateData = [
                'name' => $this->name,
                'email' => $this->email,
                'role_id' => $this->role_id
            ];
        

        $user->update($updateData);

        $this->clearForm();
    }

    public function deleteUser($id){
        if($id) {
            $user = User::find($id);
            $user->delete();
            session()->flash('message', 'Data terhapus');
        }


    }

    public function datapengajuan()
    {
        return redirect()->to('/summary');
    }

    public function datapengaduan()
    {
        return redirect()->to('/datajadwalkonsul');
    }

    public function datasummary()
    {
        return redirect()->to('/list');
    }

    public function datapendamping()
    {
        return redirect()->to('/pendamping');
    }

    public function datajadwal()
    {
        return redirect()->to('/jadwalkonsul');
    }

    public function render()
    {
        $this->loadLocations();
        return view('livewire.dashboard-admin',[
            'users' => User::latest()->get()
        ]);
    }

    // public function render()
    // {
    //     return view('livewire.dashboard-admin');
    // }
}
