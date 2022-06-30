<div>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message')}}
        </div>
    @endif

    <form  
    @if($isEdit)
        wire:submit.prevent="updateSummary"
    @else
        wire:submit.prevent="saveSummary"
    @endif>
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <input  wire:model= "nama_pengaju" type="text" class="form-control @error('nama_pengaju') is-invalid @enderror"  placeholder="Nama Pengaju">
                    @error('nama_pengaju')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <input  wire:model= "nama_pelaku" type="text" class="form-control @error('nama_pelaku') is-invalid @enderror"  placeholder="Nama Pelaku">
                    @error('nama_pelaku')
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
                <th scope="col">Nama Pengaju</th>
                <th scope="col">Nama Pelaku</th>
                <th scope="col">Summary</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach($summaries as $summary)
            <?php $no++; ?>
            <tr>
                <th scope ="row">{{ $no }} </th>
                <td>{{ $summary->nama_pengaju }}</td>
                <td>{{ $summary->nama_pelaku }}</td>
                <td>{{ $summary->summary }}</td>
                <td>
                   <button wire:click="findSummaryById({{ $summary->id}})" class = "btn btn-sm btn-info text-white">Edit</button>
                   <button wire:click="deleteSummary({{$summary->id}})" class = "btn btn-sm btn-danger text-white">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $summaries->links() }}
</div>
