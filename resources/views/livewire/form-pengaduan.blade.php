<div>
@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message')}}
    </div>
@endif

<form wire:submit.prevent="savePengaduan">
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
    <button type="submit" class="btn btn-sm btn-primary">Submit Data</button>
</form>
</div>
