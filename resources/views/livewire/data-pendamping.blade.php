<div>

@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message')}}
    </div>
@endif

<form  
@if($isEdit)
    wire:submit.prevent="updatePendamping"
@else
    wire:submit.prevent="savePendamping"
@endif>
    <div class="form-group">
        <div class="form-row">
            <div class="col">
                <input  wire:model= "nama_pendamping" type="text" class="form-control @error('nama_pendamping') is-invalid @enderror"  placeholder="nama pendamping">
                @error('nama_pendamping')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <input  wire:model= "pendidikan" type="text" class="form-control @error('pendidikan') is-invalid @enderror"  placeholder="pendidikan">
                @error('pendidikan')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <input  wire:model= "email" type="text" class="form-control @error('email') is-invalid @enderror"  placeholder="email">
                @error('email')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <input  wire:model= "no_tlp" type="text" class="form-control @error('no_tlp') is-invalid @enderror"  placeholder="no tlp">
                @error('no_tlp')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-sm btn-primary">{{ $isEdit? "Update Data" : "Submit Data"}}</button>
</form>

<div class="col">
    <input wire:model="search" type="text" class="form-control form-control-sm" placeholder="Search">
</div>

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama pendamping</th>
            <th scope="col">Pendidikan</th>
            <th scope="col">Email</th>
            <th scope="col">Nomor Telepon</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 0; ?>
        @foreach($pendampings as $pendamping)
        <?php $no++; ?>
        <tr>
            <th scope ="row">{{ $no }} </th>
            <td>{{ $pendamping->nama_pendamping }}</td>
            <td>{{ $pendamping->pendidikan }}</td>
            <td>{{ $pendamping->email }}</td>
            <td>{{ $pendamping->no_tlp }}</td>
            <td>
               <button wire:click="findPendampingById({{ $pendamping->id}})" class = "btn btn-sm btn-info text-white">Edit</button>
               <button wire:click="deletePendamping({{$pendamping->id}})" class = "btn btn-sm btn-danger text-white">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $pendampings->links() }}

</div>
