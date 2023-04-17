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
                    <td>a. Kerikil Asal</td>
                    <td>:</td>
                    <td>{{ $data->kerikil_asal }}</td>
                </tr>
               
                <tr>
                    <td><b>Hasil Pengujian :</b></td>
                </tr>
                <tr>
                    <td>a. Berat Kerikil SSD</td>
                    <td>:</td>
                    <td>{{ $data->berat_kerikil_ssd }} gr</td>
                    <td>(A)</td>
                </tr>
                <tr>
                    <td>b. Berat Kerikil di dalam air</td>
                    <td>:</td>
                    <td>{{ $data->berat_kerikil_air }} gr</td>
                    <td>(B)</td>
                </tr>
                <tr>
                    <td>c. Berat Kerikil kering tungku</td>
                    <td>: </td>
                    <td>{{ $data->berat_kerikil_kering_tungku }} gr</td>
                    <td>(C)</td>
                </tr>
               
                <tr>
                    <td><b>Perhitungan : </b></td>
                </tr>
                <tr>
                    <td>a. Berat Jenis Mutlak</td>
                    <td>C/(C-B)</td>
                    <td>=</td>
                    <td>{{ $data->berat_kerikil_kering_tungku }} / {{ $data->berat_kerikil_kering_tungku }} - {{ $data->berat_kerikil_air }} = </td>
                    <td>{{ number_format($data->berat_jenis_mutlak,2) }}</td>
                </tr>
                <tr>
                    <td>b. Berat Jenis Kering Tungku</td>
                    <td>C/(A-B)</td>
                    <td>=</td>
                    <td>{{ $data->berat_kerikil_kering_tungku }} / {{ $data->berat_kerikil_ssd }} - {{ $data->berat_kerikil_air }} =</td>
                    <td>{{  number_format($data->berat_jenis_kering_tungku,2) }} </td>
                </tr>
                <tr>
                    <td>c. Berat Jenis SSD</td>
                    <td>A/(A-B)</td>
                    <td>=</td>
                    <td>{{ $data->berat_kerikil_ssd }} / {{ $data->berat_kerikil_ssd }} - {{ $data->berat_kerikil_air }} =</td>
                    <td>{{  number_format($data->berat_jenis_ssd,2) }} </td>
                </tr>
                <tr>
                    <td>d. Persentase penyerapan <br> (absorption)</td>
                    <td>A-C/C x 100</td>
                    <td>=</td>
                    <td>{{ $data->berat_kerikil_ssd }} - {{ $data->berat_kerikil_kering_tungku }} / {{ $data->berat_kerikil_kering_tungku }} x 100% =</td>
                    <td>{{  round($data->presentase_penyerapan,2) }} %</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>