<div>
    <a href="{{ route('summary.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nama Pengaju</th>
                <th scope="col">Nama Pelaku</th>
                <th scope="col">Summary</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($summaries as $summary)
            <tr>
                <td>{{ $summary->nama_pengaju }}</td>
                <td>{{ $summary->nama_pelaku }}</td>
                <td>{{ $summary->summary }}</td>
                <td class="text-center">
                    <a href="{{ route('summary.edit', $summary->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                    <button wire:click="destroy({{ $summary->id }})" class="btn btn-sm btn-danger">DELETE</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $summaries->links() }}
</div>