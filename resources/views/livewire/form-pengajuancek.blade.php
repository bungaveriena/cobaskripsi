<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message')}}
        </div>
    @endif
    <form wire:submit.prevent="savePengajuan">
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
        <button type="submit" class="btn btn-sm btn-primary">Submit Data</button>
    </form>
</div>
