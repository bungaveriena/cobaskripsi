@extends('layouts.adminlte')

@section('content')
<section class="content">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="/pelaku">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="cari nama pelaku" name="search">
                        <button class="btn btn-md btn-warning" type="submit">cari</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                    <a href="/map" class="btn btn-md btn-success mb-3">Map</a>
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat </th>
                                    <th scope="col">Keterangan </th>
                                    <!-- <th scope="col">Image</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach($locations as $data)
                                <?php $no++; ?>
                                <tr>
                                    <th scope ="row">{{ $no }} </th>
                                    <td>{{ $data->nama_pelaku }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>{{ $data->keterangan }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $locations->links() }}
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