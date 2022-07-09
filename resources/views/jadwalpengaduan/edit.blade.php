<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buat Data Jadwal Konsultasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('datajadwalkonsul.update', $datajadwalkonsul->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Korban</label>
                                <input type="text" class="form-control @error('nama_korban') is-invalid @enderror" name="nama_korban" value = "{{ old('nama_korban', $datajadwalkonsul->nama_korban)}}" placeholder="Masukkan email pengaju">
                                @error('nama_korban')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Email Korban</label>
                                <input type="text" class="form-control @error('email_korban') is-invalid @enderror" name="email_korban" value="{{ old('email_korban', $datajadwalkonsul->email_korban) }}" placeholder="isi email_korban">
                                @error('email_korban')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="font-weight-bold">Pendamping</label>
                                <select class ="form-select" name="pendamping_id">
                                    <option selected> Pendamping </option>
                                    @foreach ($data_pendampings as $pendamping)
                                    <option value="{{$pendamping->id}}">{{$pendamping->nama_pendamping}}</option>
                                    @endforeach>
                                </select>
                                @error('nama_pendamping')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal', $datajadwalkonsul->tanggal) }}" placeholder="Masukkan tanggal pendampingan">
                                @error('tanggal')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Pukul</label>
                                <input type="time" class="form-control @error('pukul') is-invalid @enderror" name="pukul" value = "{{ old('pukul', $datajadwalkonsul->pukul)}}" placeholder="Masukkan email pengaju">
                                @error('pukul')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Keterangan</label>
                                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan', $datajadwalkonsul->keterangan) }}" placeholder="isi keterangan">
                                @error('keterangan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            

                            <button type="submit" class="btn btn-md btn-primary">Simpan dan Kirim datajadwalkonsul</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>
