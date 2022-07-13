@extends('layouts.adminlte')

@section('content')
<section class="content">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('summary.update', $summary->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Nama yang diajukan</label>
                                <input type="text" class="form-control @error('nama_diajukan') is-invalid @enderror" name="nama_diajukan" value = "{{ old('nama_diajukan', $summary->nama_diajukan)}}" placeholder="Masukkan email pengaju">
                                @error('nama_diajukan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Summary</label>
                                <input type="text" class="form-control @error('summary') is-invalid @enderror" name="summary" value="{{ old('summary', $summary->summary) }}" placeholder="isi summary">
                                @error('summary')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="font-weight-bold">Oleh</label>
                                <input type="text" class="form-control @error('created_by') is-invalid @enderror" name="created_by" value="{{ old('created_by', $summary->created_by) }}" placeholder="Summary ditulis oleh">
                                @error('created_by')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Pengaju</label>
                                <input type="text" class="form-control @error('nama_pengaju') is-invalid @enderror" name="nama_pengaju" value="{{ old('nama_pengaju', $summary->nama_pengaju) }}" placeholder="Masukkan nama pengaju">
                                @error('nama_pengaju')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Email Pengaju</label>
                                <input type="text" class="form-control @error('email_pengaju') is-invalid @enderror" name="email_pengaju" value = "{{ old('email_pengaju', $summary->email_pengaju)}}" placeholder="Masukkan email pengaju">
                                @error('email_pengaju')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
