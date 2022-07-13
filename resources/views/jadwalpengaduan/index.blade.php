@extends('layouts.adminlte')

@section('content')
<section class="content">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Korban</th>
                                    <th scope="col">Email Korban</th>
                                    <th scope="col">Pendamping</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Waktu</th>
                                    <th scope="col">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach($jadwal_konsuls as $jadwal)
                                <?php $no++; ?>
                                <tr>
                                    <th scope ="row">{{ $no }} </th>
                                    <td>{{ $jadwal->pengaduan->nama_korban }}</td>
                                    <td>{{ $jadwal->pengaduan->email_korban}}</td>
                                    <td>{{ $jadwal->pendamping->nama_pendamping }}</td>
                                    <td>{{ $jadwal->tanggal }}</td>
                                    <td>{{ $jadwal->pukul }}</td>
                                    <td>{{ $jadwal->keterangan }}</td>
                                    <td>
                                    
                                    <!-- <button type="submit" class = "btn btn-sm btn-warning text-white">Kirim Email</button>
                                    </td> -->
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