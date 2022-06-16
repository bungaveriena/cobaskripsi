<form>
    <div class="form-group">
        <input type="hidden" wire:model="pendamping_id">
        <label for="exampleFormControlInput1">Nama Pendamping</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Nama Pendamping" wire:model="nama_pendamping">
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Pendidikan</label>
        <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Enter Pendidikan Pendamping" wire:model="pendidikan" >
        @error('pendidikan') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Email</label>
        <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Enter Email Pendamping" wire:model="email" >
        @error('email') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Nomor Telepon</label>
        <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Enter Nomor Telepon Pendamping" wire:model="no_tlp" >
        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
</form>