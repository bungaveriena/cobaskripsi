<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Jadwal Konsultasi</title>
        <style>
        body {
            background-color: rgb(230, 225, 225);
            font-family: Roboto, sans-serif;
        }
        h3 {
            color: #F99421;
            font-size: 17px;
        }
        th {
            height: 30px;
        }
        .table-border {
            border: 1px solid black;
        }
        .table-padding {
            padding-left: 15px;
            padding-right: 15px;
        }
        .square-round {
            border-style: solid;
            border-width: 1px;
            border-color: darkgray;
            border-radius: 15px;
            padding: 15px;
            margin-top: 15px;
            margin-bottom: 15px;
        }
        .frame1 {
            background-color: white;
        }
        .frame1-content {
            padding: 15px;
        }
        div.header {
            text-align: center;
            border-bottom: rgb(230, 225, 225) 10px solid;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .grey-border {
            border-bottom: rgb(230, 225, 225) 1px solid;
        }
    </style>
    </head>
    <body>
        <div class="frame1">
            <div class="header">
                <h5 style="color: #F99421; margin-top: -2px;">Hi {{$nama_korban}}</h5>
                <p>Kami sudah menerima form pengaduanmu. Berikut adalah jadwal konsultasi pendampingan untuk kamu.</p>
            </div>
            <div class="frame1-content">
                <div class="square-round">
                    <table style="width: 100%">
                        <tr>
                            <td colspan="2">
                                <h3 class= "grey-border">Jadwal Pendamping</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nama :
                            </td>
                        </tr>
                        <tr>
                            <td>
                            {{ $nama_korban}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tanggal :
                            </td>
                        </tr>
                        <tr>
                            <td>
                            {{ $tanggal}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Pukul :
                            </td>
                        </tr>
                        <tr>
                            <td>
                            {{ $pukul}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Keterangan :
                            </td>
                        </tr>
                        <tr>
                            <td>
                            {{ $keterangan}}
                            </td>
                        </tr>
                    </table>
                </div>
                <p>Mohon untuk hadir tepat waktu. Terima kasih.</p>
                <br>
                <p>Salam.</p>
            </div>
        </div>
    </body>
</html>