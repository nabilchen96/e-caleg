<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Pengujian Berat Isi Kasar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <h4 class="text-center">LAPORAN SEMENTARA <br> PEMERIKSAAN BERAT JENIS AGREGAT KASAR/KERIKIL </h4>
            <table>
                <tr>
                    <td>Benda Uji :</td>
                </tr>
                <tr>
                    <td>a. Pasir Asal</td>
                    <td>:</td>
                    <td>{{ $data->kerikil_asal }}</td>
                </tr>
               
                <tr>
                    <td><b>Hasil Pengujian :</b></td>
                </tr>
                <tr>
                    <td>a. Berat Pasir yang diperiksa</td>
                    <td>:</td>
                    <td>{{ $data->berat_kerikil_ssd }} gr</td>
                    <td>(A)</td>
                </tr>
       
                <tr>
                    <td><b>Hasil Pengujian : </b></td>
                </tr>
               
            </table>
            <table class="table table-bordered">
                <tr>
                    <th rowspan="2">Lubang Ayakan (mm)</th>
                    <th colspan="2">Berat Tertinggal</th>
                    <th rowspan="2">Berat Kumulatif <br> (%)</th>
                    <th rowspan="2">Berat Kumulatif Lewat Ayakan <br> (%) </th>
                </tr>
                <tr>
                    <th>(gr)</th>
                    <th>(%)</th>
                </tr>
                <tr>
                    <td>4.75</td>
                    <td>{{ $data->inputa_1 == 0 ? '-' : $data->inputa_1 }}</td>
                </tr>
                <tr>
                    <td>2.36</td>
                    <td>{{ $data->inputa_2 == 0 ? '-' : $data->inputa_2 }}</td>
                </tr>
                <tr>
                    <td>1.18</td>
                    <td>{{ $data->inputa_3 == 0 ? '-' : $data->inputa_3 }}</td>
                </tr>
                <tr>
                    <td>0.60</td>
                    <td>{{ $data->inputa_4 == 0 ? '-' : $data->inputa_4 }}</td>
                </tr>
                <tr>
                    <td>0.30</td>
                    <td>{{ $data->inputa_5 == 0 ? '-' : $data->inputa_5 }}</td>
                </tr>
                <tr>
                    <td>0.15</td>
                    <td>{{ $data->inputa_6 == 0 ? '-' : $data->inputa_6 }}</td>
                </tr>
                <tr>
                    <td>Sisa</td>
                    <td>{{ $data->sisa_inputa == 0 ? '-' : $data->sisa_inputa }}</td>
                </tr>
                <tr>
                    <td>Jumlah</td>
                    <td>{{ $data->jumlah_inputa == 0 ? '-' : $data->jumlah_inputa }}</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>