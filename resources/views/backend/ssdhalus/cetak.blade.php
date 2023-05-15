<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Pengujian SSD Halus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <h4 class="text-center">LAPORAN SEMENTARA <br> PEMERIKSAAN SSD HALUS </h4>
            <table class="table table-bordered">
                <tr>
                    <td colspan="3"><b>Benda Uji :</b></td>
                </tr>
                <tr>
                    <td>a. Pasir Asal</td>
                    <td>:</td>
                    <td>{{ $data->pasir_asal }}</td>
                </tr>
               
                <tr>
                    <td colspan="4"><b>Hasil Pengujian :</b></td>
                </tr>
                <tr>
                    <td>a. Berat pasir + tabung ukur + air (A)</td>
                    <td>:</td>
                    <td>{{ $data->berat_pasir_tabung_air }} gr</td>
                </tr>
                <tr>
                    <td>b. Berat pasir SSD (B)</td>
                    <td>:</td>
                    <td>{{ $data->berat_pasir_ssd }} gr</td>
                </tr>
                <tr>
                    <td>c. Berat tabung ukur + air (C)</td>
                    <td>: </td>
                    <td>{{ $data->berat_tabung_air }} gr</td>
                </tr>
                <tr>
                    <td>d. Berat pasir kering tungku (D)</td>
                    <td>: </td>
                    <td>{{ $data->berat_pasir_kering_tungku }} gr</td>
                </tr>
               
                <tr>
                    <td colspan="4"><b>Kesimpulan : </b></td>
                </tr>
                <tr>
                    <td>a. Berat Jenis Tungku <br>- D/((C+B)-A)</td>
                    <td><br> :</td>
                    <td><br> {{ number_format($data->berat_jenis_tungku,2) }}</td>
                </tr>
                <tr>
                    <td>b. SSD Pasir kering tungku <br>- B/((C+B)-A)</td>
                    <td><br>:</td>
                    <td><br>{{  number_format($data->ssd_pasir_kering_tungku,2) }} </td>
                </tr>
                <tr>
                    <td colspan="3">b. Menurut berat jenis dan SSD pasir, benda uji <b>{{ $data->kesimpulan }}</b> syarat, untuk berat jenis pasir SSD yang baik adalah 2,4 - 2,9</td>
                </tr>
                
            </table>
        </div>
    </div>
</body>
</html>