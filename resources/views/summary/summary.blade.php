<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Summary</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('summary.create') }}" class="btn btn-md btn-success mb-3">Data Pengajuan</a>
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pengaju</th>
                                    <th scope="col">Email Pengaju</th>
                                    <th scope="col">Nama yang diajukan</th>
                                    <th scope="col">Isi Summary</th>
                                    <th scope="col">Penulis</th>
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
                                    <td>{{ $summary->email_pengaju }}</td>
                                    <td>{{ $summary->nama_diajukan }}</td>
                                    <td>{{ $summary->summary }}</td>
                                    <td>{{ $summary->created_by }}</td>
                                    <td>
                                    
                                    <button type="submit" class = "btn btn-sm btn-warning text-white">Kirim Email</button>
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