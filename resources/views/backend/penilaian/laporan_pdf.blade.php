<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Pembukuan Jurnal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        body {
            font-size: 8;
        }
    </style>
</head>

<body>
    <h3>{{ DB::table('gruppenilaians')->where('status', 'Aktif')->value('nama_grup') }}</h3>
    <br>
    <table class="table table-striped" width="100%">
        <thead class="table-bordered table-dark" style="border-color: #c3c5c8 !important;">
            <tr>
                <th width="5%" rowspan="2" style="vertical-align: middle;">No</th>
                <th rowspan="2" style="vertical-align: middle;">Nama</th>
                <th style="border-bottom: 2px solid #454d55;">Samapta A</th>
                <th colspan="3" style="border-bottom: 2px solid #454d55; text-align: center;">Samapta B</th>
                <th style="border-bottom: 1px solid #454d55; vertical-align: middle;">Nilai Akhir</th>
            </tr>
            <tr>
                <th>Lari</th>
                <th>Push Up</th>
                <th>Sit Up</th>
                <th>Shuttle Run</th>
                <th>S = (A + B) / 2</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $k => $item)
                <tr>
                    <td>{{ $k+1 }}</td>
                    <td>
                        {{ $item->name }} <br>
                        <b>No Reg / NIT: </b> {{ $item->no_reg }} <br>
                        <b>JK: </b> {{ $item->jk }}
                    </td>
                    <td>
                        <b>Nilai: </b> {{ $item->nilai_lari }} <br>
                        <b>Jarak: </b> {{ $item->jarak_lari }} meter
                    </td>
                    <td>
                        <b>Nilai: </b> {{ $item->nilai_push_up }} <br>
                        <b>Jumlah: </b> {{ $item->jumlah_push_up }}
                    </td>
                    <td>
                        <b>Nilai: </b> {{ $item->nilai_sit_up }} <br>
                        <b>Jumlah: </b> {{ $item->jumlah_sit_up }}
                    </td>
                    <td>
                        <b>Nilai: </b> {{ $item->nilai_shuttle_run }} <br>
                        <b>Jumlah: </b> {{ $item->jumlah_shuttle_run }} detik
                    </td>
                    <td>
                        @php
                            $samaptaA = $item->nilai_lari * 70 / 100;
                            $samaptaB = (($item->nilai_push_up + $item->nilai_sit_up + $item->nilai_shuttle_run)/3)*30/100;
                        @endphp

                        {{ round($samaptaA + $samaptaB) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
