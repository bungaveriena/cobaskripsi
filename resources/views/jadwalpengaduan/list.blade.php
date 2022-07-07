<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Pengaduan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <!-- <a href="{{ route('summary.create') }}" class="btn btn-md btn-success mb-3">Data Pengajuan</a> -->
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
                                    <td>
                                        <!-- <a href="public/buktipengaduan/{{ $data->bukti  }}"><button class="btn btn-success" type="button">View</button> -->
                                        <!-- <a href="public/buktipengaduan/{{$data->bukti}}" download="{{$data->bukti}}"><button class="btn btn-success" type="button">View</button> -->
                                        <a href="Storage::url($data->bukti);" download="{{$data->bukti}}"><button class="btn btn-success" type="button">View</button>
                                    </td>
                                    <td>{{ $data->bantuan }}</td>
                                    <td>
                                    <a href="{{ route('datajadwalkonsul.edit', $data->id) }}" class="btn btn-sm btn-primary">buat jadwal</a>
                                    <button class = "btn btn-sm btn-danger text-white">Delete</button>
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

</body>
</html>