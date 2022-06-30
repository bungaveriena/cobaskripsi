<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message')}}
        </div>
    @endif
<form @if($isDetail)
        wire:submit.prevent="findPengaduanById"
    @endif>
    <div class="form-group">
        <div class="form-row">
            <div class="col">
                <input  wire:model= "nama_pengaju" type="text" class="form-control @error('nama_pengaju') is-invalid @enderror"  placeholder="nama pengaju">
                @error('nama_pengaju')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <input  wire:model= "alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"  placeholder="alamat pengaju">
                @error('alamat')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <input  wire:model= "no_tlp" type="text" class="form-control @error('no_tlp') is-invalid @enderror"  placeholder="no tlp pengaju">
                @error('no_tlp')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <input  wire:model= "email" type="text" class="form-control @error('email') is-invalid @enderror"  placeholder="email pengaju">
                @error('email')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <input  wire:model= "asal_instansi" type="text" class="form-control @error('asal_instansi') is-invalid @enderror"  placeholder="asal instansi">
                @error('asal_instansi')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <input  wire:model= "nama_diajukan" type="text" class="form-control @error('nama_diajukan') is-invalid @enderror"  placeholder="relasi pembuat pengaduan dengan korban">
                @error('nama_diajukan')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <input  wire:model= "relasi" type="text" class="form-control @error('relasi') is-invalid @enderror"  placeholder="nama pelaku">
                @error('relasi')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <input  wire:model= "keperluan" type="text" class="form-control @error('keperluan') is-invalid @enderror"  placeholder="alamat pelaku">
                @error('keperluan')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</form>


<div class="col">
    <input wire:model="search" type="text" class="form-control form-control-sm" placeholder="Search">
</div>

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Pengaju</th>
            <th scope="col">Alamat Pengaju</th>
            <th scope="col">Email Pengaju</th>
            <th scope="col">Asal Instansi</th>
            <th scope="col">Nama yang diajukan</th>
            <th scope="col">Relasi</th>
            <th scope="col">Keperluan</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 0; ?>
        @foreach($data_pengajuan_ceks as $data)
        <?php $no++; ?>
        <tr>
            <th scope ="row">{{ $no }} </th>
            <td>{{ $data->nama_pengaju }}</td>
            <td>{{ $data->alamat }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->asal_instansi }}</td>
            <td>{{ $data->nama_diajukan }}</td>
            <td>{{ $data->relasi }}</td>
            <td>{{ $data->keperluan }}</td>
            <td>
               <button wire:click="findPengajuanById({{ $data->id}})" class = "btn btn-sm btn-info text-white">Detail</button>
               <button class = "btn btn-sm btn-danger text-white">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
