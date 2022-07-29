@extends('layouts.adminlte')

@section('content')
<section class="content">
<div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('datapendamping.update', $datapendamping->id) }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('nama_pendamping') is-invalid @enderror" name="nama_pendamping" value="{{ old('nama_pendamping', $datapendamping->nama_pendamping) }}" placeholder="Masukkan Nama">
                            
                                <!-- error message untuk email -->
                                @error('nama_pendamping')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $datapendamping->email) }}" placeholder="Masukkan Email">
                            
                                <!-- error message untuk email -->
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="font-weight-bold">Nomor Telepon</label>
                                <input type="text" class="form-control @error('no_tlp') is-invalid @enderror" name="no_tlp" value="{{ old('no_tlp', $datapendamping->no_tlp) }}" placeholder="Masukkan Nomor Telepon">
                            
                                <!-- error message untuk no_tlp -->
                                @error('no_tlp')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Pendidikan</label>
                                <input type="text" class="form-control @error('pendidikan') is-invalid @enderror" name="pendidikan" value="{{ old('pendidikan', $datapendamping->pendidikan) }}" placeholder="Masukkan Pendidikan">
                            
                                <!-- error message untuk pendidikan -->
                                @error('pendidikan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Asal Instansi</label>
                                <input type="text" class="form-control @error('asal_instansi') is-invalid @enderror" name="asal_instansi" value="{{ old('asal_instansi', $datapendamping->asal_instansi) }}" placeholder="Masukkan Asal Instansi">
                            
                                <!-- error message untuk asal_instansi -->
                                @error('asal_instansi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
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
</section>
@endsection