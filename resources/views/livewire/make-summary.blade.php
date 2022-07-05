<div>
<form wire:submit.prevent="saveSummary"
    @endif>
        <div class="form-group">
            <div class="form-row">
                <input type="hidden" name="" wire:model="pengajuanId">
                <div class="col">
                    <input  wire:model= "nama_pengaju" type="text" class="form-control @error('nama_pengaju') is-invalid @enderror"  placeholder="Nama Pengaju">
                    @error('nama_pengaju')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <input  wire:model= "email_pengaju" type="text" class="form-control @error('email_pengaju') is-invalid @enderror"  placeholder="Email Pengaju">
                    @error('email_pengaju')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <input  wire:model= "nama_diajukan" type="text" class="form-control @error('nama_diajukan') is-invalid @enderror"  placeholder="Nama Pelaku">
                    @error('nama_diajukan')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <input  wire:model= "summary" type="text" class="form-control @error('summary') is-invalid @enderror"  placeholder="Summary">
                    @error('summary')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <input  wire:model= "created_by" type="text" class="form-control @error('created_by') is-invalid @enderror"  placeholder="Oleh">
                    @error('created_by')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-sm btn-primary">"Submit Data"</button>
    </form>
</div>
