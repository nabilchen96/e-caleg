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
            <h4 class="text-center">LAPORAN SEMENTARA <br> PEMERIKSAAN GRADASI AGREGAT KASAR </h4>
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
                    <td>b. Berat Pasir yang diperiksa</td>
                    <td>:</td>
                    <td>{{ $data->berat_pasir }} gr</td>
                </tr>

                <tr>
                    <td>c. Ukuran Butir</td>
                    <td>:</td>
                    <td>{{ $data->ukuran_butir }} </td>
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
                    <td>38.00</td>
                    <td>{{ $data->inputa_1 == 0 ? '-' : $data->inputa_1 }}</td>
                    <td>{{ $data->berat_tinggal_inputa_1 == 0 ? '-' : $data->berat_tinggal_inputa_1 }}</td>
                    <td>{{ $data->berat_kumu_inputa_1 == 0 ? '-' : $data->berat_kumu_inputa_1 }}</td>
                    <td>{{ $data->berat_kumu_la_1 == 0 ? '-' : $data->berat_kumu_la_1 }}</td>
                </tr>
                <tr>
                    <td>25.00</td>
                    <td>{{ $data->inputa_2 == 0 ? '-' : $data->inputa_2 }}</td>
                    <td>{{ $data->berat_tinggal_inputa_2 == 0 ? '-' : $data->berat_tinggal_inputa_2 }}</td>
                    <td>{{ $data->berat_kumu_inputa_2 == 0 ? '-' : $data->berat_kumu_inputa_2 }}</td>
                    <td>{{ $data->berat_kumu_la_2 == 0 ? '-' : $data->berat_kumu_la_2 }}</td>
                </tr>
                <tr>
                    <td>19.00</td>
                    <td>{{ $data->inputa_3 == 0 ? '-' : $data->inputa_3 }}</td>
                    <td>{{ $data->berat_tinggal_inputa_3 == 0 ? '-' : $data->berat_tinggal_inputa_3 }}</td>
                    <td>{{ $data->berat_kumu_inputa_3 == 0 ? '-' : $data->berat_kumu_inputa_3 }}</td>
                    <td>{{ $data->berat_kumu_la_3 == 0 ? '-' : $data->berat_kumu_la_3 }}</td>
                </tr>
                <tr>
                    <td>12.50</td>
                    <td>{{ $data->inputa_4 == 0 ? '-' : $data->inputa_4 }}</td>
                    <td>{{ $data->berat_tinggal_inputa_4 == 0 ? '-' : $data->berat_tinggal_inputa_4 }}</td>
                    <td>{{ $data->berat_kumu_inputa_4 == 0 ? '-' : $data->berat_kumu_inputa_4 }}</td>
                    <td>{{ $data->berat_kumu_la_4 == 0 ? '-' : $data->berat_kumu_la_4 }}</td>
                </tr>
                <tr>
                    <td>9.50</td>
                    <td>{{ $data->inputa_5 == 0 ? '-' : $data->inputa_5 }}</td>
                    <td>{{ $data->berat_tinggal_inputa_5 == 0 ? '-' : $data->berat_tinggal_inputa_5 }}</td>
                    <td>{{ $data->berat_kumu_inputa_5 == 0 ? '-' : $data->berat_kumu_inputa_5 }}</td>
                    <td>{{ $data->berat_kumu_la_5 == 0 ? '-' : $data->berat_kumu_la_5 }}</td>
                </tr>
                <tr>
                    <td>6.35</td>
                    <td>{{ $data->inputa_6 == 0 ? '-' : $data->inputa_6 }}</td>
                    <td>{{ $data->berat_tinggal_inputa_6 == 0 ? '-' : $data->berat_tinggal_inputa_6 }}</td>
                    <td>{{ $data->berat_kumu_inputa_6 == 0 ? '-' : $data->berat_kumu_inputa_6 }}</td>
                    <td>{{ $data->berat_kumu_la_6 == 0 ? '-' : $data->berat_kumu_la_6 }}</td>
                </tr>
                <tr>
                    <td>4.76</td>
                    <td>{{ $data->inputa_7 == 0 ? '-' : $data->inputa_7 }}</td>
                    <td>{{ $data->berat_tinggal_inputa_7 == 0 ? '-' : $data->berat_tinggal_inputa_7 }}</td>
                    <td>{{ $data->berat_kumu_inputa_7 == 0 ? '-' : $data->berat_kumu_inputa_7 }}</td>
                    <td>{{ $data->berat_kumu_la_7 == 0 ? '-' : $data->berat_kumu_la_7 }}</td>
                </tr>
                <tr>
                    <td>2.38</td>
                    <td>{{ $data->inputa_8 == 0 ? '-' : $data->inputa_8 }}</td>
                    <td>{{ $data->berat_tinggal_inputa_8 == 0 ? '-' : $data->berat_tinggal_inputa_8 }}</td>
                    <td>{{ $data->berat_kumu_inputa_8 == 0 ? '-' : $data->berat_kumu_inputa_8 }}</td>
                    <td>{{ $data->berat_kumu_la_8 == 0 ? '-' : $data->berat_kumu_la_8 }}</td>
                </tr>
                <tr>
                    <td>1.18</td>
                    <td>{{ $data->inputa_9 == 0 ? '-' : $data->inputa_9 }}</td>
                    <td>{{ $data->berat_tinggal_inputa_9 == 0 ? '-' : $data->berat_tinggal_inputa_9 }}</td>
                    <td>{{ $data->berat_kumu_inputa_9 == 0 ? '-' : $data->berat_kumu_inputa_9 }}</td>
                    <td>{{ $data->berat_kumu_la_9 == 0 ? '-' : $data->berat_kumu_la_9 }}</td>
                </tr>
                <tr>
                    <td>Sisa</td>
                    <td>{{ $data->sisa_inputa == 0 ? '-' : $data->sisa_inputa }}</td>
                    <td>{{ $data->sisa_berat_tinggal_inputa == 0 ? '-' : $data->sisa_berat_tinggal_inputa }}</td>
                    <td>{{ $data->sisa_berat_kumu_inputa == 0 ? 'xxxxxxx' : $data->sisa_berat_kumu_inputa }}</td>
                    <td>{{ $data->sisa_berat_kumu_la == 0 ? 'xxxxxxx' : $data->sisa_berat_kumu_la }}</td>
                </tr>
                <tr>
                    <td>Jumlah</td>
                    <td>{{ $data->jumlah_inputa == 0 ? '-' : $data->jumlah_inputa }}</td>
                    <td>{{ $data->jumlah_berat_tinggal_inputa == 0 ? '-' : $data->jumlah_berat_tinggal_inputa }}</td>
                    <td>{{ $data->jumlah_berat_kumu_inputa == 0 ? '-' : $data->jumlah_berat_kumu_inputa }}</td>
                    <td>{{ $data->jumlah_berat_kumu_la == 0 ? '-' : $data->jumlah_berat_kumu_la }}</td>
                </tr>
            </table>
            <table>
                <tr>
                    <td><b>Kesimpulan :</b></td>
                </tr>
                <tr>
                    <td>a. Modulus Halus :  {{ number_format($data->modulus_halus,2) }}</td>
                </tr>
                <tr>
                    <td>b. Gradasi Kerikil masuk daerah (*) :  Area (Ukuran maks.40 mm)</td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>

                        <div id="container"></div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('container', {

            title: {
                text: 'GRADASI AGREGAT KASAR',
                // align: 'left'
            },

            yAxis: {
                title: {
                    text: 'Persen Butir Lewat Saringan'
                },
                min: 0, // batas bawah sumbu y
                max: 100 // batas atas sumbu y
            },

            xAxis: {
                title:{
                    text: 'Lubang Ayakan (mm)'
                },
                categories: [
                    1.18, 2.38, 4.76, 6.35, 9.50, 12.50, 19.00, 25.00, 38.00
                ]
            },

            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    // pointStart: 2010
                }
            },

            series: [
                {
                    name: 'Ukuran maks. 10 mm',
                    data: [0, 0, 0, 10, 50, 85, 100, 100, 100],
                    dashStyle: 'dash'
                },
                {
                    name: 'Ukuran maks. 10 mm',
                    data: [0, 0, 10, 50, 85, 100, 100, 100, 100],
                    dashStyle: 'dash'
                },
                {
                    name: 'Ukuran maks. 20 mm',
                    data: [0, 0, 0, 10, 30, 60, 95, 100, 100],
                    dashStyle: 'dash'
                },
                {
                    name: 'Ukuran maks. 20 mm',
                    data: [0, 0, 10, 30, 60, 95, 100, 100, 100],
                    dashStyle: 'dash'
                },
                {
                    name: 'Ukuran maks. 40 mm',
                    data: [0, 0, 0, 5, 10, 25, 35, 95, 100],
                    dashStyle: 'dash'
                },
                {
                    name: 'Ukuran maks. 40 mm',
                    data: [0, 0, 5, 10, 40, 52.5, 70, 100, 100],
                    dashStyle: 'dash'
                },
                {
                    name: 'Hasil Pengujian',
                    data: [
                        {{ $data->berat_kumu_la_9 == 0 ? '-' : $data->berat_kumu_la_9 }},
                        {{ $data->berat_kumu_la_8 == 0 ? '-' : $data->berat_kumu_la_8 }},
                        {{ $data->berat_kumu_la_7 == 0 ? '-' : $data->berat_kumu_la_7 }},
                        {{ $data->berat_kumu_la_6 == 0 ? '-' : $data->berat_kumu_la_6 }},
                        {{ $data->berat_kumu_la_5 == 0 ? '-' : $data->berat_kumu_la_5 }},
                        {{ $data->berat_kumu_la_4 == 0 ? '-' : $data->berat_kumu_la_4 }},
                        {{ $data->berat_kumu_la_3 == 0 ? '-' : $data->berat_kumu_la_3 }},
                        {{ $data->berat_kumu_la_2 == 0 ? '-' : $data->berat_kumu_la_2 }},
                        {{ $data->berat_kumu_la_1 == 0 ? '-' : $data->berat_kumu_la_1 }},

                    ],
                    lineWidth: 5,
                    color: '#CCCCCC',
                    marker: {
                        symbol: "square",
                        radius: 5
                    }
                },
            ],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });
    </script>
</body>
</html>