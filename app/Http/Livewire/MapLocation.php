<?php

namespace App\Http\Livewire;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

use Livewire\Component;
use App\Models\Location;

class MapLocation extends Component
{
    use WithFileUploads;

    public $locationId, $long, $lat, $nama_pelaku, $keterangan, $alamat, $image;
    public $geoJson;
    public $imageUrl;
    public $isEdit = false;
    
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

    public function updateLocation(){
        $this->validate([
            'long' => 'required',
            'lat' => 'required',
            'nama_pelaku' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required',
            
        ]);

        $location = Location::findOrFail($this->locationId);

        if($this->image){
            $imageName = md5($this->image.microtime()).'.'.$this->image->extension();

            Storage::putFileAs(
                'public/images',
                $this->image,
                $imageName
            );

            $updateData = [
                'nama_pelaku' => $this->nama_pelaku,
                'alamat' => $this->alamat,
                'keterangan' => $this->keterangan,
                'image' => $imageName,
            ];
        }else{
            $updateData = [
                'nama_pelaku' => $this->nama_pelaku,
                'alamat' => $this->alamat,
                'keterangan' => $this->keterangan,
            ];
        }

        $location->update($updateData);

        $this->imageUrl = "";
        $this->clearForm();
        $this->loadLocations();
        $this->dispatchBrowserEvent('updateLocation', $this->geoJson);
    }

    public function deleteLocation(){
        $location = Location::findOrFail($this->locationId);
        $location->delete();

        $this->imageUrl = "";
        $this->clearForm();
        $this->isEdit = false;
        $this->dispatchBrowserEvent('deleteLocation', $location->id);
    }

    public function render()
    {
        $this->loadLocations();
        return view('livewire.map-location');
    }
}
