@extends('layouts.adminlte')

@section('content')
<section class="content">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="/user">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="cari nama user" name="search">
                        <button class="btn btn-md btn-warning" type="submit">cari</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email </th>
                                    <th scope="col">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach($users as $user)
                                <?php $no++; ?>
                                <tr>
                                    <th scope ="row">{{ $no }} </th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->role }}</td>
                                    <td>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('user.destroy', $user->id) }}" method="POST">
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
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