<div class ="container-fluid"> 
    <div class = "row">
        <div class = "col-md-8">
            <div class="card">
                <div class="card-header">
                    Map Location
                </div>
                <div class="card-body">
                    <div wire:ignore id='map' style='width: 100%; height: 70vh;'></div>
                </div>
            </div>
        </div>
    <div class = "col-md-4">
        <div class = "card">
            <div class = "card-header">
                Form data lokasi
            </div>
            <div class="card-body">
                <form 
                    @if($isEdit)
                        wire:submit.prevent="updateLocation"
                    @else
                        wire:submit.prevent="saveLocation"
                    @endif
                >
                    <div class= "row">
                        <div class = "col-sm-6">
                            <div class="form-group">
                                <label>longtitude</label>
                                <input wire:model= "long" type="text" class="form-control">
                                @error('long') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                        <div class = "col-sm-6">
                            <div class="form-group">
                                <label>latitude</label>
                                <input wire:model= "lat" type="text" class="form-control">
                                @error('lat') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>
                    <div class ="form-group">
                        <label>Nama Pelaku</label>
                        <input wire:model= "nama_pelaku" type="text" class="form-control">
                        @error('nama_pelaku') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class ="form-group">
                        <label>Alamat</label>
                        <input wire:model= "alamat" type="text" class="form-control">
                        @error('alamat') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class ="form-group">
                        <label>Keterangan</label>
                        <textarea wire:model= "keterangan" class="form-control"></textarea>
                        @error('keterangan') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class ="form-group">
                        <label>Image</label>
                        <div class="input-group mb-3">
                            <input wire:model="image" type="file" class="form-control" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            <!-- @if($image)
                                <img src="{{$image->temporaryUrl()}}" class="img-fluid">
                            @endif

                            @if($imageUrl && !$image)
                                <img src = "{{asset('/storage/images/'.$imageUrl)}}" class="img-fluid">
                            @endif -->
                        </div>
                        @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                        @if($image)
                                <img src="{{$image->temporaryUrl()}}" class="img-fluid">
                            @endif

                            @if($imageUrl && !$image)
                                <img src = "{{asset('/storage/images/'.$imageUrl)}}" class="img-fluid">
                            @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark text-white">{{ $isEdit? "Update Data" : "Submit Data"}}</button>
                        @if($isEdit)
                        <button wire:click="deleteLocation" type="button" class="btn btn-danger text-white">Delete Data</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>




@push('scripts')
<script>
    document.addEventListener('livewire:load', () => {
        const defaultLocation = [106.82228315717072, -6.367709249500379]

    mapboxgl.accessToken = '{{env ("MAPBOX_KEY")}}';
    var map = new mapboxgl.Map({
        container: 'map',
        center: defaultLocation,
        zoom: 9,
        style: 'mapbox://styles/mapbox/streets-v11'
    });


    
    const loadLocations = (geoJson) => {
        geoJson.features.forEach((location) =>{
            const {geometry, properties} = location
            
            //membuat tampilan marker
            const {iconSize,locationId, nama_pelaku, image, keterangan} = properties

            let markerElement = document.createElement('div')
            markerElement.className = 'marker' + locationId
            markerElement.id = locationId
            markerElement.style.backgroundImage = 'url(https://png.pngtree.com/svg/20170509/94738fda9c.png)'
            markerElement.style.backgroundSize = 'cover'
            markerElement.style.width = '30px'
            markerElement.style.height = '30px'

            const imageStorage = '{{asset("/storage/images")}}' + '/' + image

            const content = `
            <div style="overflow-y, auto;max-height: 300px, width 100%">
                <table class="table table-sm mt-2">
                    <tbody>
                        <tr>
                            <td>Nama Pelaku</td>
                            <td>${nama_pelaku}</td>
                        </tr>
                        <tr>
                            <td>Picture</td>
                            <td><img src="${imageStorage}" loading="lazy" class ="img-fluid"></td>
                        </tr>
                        <tr>
                            <td>keterangan</td>
                            <td>${keterangan}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            `

            markerElement.addEventListener('click', (e) =>{
                const locationId = e.target.id
                @this.findLocationById(locationId)
            })
                
            // markerElement.addEventListener('click', (e) => {
            //     const locationId = e.toElement.id
            //     @this.findLocation(locationId)
            // })


            const popUp = new mapboxgl.Popup({
                offset:25
            }).setHTML(content).setMaxWidth("300px")

            new mapboxgl.Marker(markerElement)
            .setLngLat(geometry.coordinates)
            .setPopup(popUp)
            .addTo(map)

        })
    }

    loadLocations({!! $geoJson !!})

    window.addEventListener('locationAdded', (e) => {
        loadLocations(JSON.parse(e.detail))
    })

    window.addEventListener('updateLocation', (e) => {
        loadLocations(JSON.parse(e.detail))
        $('.mapboxgl-popup').remove() //belum berjalan untuk remove popup setelah submit update
    })

    window.addEventListener('deleteLocation', (e) => {
        $('.marker' + e.detail).remove()
        $('.mapboxgl-popup').remove() //belum berjalan untuk remove popup setelah submit update
    })

    map.addControl(new mapboxgl.NavigationControl())
    
    map.on('click', (e) =>{
            const longtitude = e.lngLat.lng
            const latitude = e.lngLat.lat

            @this.long = longtitude
            @this.lat = latitude

            // console.log({longtitude,latitude});
        })
    })
    </script>
@endpush