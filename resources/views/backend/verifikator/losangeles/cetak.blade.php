<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Pengujian Los Angeles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <h4 class="text-center">LAPORAN SEMENTARA <br> PEMERIKSAAN KEAUSAN AGREGAT KASAR LOS ANGELES </h4>
            <table class="table table-bordered" border="1">
                <tr>
                    <td colspan="4"><b>Benda Uji :</b></td>
                </tr>
                <tr>
                    <td>a. Pasir Asal</td>
                    <td>:</td>
                    <td colspan="2">{{ $data->kerikil_asal }}</td>
                </tr>
                <tr>
                    <td>b. Gradasi</td>
                    <td>:</td>
                    <td colspan="2">{{ $data->gradasi }} </td>
                </tr>
            </table>
            <h6><b>Hasil Pengujian : </b></h6>
            <table class="table table-bordered">
                <tr>
                    <th colspan="2">Lubang Ayakan (mm)</th>
                    <th colspan="3">Berat Benda Uji (gr)</th>
                </tr>
                <tr>
                    <th>Lewat</th>
                    <th>Tetinggal</th>
                    <th>Gradasi A</th>
                    <th>Gradasi B</th>
                    <th>Gradasi C</th>
                </tr>
                <tr>
                    <td>38,10</td>
                    <td>25,40</td>
                    <td>1.250</td>
                    <td>----------</td>
                    <td>----------</td>
                </tr>
                <tr>
                    <td>25,40</td>
                    <td>19,05</td>
                    <td>1.250</td>
                    <td>----------</td>
                    <td>----------</td>
                </tr>
                <tr>
                    <td>25,40</td>
                    <td>19,05</td>
                    <td>1.250</td>
                    <td>----------</td>
                    <td>----------</td>
                </tr>
                <tr>
                    <td>12,70</td>
                    <td>9,51</td>
                    <td>1.250</td>
                    <td>20.000</td>
                    <td>----------</td>
                </tr>
                <tr>
                    <td>9,51</td>
                    <td>6,35</td>
                    <td>----------</td>
                    <td>----------</td>
                    <td>2.500</td>
                </tr>
                <tr>
                    <td>6,35</td>
                    <td>4,75</td>
                    <td>----------</td>
                    <td>----------</td>
                    <td>2.500</td>
                </tr>
            </table>
            <h6><b>Hasil Pengujian : </b></h6>
            <table>
                <tr>
                    <td>a. Berat benda uji (A)</td>
                    <td>:</td>
                    <td>{{ $data->berat_benda_uji }} gr</td>
                </tr>
                <tr>
                    <td>b. Berat benda uji sesudah diuji pertama (B)</td>
                    <td>:</td>
                    <td>{{ $data->berat_benda_uji_sesudah_pertama }} gr</td>
                </tr>
                <tr>
                    <td>c. Berat benda uji sesudah diuji kedua (B)</td>
                    <td>:</td>
                    <td>{{ $data->berat_benda_uji_sesudah_kedua }} gr</td>
                </tr>
            </table>
            <p>1) Keausan I = A-B/A x 100%  = {{ $data->berat_benda_uji }} - {{ $data->berat_benda_uji_sesudah_pertama }} / {{ $data->berat_benda_uji }} x 100% = {{ $data->keausan_1 }} % </p>
            <p>2) Keausan II = A-C/A x 100%  = {{ $data->berat_benda_uji }} - {{ $data->berat_benda_uji_sesudah_kedua }} / {{ $data->berat_benda_uji }} x 100% = {{ $data->keausan_2 }} % </p>
            <br>
            <p>Keausan Total = Keausan I + Keausan II = {{ $data->keausan_1 }} + {{ $data->keausan_2 }} = {{ $data->total_keausan }} % </p>
            <p>Menurut PUBI 1982 Tabel 25 - 2 batuan ini dapat untuk kelas = <b>Konstruksi Ringan/ Beton Kelas 1</b></p>
        </div>
    </div>
</body>

</html>