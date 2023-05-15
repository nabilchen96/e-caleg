<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Pengujian Kadar Lumpur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <h4 class="text-center">LAPORAN SEMENTARA <br> PEMERIKSAAN KADAR LUMPUR </h4>
            <table class="table table-bordered" border="1">
                <tr>
                    <td colspan="3"><b>Benda Uji :</b></td>
                </tr>
                <tr>
                    <td>a. Pasir Asal</td>
                    <td>:</td>
                    <td >{{ $data->pasir_asal }}</td>
                </tr>
               
                <tr>
                    <td colspan="3"><b>Hasil Pengujian :</b></td>
                </tr>
                <tr>
                    <td>a. Berat Pasir sebelum dicuci/dimasukan ke oven</td>
                    <td>:</td>
                    <td>{{ $data->berat_pasir_1 }} gram</td>
                </tr>
                <tr>
                    <td>b. Berat Pasir setelah dicuci/dimasukan ke oven</td>
                    <td>:</td>
                    <td>{{ $data->berat_pasir_2 }} gram</td>
                </tr>

                <tr>
                    <td colspan="3"><b>Perhitungan kadar Lumpur : </b></td>
                </tr>
                <tr>
                    <td>Kadar Lumpur ((a-b)/a x 100%) <br> ({{ $data->berat_pasir_1 }}-{{ $data->berat_pasir_2 }})/{{ $data->berat_pasir_1 }} x 100% </td>
                    <td><br>:</td>
                    <td><br>{{ $data->hasil_kadar_lumpur }} %</td>
                </tr>
                <tr>
                    <td colspan="3"><b>Kesimpulan : </b></td>
                </tr>
                <tr>
                    <td colspan="3">Kadar lumpur pasir normal yang diijinkan SK SNI S-04-1989-F maksimal 5 %. dari hasil pengujian didapat bahwa kadar lumpur terkandung telah <b>{{ $data->kesimpulan }}</b></td>
                    
                </tr>
            </table>
        </div>
    </div>
</body>
</html>