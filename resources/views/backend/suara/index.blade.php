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
                    <h3 class="font-weight-bold">Data Suara</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card w-100">
                <div class="card-body">
                    <button type="button" class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#modal">
                        Tambah
                    </button>
                    <button type="button" class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#import">
                        <i class="bi bi-cloud-plus-fill"></i> Import
                    </button>
                    <a href="{{ url('export-suara') }}">
                        <button type="button" class="btn btn-success btn-sm mb-4">
                            <i class="bi bi-file-earmark-excel"></i> Export
                        </button>
                    </a>
                    {{-- <button type="button" class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#modal">
                        <i class="bi bi-search"></i> Cari Calon
                    </button> --}}
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped" style="width: 100%;">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama Calon</th>
                                    {{-- <th>Partai</th> --}}
                                    <th>TPS / Kelurahan / Kecamatan</th>
                                    <th>Suara Sah</th>
                                    <th>Suara Tidak Sah</th>
                                    <th>Max Suara</th>
                                    {{-- <th>Kelurahan</th>
                                    <th>Kecamatan</th> --}}
                                    <th>User Input</th>
                                    <th>File C1</th>
                                    <th width="5%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $k => $item)
                                    <tr>
                                        <td class="bg-info text-white">{{ $k + 1 }}</td>
                                        <td class="bg-info text-white">{{ $item->nama_calon }} <br> {{ $item->partai }}</td>
                                        {{-- <td class="bg-info text-white">{{ $item->partai }}</td> --}}
                                        <td class="bg-info text-white">
                                            {{ $item->nama_tps }} <br>
                                            {{ $item->kelurahan }} / {{ $item->kecamatan }}
                                        </td>
                                        <td class="bg-info text-white">{{ $item->total_suara_sah }}</td>
                                        <td class="bg-danger text-white">{{ $item->total_suara_tidak_sah }}</td>
                                        <td class="bg-warning text-white">{{ $item->max_surat_suara }}</td>
                                        {{-- <td>{{ $item->kelurahan }}</td> --}}
                                        {{-- <td>{{ $item->kecamatan }}</td> --}}
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <a href="{{ url('file_c1') }}/{{ $item->file_c1 }}">
                                                <i style="font-size: 1.5rem;" class="text-info bi bi-cloud-arrow-down"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" onclick="hapusData({{ $item->id }})">
                                                <i style="font-size: 1.5rem;" class="text-danger bi bi-trash"></i>
                                            </a>
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
    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="form">
                    <div class="modal-header p-3">
                        <h5 class="modal-title m-2" id="exampleModalLabel">Suara Form</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kode TPS <sup class="text-danger">*</sup></label>
                            <?php
                            $tps = DB::table('tps as t')
                                ->leftjoin('kelurahans as k', 'k.id', '=', 't.id_kelurahan')
                                ->leftjoin('kecamatans as kc', 'kc.id', '=', 'k.id_kecamatan')
                                ->leftjoin('dapils as d', 'd.id', '=', 'kc.id_dapil')
                                ->select('t.*', 'k.kelurahan', 'kc.kecamatan', 'd.kabupaten')
                                ->get();
                            ?>
                            <select name="id_tps" id="id_tps" class="form-control" required>
                                <option value="">--PILIH TPS--</option>
                                @foreach ($tps as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_tps }} / {{ $item->kelurahan }} /
                                        {{ $item->kecamatan }} / {{ $item->kabupaten }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Calon / Partai <sup class="text-danger">*</sup></label>
                            <?php
                            $calon = DB::table('calons as c')
                                ->join('partais as p', 'p.id', '=', 'c.id_partai')
                                ->join('jadwals as j', 'j.id', '=', 'c.id_jadwal')
                                ->select('c.*', 'p.partai')
                                ->where('j.status', 'AKTIF')
                                ->get();
                            ?>
                            <select name="id_calon" id="id_calon" class="form-control" required>
                                <option value="">--PILIH CALON--</option>
                                @foreach ($calon as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_calon }} / {{ $item->partai }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Total Suara Sah<sup class="text-danger">*</sup></label>
                            <input type="number" name="total_suara_sah" id="total_suara_sah" class="form-control" required
                                placeholder="Max Surat Suara">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Total Suara Tidak Sah<sup class="text-danger">*</sup></label>
                            <input type="number" name="total_suara_tidak_sah" id="total_suara_tidak_sah"
                                class="form-control" required placeholder="Max Surat Suara">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">File C1 </label>
                            <input type="file" name="file" class="form-control">
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
    <div class="modal fade" id="import" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formimport" action="{{ url('import-suara') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-header p-3">
                        <h5 class="modal-title m-2" id="exampleModalLabel">Suara Import</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Import Excel</label>
                            <input type="file" name="file" id="file" class="form-control" required>
                            <ul class="mt-4">
                                <li>Download contoh Format untuk Import File Excel <a
                                        href="{{ asset('file_import') }}/Suara Import.xlsx">[ Download ]</a></li>
                                <li>Isi sesuai dengan format excel yang diberikan</li>
                            </ul>
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

        form.onsubmit = (e) => {

            let formData = new FormData(form);

            e.preventDefault();

            document.getElementById("tombol_kirim").disabled = true;

            axios({
                    method: 'post',
                    url: '/store-suara',
                    data: formData,
                })
                .then(function(res) {
                    //handle success         
                    if (res.data.responCode == 1) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: res.data.respon,
                            timer: 3000,
                            showConfirmButton: false
                        })

                        $("#modal").modal("hide");
                        $('#myTable').DataTable().clear().destroy();

                        location.reload();

                    } else {

                        console.log('terjadi error');
                    }

                    document.getElementById("tombol_kirim").disabled = false;
                })
                .catch(function(res) {
                    document.getElementById("tombol_kirim").disabled = false;
                    //handle error
                    console.log(res);
                });
        }

        hapusData = (id) => {
            Swal.fire({
                title: "Yakin hapus data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonColor: '#3085d6',
                cancelButtonText: "Batal"

            }).then((result) => {

                if (result.value) {
                    axios.post('/delete-suara', {
                            id
                        })
                        .then((response) => {
                            if (response.data.responCode == 1) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    timer: 2000,
                                    showConfirmButton: false
                                })

                                $('#myTable').DataTable().clear().destroy();

                                location.reload();

                            } else {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Gagal...',
                                    text: response.data.respon,
                                })
                            }
                        }, (error) => {
                            console.log(error);
                        });
                }

            });
        }
    </script>
@endpush
