@extends('backend.app')
@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.2.2/css/fixedColumns.dataTables.min.css">
    <style>
        #myTable_filter input {
            height: 29.67px !important;
        }

        #myTable_length select {
            height: 29.67px !important;
        }

        .btn {
            border-radius: 50px !important;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #9e9e9e21 !important;
        }
    </style>
@endpush
@section('content')
    @php
        @$data_user = Auth::user();
    @endphp

    <div class="row" style="margin-top: -200px;">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Dashboard</h3>
                    <h6 class="font-weight-normal mb-0">Hi, {{ Auth::user()->name }}.
                        Welcome back to Aplikasi Absensi Online</h6>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-3">
                    <div class="card card-tale shadow mb-3">
                        <div class="card-body">
                            <h4 class="mb-4">Total Dapil</h4>
                            <h2 class="fs-30 mb-2">{{ $dapil }}</h2>
                            <span>
                                <a href="{{ url('halaman-dapil') }}" class="text-white">
                                    List Dapil <i class="bi bi-arrow-right"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-dark-blue shadow mb-3">
                        <div class="card-body">
                            <h4 class="mb-4">Total Kecamatan</h4>
                            <h2 class="fs-30 mb-2">{{ $kecamatan }}</h2>
                            <span>
                                <a href="{{ url('halaman-kecamatan') }}" class="text-white">
                                    List Kecamatan <i class="bi bi-arrow-right"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-light-blue shadow mb-3">
                        <div class="card-body">
                            <h4 class="mb-4">Total Kelurahan</h4>
                            <h2 class="fs-30 mb-2">{{ $kelurahan }}</h2>
                            <span>
                                <a href="{{ url('kelurahan') }}" class="text-white">
                                    List Kelurahan <i class="bi bi-arrow-right"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-light-danger shadow mb-3">
                        <div class="card-body">
                            <h4 class="mb-4">Total Partai</h4>
                            <h2 class="fs-30 mb-2">{{ $partai }}</h2>
                            <span>
                                <a href="{{ url('partai') }}" class="text-white">
                                    List Partai <i class="bi bi-arrow-right"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <select onchange="cariCalon()" name="id_calon" id="id_calon" class="mb-2 form-control">
                                <?php
                                $calon = DB::table('calons')
                                        ->join('partais', 'partais.id', '=', 'calons.id_partai')
                                        ->select(
                                            'calons.*',
                                            'partais.partai'
                                        )
                                        ->get();
                                ?>
                                @foreach ($calon as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_calon }} / {{ $item->partai }}</option>
                                @endforeach
                            </select>
                            <div id="grafikKecamatan"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <select onchange="cariDapil()" name="id_dapil" id="id_dapil" class="mb-2 form-control">
                                <?php
                                $dapil = DB::table('dapils')->get();
                                ?>
                                @foreach ($dapil as $item)
                                    <option value="{{ $item->id }}">{{ $item->dapil }} / {{ $item->kabupaten }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="grafikCalon"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            cariDapil()
            cariCalon()
        })

        function cariDapil() {
            var id_dapil = document.getElementById('id_dapil').value;

            axios.get('/grafik-dapil/' + id_dapil ?? 0).then(function(res) {

                let nama_calon = res.data.data.map(function(e) {
                    return e.nama_calon + ' <br> ' + e.partai
                })

                let total_suara = res.data.data.map(function(e) {
                    return parseInt(e.total_suara, 10);
                })

                let dapil = res.data.data[0].dapil + ' / ' + res.data.data[0].kabupaten
                console.log(dapil);

                pilihanProdi(nama_calon, total_suara, dapil)
            })
        }

        function cariCalon() {
            var id_calon = document.getElementById('id_calon').value;

            axios.get('/grafik-kecamatan/' + id_calon ?? 0).then(function(res) {

                let kecamatan = res.data.data.map(function(e) {
                    return e.kecamatan
                })

                let total_suara = res.data.data.map(function(e) {
                    return parseInt(e.total_suara, 10);
                })

                let max_suara = res.data.data.map(function(e) {
                    return parseInt(e.max_suara, 10);
                })

                let nama_calon = res.data.data[0].nama_calon + ' / ' + res.data.data[0].partai

                pilihanKecamatan(nama_calon, kecamatan, total_suara, max_suara)
            })
        }

        function pilihanProdi(nama_calon, total_suara, dapil) {
            Highcharts.chart('grafikCalon', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Perolehan Suara Terbanyak'
                },
                subtitle: {
                    text: dapil
                },
                xAxis: {
                    categories: nama_calon,
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: ''
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Calon',
                    data: total_suara

                }]
            });
        }

        function pilihanKecamatan(nama_calon, kecamatan, total_suara, max_suara) {
            Highcharts.chart('grafikKecamatan', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Rekap Suara Per Kecamatan'
                },
                subtitle: {
                    text: nama_calon
                },
                xAxis: {
                    categories: kecamatan,
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: ''
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [
                    {
                        name: 'Total Suara',
                        data: total_suara

                    },
                    {
                        name: 'Max Suara', 
                        data: max_suara
                    }
                ]
            });
        }
    </script>
@endpush
