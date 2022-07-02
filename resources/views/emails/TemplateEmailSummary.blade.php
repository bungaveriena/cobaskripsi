<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Summary</title>
    </head>
    <body>
        <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Hi {{$nama_pengaju}}</h5>
            <p class="card-text">Berikut adalah informasi yang dapat kami berikan dari form pengajuan yang telah kamu isi.</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Nama : {{ $nama_pelaku}}</li>
        </ul>
        <div class="card-body">
            <p class="card-text">{{ $summary }}</p>
        </div>
        </div>
    </body>
</html>