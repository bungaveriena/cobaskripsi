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
            text-align: left;
            height: 30px;
        }
        td.top { vertical-align: text-top; }
        td.bottom { vertical-align: text-bottom; }
        td.middle { vertical-align: middle; }


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
                <h3 style="color: #F99421; margin-top: -2px;">Hi {{$nama_pengaju}}</h5>
                <p>Berikut adalah informasi yang dapat kami berikan dari form pengajuan yang telah kamu isi.s</p>
            </div>
            <div class="frame1-content">
               <div class="square-round">
                    <table style="width: 100%">
                       <tr>
                            <td colspan="2">
                                <h3 class= "grey-border">Hasil Pengecekan</h3>
                            </td>
                        </tr>
                        <tr>
                            <th>Nama Yang Diajukan:</th>
                            <td>{{ $nama_diajukan}}</td>
                        </tr>
                        <tr>
                            <th>Summary:</th>
                            <td>{{ $summary}}</td>
                        </tr>
                    </table>


                </div>
                <p>Mohon untuk bertanggung jawab atas informasi yang telah diberikan. Terima kasih.</p>
                <br>
                <p>Salam.</p>
            </div>
        </div>

    </body>
</html>