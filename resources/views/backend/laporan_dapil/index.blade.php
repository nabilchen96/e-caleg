@extends('backend.app')
@push('style')
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

        th,
        td {
            white-space: nowrap !important;
        }
    </style>
@endpush
@section('content')
    <div class="row" style="margin-top: -200px;">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12 col-xl-8 mb-xl-0">
                    <h3 class="font-weight-bold">Data Suara Per Dapil</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card shadow w-100">
                <div class="card-body">
                    <button type="button" class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#modal">
                        <i class="bi bi-search"></i> Filter
                    </button>
                    <a href="{{ url('export-laporan-dapil') }}">
                        <button type="button" class="btn btn-success btn-sm mb-4">
                            <i class="bi bi-file-earmark-excel"></i> Export
                        </button>
                    </a>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped" style="width: 100%;">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama Calon</th>
                                    <th>Partai</th>
                                    <th>Dapil</th>
                                    <th>Kabupaten</th>
                                    <th>Suara </th>
                                    <th>Max Suara</th>
                                    <th>Persentase</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $k => $item)
                                    <tr>
                                        <td class="bg-info text-white">{{ $k + 1 }}</td>
                                        <td class="bg-info text-white">{{ $item->nama_calon }}</td>
                                        <td class="bg-info text-white">{{ $item->partai }}</td>
                                        <td class="bg-info text-white">{{ $item->dapil }}</td>
                                        <td class="bg-info text-white">{{ $item->kabupaten }}</td>
                                        <td class="bg-success text-white">{{ $item->total_suara }}</td>
                                        <td class="bg-success text-white">{{ $item->max_suara }}</td>
                                        <td class="bg-success text-white">
                                            <?php
                                            if ($item->max_suara != 0) {
                                                echo $percentage = round(($item->total_suara / $item->max_suara) * 100) . '%';
                                            } else {
                                                echo $percentage = 0; // Atau nilai default lainnya jika diperlukan
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
                <form id="formimport" action="{{ url('laporan-dapil') }}">
                    <div class="modal-header p-3">
                        <h5 class="modal-title m-2" id="exampleModalLabel">Filter Form</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pilih Calon <sup class="text-danger">*</sup></label>
                            <?php
                             $calon = DB::table('calons')->get();
                            ?>
                            <select name="id_calon" id="id_calon" class="form-control">
                                <option value="">TAMPILKAN SEMUA CALON</option>
                                @foreach ($calon as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_calon }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer p-3">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        <button id="tombol_kirim" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            getData()
        })

        function getData() {
            $("#myTable").DataTable({
                "ordering": false,
                scrollX: true,
                scrollCollapse: true,

            })
        }
    </script>
@endpush
