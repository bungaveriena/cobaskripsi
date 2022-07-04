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
                <input  wire:model= "nama_korban" type="text" class="form-control @error('nama_korban') is-invalid @enderror"  placeholder="nama korban">
                @error('nama_korban')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <input  wire:model= "alamat_korban" type="text" class="form-control @error('alamat_korban') is-invalid @enderror"  placeholder="alamat korban">
                @error('alamat_korban')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <input  wire:model= "email_korban" type="text" class="form-control @error('email_korban') is-invalid @enderror"  placeholder="email korban">
                @error('email_korban')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <input  wire:model= "notlp_korban" type="text" class="form-control @error('notlp_korban') is-invalid @enderror"  placeholder="no tlp korban">
                @error('notlp_korban')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <input  wire:model= "pembuat_pengaduan" type="text" class="form-control @error('pembuat_pengaduan') is-invalid @enderror"  placeholder="no tlp korban">
                @error('pembuat_pengaduan')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <input  wire:model= "relasi_korban" type="text" class="form-control @error('relasi_korban') is-invalid @enderror"  placeholder="relasi pembuat pengaduan dengan korban">
                @error('relasi_korban')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <input  wire:model= "nama_pelaku" type="text" class="form-control @error('nama_pelaku') is-invalid @enderror"  placeholder="nama pelaku">
                @error('nama_pelaku')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <input  wire:model= "alamat_pelaku" type="text" class="form-control @error('alamat_pelaku') is-invalid @enderror"  placeholder="alamat pelaku">
                @error('alamat_pelaku')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <input  wire:model= "email_pelaku" type="text" class="form-control @error('email_pelaku') is-invalid @enderror"  placeholder="email pelaku">
                @error('email_pelaku')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <input  wire:model= "notlp_pelaku" type="text" class="form-control @error('notlp_pelaku') is-invalid @enderror"  placeholder="no tlp pelaku">
                @error('notlp_pelaku')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <input  wire:model= "bukti" type="text" class="form-control @error('bukti') is-invalid @enderror"  placeholder="bukti">
                @error('bukti')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <input  wire:model= "bantuan" type="text" class="form-control @error('bantuan') is-invalid @enderror"  placeholder="bantuan">
                @error('bantuan')
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
            <th scope="col">Nama Korban</th>
            <th scope="col">Alamat Korban</th>
            <th scope="col">Nomor Telepon Korban</th>
            <th scope="col">Pembuat Pengaduan</th>
            <th scope="col">Pelaku Yang dilaporkan</th>
            <th scope="col">Bukti</th>
            <th scope="col">Bantuan Yang Dibutuhkan</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 0; ?>
        @foreach($data_pengaduans as $data)
        <?php $no++; ?>
        <tr>
            <th scope ="row">{{ $no }} </th>
            <td>{{ $data->nama_korban }}</td>
            <td>{{ $data->alamat_korban }}</td>
            <td>{{ $data->notlp_korban }}</td>
            <td>{{ $data->pembuat_pengaduan }}</td>
            <td>{{ $data->nama_pelaku }}</td>
            <td>{{ $data->bukti }}</td>
            <td>{{ $data->bantuan }}</td>
            <td>
               <button wire:click="findPengaduanById({{ $data->id}})" class = "btn btn-sm btn-info text-white">Detail</button>
               <button class = "btn btn-sm btn-danger text-white">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
