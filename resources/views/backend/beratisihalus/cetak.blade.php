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
            <h4 class="text-center">LAPORAN SEMENTARA <br> PEMERIKSAAN BERAT SATUAN AGREGAT HALUS/PASIR </h4>
            <table>
                <tr>
                    <td>Benda Uji :</td>
                </tr>
                <tr>
                    <td>a. Pasir Asal</td>
                    <td>:</td>
                    <td>{{ $data->pasir_asal }}</td>
                </tr>
                <tr>
                    <td>b. Diameter Maksimum</td>
                    <td>:</td>
                    <td>{{ $data->diameter_maksimum }} mm</td>
                </tr>
                <tr>
                    <td>c. Keadaan Pasir</td>
                    <td>:</td>
                    <td>{{ $data->keadaan_pasir }}</td>
                </tr>
                
                <tr>
                    <td>Hasil Pengujian :</td>
                </tr>
                <tr>
                    <td>a. Berat Bejana</td>
                    <td>(B1)</td>
                    <td>:</td>
                    <td>{{ $data->b1 }} kg</td>
                </tr>
                <tr>
                    <td>b. Berat Pasir + Bejana</td>
                    <td>(B2)</td>
                    <td>:</td>
                    <td>{{ $data->b2 }} kg</td>
                </tr>
                <tr>
                    <td>c. Ukuran Bejana</td>
                    <td>: diameter bagian dalam</td>
                    <td>:</td>
                    <td>{{ $data->diameter_dalam }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>: tinggi bagian dalam</td>
                    <td>:</td>
                    <td>{{ $data->tinggi_bejana_dalam }}</td>
                </tr>

                <tr>
                    <td>Kesimpulan : </td>
                </tr>
                <tr>
                    <td>a. Berat Pasir</td>
                    <td>: B3 = B2 - B1</td>
                    <td>:</td>
                    <td>{{ $data->berat_pasir }} kg</td>
                </tr>
                <tr>
                    <td>b. Berat Satuan Pasir</td>
                    <td>: B3 / (Volume Bejana = 1/4*ᴫ*D<sup>2</sup>*t)</td>
                    <td>:</td>
                    <td>{{ round($data->berat_satuan_pasir,6) * 1000 }} x 10 <sup>-3</sup> kg/cm<sup>3</sup> </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>