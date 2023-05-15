<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Pengujian Berat Isi Halus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <h4 class="text-center">LAPORAN SEMENTARA <br> PEMERIKSAAN BERAT ISI AGREGAT HALUS/PASIR </h4>
            <table class="table table-bordered" border="1">
                <tr>
                    <td colspan="4"><b>Benda Uji :</b></td>
                </tr>
                <tr>
                    <td>a. Pasir Asal</td>
                    <td>:</td>
                    <td colspan="2">{{ $data->pasir_asal }}</td>
                </tr>
                <tr>
                    <td>b. Diameter Maksimum</td>
                    <td>:</td>
                    <td colspan="2">{{ $data->diameter_maksimum }} mm</td>
                </tr>
                <tr>
                    <td>c. Keadaan Pasir</td>
                    <td>:</td>
                    <td colspan="2">{{ $data->keadaan_pasir }}</td>
                </tr>
                
                <tr>
                    <td colspan="4"><b>Hasil Pengujian :</b></td>
                </tr>
                <tr>
                    <td>a. Berat Bejana (B1)</td>
                    <td>:</td>
                    <td>{{ $data->b1 }} kg</td>
                </tr>
                <tr>
                    <td>b. Berat Pasir + Bejana (B2)</td>
                    <td>:</td>
                    <td>{{ $data->b2 }} kg</td>
                </tr>
                <tr>
                    <td>c. Ukuran Bejana <br> - diameter bagian dalam <br> - tinggi bagian dalam</td>
                    <td><br> : <br> :</td>
                    <td><br>{{ $data->diameter_dalam }} <br> {{ $data->tinggi_bejana_dalam }}</td>
                </tr>
                <tr>
                    <td colspan="4"><b>Kesimpulan : </b></td>
                </tr>
                <tr>
                    <td>a. Berat Pasir <br> B3 = B2 - B1</td>
                    <td> <br> :</td>
                    <td><br> {{ $data->berat_pasir }} kg</td>
                </tr>
                <tr>
                    <td>b. Berat Satuan Pasir <br> B3 / (Volume Bejana = 1/4*ᴫ*D<sup>2</sup>*t) </td>
                    <td><br>:</td>
                    <td><br>{{ round($data->berat_satuan_pasir,6) * 1000 }} x 10 <sup>-3</sup> kg/cm<sup>3</sup> </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>