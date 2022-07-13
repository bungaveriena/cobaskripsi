@extends('layouts.adminlte')

@section('content')
<section class="content">>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="" class="btn btn-md btn-success mb-3">Data Pengajuan</a>
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
                                    <td>{{ $data->email_pengaju }}</td>
                                    <td>{{ $data->asal_instansi }}</td>
                                    <td>{{ $data->nama_diajukan }}</td>
                                    <td>{{ $data->relasi }}</td>
                                    <td>{{ $data->keperluan }}</td>
                                    <td>
                                    <a href="{{ route('summary.edit', $data->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                    <!-- <buttontype="submit" class = "btn btn-sm btn-danger text-white">Delete</button> -->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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