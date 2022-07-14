@extends('layouts.adminlte')

@section('content')
<section class="content">

    <div class="container mt-5">
    <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="/datapendamping">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="cari nama pendamping" name="search">
                            <button class="btn btn-md btn-warning" type="submit">cari</button>
                        </div>
                    </form>
                </div>
            </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                    <a href="{{ route('datapendamping.create') }}" class="btn btn-md btn-success mb-3">TAMBAH DATA PENDAMPING</a>
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email </th>
                                    <th scope="col">Nomor Telepom </th>
                                    <th scope="col">Pendidikan</th>
                                    <th scope="col">Asal Instansi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach($data_pendampings as $data)
                                <?php $no++; ?>
                                <tr>
                                    <th scope ="row">{{ $no }} </th>
                                    <td>{{ $data->nama_pendamping }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->no_tlp }}</td>
                                    <td>{{ $data->pendidikan }}</td>
                                    <td>{{ $data->asal_instansi }}</td>
                                    <td>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('datapendamping.destroy', $data->id) }}" method="POST">
                                            <a href="{{ route('datapendamping.edit', $data->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $data_pendampings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</section>
@endsection