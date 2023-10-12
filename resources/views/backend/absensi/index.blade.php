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
    <div class="row" style="margin-top: -200px;">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12 col-xl-8 mb-xl-0">
                    <h3 class="font-weight-bold">Data Absensi</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card w-100">
                <div class="card-body">

                    <button type="button" data-toggle="modal" data-target="#modal" class="btn btn-primary btn-sm mb-4"
                        href="{{ url('store-absensi') }}">
                        <i class="bi bi-search"></i> Cari
                    </button>

                    <a type="button" class="btn btn-success btn-sm mb-4"
                        href="{{ url('export-absensi') }}?tanggal_awal={{ Request('tanggal_awal') }}&tanggal_akhir={{ Request('tanggal_akhir') }}">
                        <i class="bi bi-file-excel"></i> Export
                    </a>

                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped" style="width: 100%;">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Pegawai</th>
                                    <th>Tanggal</th>
                                    <th>Scan Masuk</th>
                                    <th>Terlambat</th>
                                    <th>Scan Pulang</th>
                                    <th>Pulang Cepat</th>
                                    <th>Total Jam</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $k => $item)
                                    <tr>
                                        <td>{{ $k + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                                        <td>{{ $item->scan_masuk }}</td>
                                        @if ($item->terlambat == null)
                                            <td>{{ $item->terlambat }}</td>
                                        @elseif($item->terlambat == '00:00:00')
                                            <td class="bg-success text-white">{{ $item->terlambat }}</td>
                                        @elseif($item->terlambat > '00:00:00')
                                            <td class="bg-danger text-white">{{ $item->terlambat }}</td>
                                        @endif
                                        <td>{{ $item->scan_pulang }}</td>
                                        @if ($item->pulang_cepat == null)
                                            <td>{{ $item->pulang_cepat }}</td>
                                        @elseif($item->pulang_cepat == '00:00:00')
                                            <td class="bg-success text-white">{{ $item->pulang_cepat }}</td>
                                        @elseif($item->pulang_cepat > '00:00:00')
                                            <td class="bg-danger text-white">{{ $item->pulang_cepat }}</td>
                                        @endif
                                        <td>
                                            <?php
                                                if($item->scan_masuk && $item->scan_pulang){

                                                    $waktu_awal = new DateTime($item->scan_masuk);
                                                    $waktu_akhir = new DateTime($item->scan_pulang);
    
                                                    $selisih = $waktu_awal->diff($waktu_akhir);
                                                    $selisih = $selisih->format('%H:%I:%S');
    
                                                    echo $selisih;
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('absensi') }}" method="GET">
                    <div class="modal-header p-3">
                        <h5 class="modal-title m-2" id="exampleModalLabel">Cari Absen</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label>Nama Pegawai</label>
                            <select name="id_pegawai" class="form-control" id="id_pegawai" required>
                                <option>Semua Pegawai</option>
                                <?php $user = DB::table('users')
                                    ->where('role', 'Pegawai')
                                    ->get(); ?>
                                @foreach ($user as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Awal</label>
                            <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Akhir</label>
                            <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir" required>
                        </div>
                    </div>
                    <div class="modal-footer p-3">
                        <button class="btn btn-primary btn-sm">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            getData()
        })

        function getData() {
            $("#myTable").DataTable({
                "ordering": false,
            })
        }
    </script>
@endpush
