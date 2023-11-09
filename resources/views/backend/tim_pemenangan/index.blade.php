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
                    <h3 class="font-weight-bold">Data Tim Pemenangan</h3>
                    <form action="{{ url('tim-pemenangan') }}">
                        <div class="input-group mb-3" style="width: 400px !important;">
                            <?php
                            $calon = DB::table('calons as c')
                                ->join('partais as p', 'p.id', '=', 'c.id_partai')
                                ->select('c.*', 'p.partai')
                                ->get();
                            ?>

                            <select style="border-radius: 20px; width: 100px !important;" name="id_calon" id="id_calon"
                                class="form-control">
                                <option value="">--PILIH CALON--</option>
                                @foreach ($calon as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_calon }} / {{ $item->partai }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="ml-2 btn btn-info bg-info text-white input-group-text" id="basic-addon2">
                                <i class="bi bi-search"></i> &nbsp; Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-3">
            <div class="card card-tale shadow mb-3">
                <div class="card-body">
                    <h4 class="mb-4">Tim Pemenangan</h4>
                    <h2 class="fs-30 mb-2">{{ @$tim ?? 0 }}</h2>
                    <span>
                        <a href="{{ url('tim-pemenangan') }}" class="text-white">
                            List Tim <i class="bi bi-arrow-right"></i>
                        </a>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-dark-blue shadow mb-3">
                <div class="card-body">
                    <h4 class="mb-4">Total Relawan</h4>
                    <h2 class="fs-30 mb-2">{{ @$relawan ?? 0 }}</h2>
                    <span>
                        <a href="{{ url('relawan') }}" class="text-white">
                            List Relawan <i class="bi bi-arrow-right"></i>
                        </a>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-light-blue shadow mb-3">
                <div class="card-body">
                    <h4 class="mb-4">Total Pendukung</h4>
                    <h2 class="fs-30 mb-2">{{ @$pendukung ?? 0 }}</h2>
                    <span>
                        <a href="{{ url('pendukung') }}" class="text-white">
                            List Pendukung <i class="bi bi-arrow-right"></i>
                        </a>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-light-danger shadow mb-3">
                <div class="card-body">
                    <h4 class="mb-4">Total Saksi</h4>
                    <h2 class="fs-30 mb-2">{{ @$saksi ?? 0 }}</h2>
                    <span>
                        <a href="{{ url('saksi') }}" class="text-white">
                            List Saksi <i class="bi bi-arrow-right"></i>
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card shadow w-100">
                <div class="card-body">
                    <button type="button" class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#modal">
                        Tambah
                    </button>
                    <button type="button" class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#import">
                        <i class="bi bi-cloud-plus-fill"></i> Import
                    </button>
                    {{-- <a href="{{ url('export-tim-pemenangan') }}">
                        <button type="button" class="btn btn-success btn-sm mb-4">
                            <i class="bi bi-file-earmark-excel"></i> Export
                        </button>
                    </a> --}}
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped" style="width: 100%;">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama</th>
                                    <th>TIM</th>
                                    <th>NIK</th>
                                    <th>No HP</th>
                                    <th>Tempat / Tanggal Lahir</th>
                                    <th>Kelurahan</th>
                                    <th width="5%"></th>
                                    <th width="5%"></th>
                                </tr>
                            </thead>
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
                        <h5 class="modal-title m-2" id="exampleModalLabel">Tim Pemenangan Form</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="id_user" id="id_user">
                        <div class="form-group">
                            <label>Nama Lengkap <sup class="text-danger">*</sup></label>
                            <input name="nama" id="nama" type="text" placeholder="Nama Lengkap"
                                class="form-control form-control-sm" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Kode Anggota</label>
                                    <input name="kode_anggota" id="kode_anggota" type="text"
                                        placeholder="Kode Anggota" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input name="nik" id="nik" type="text" placeholder="NIK"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nomor HP</label>
                            <input name="no_hp" id="no_hp" type="text" placeholder="Nomor HP"
                                class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control form-control-sm"
                                placeholder="Alamat"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Calon <sup class="text-danger">*</sup></label>
                            <?php
                            $calon = DB::table('calons as c')
                                ->join('partais as p', 'p.id', '=', 'c.id_partai')
                                ->join('jadwals as j', 'j.id', '=', 'c.id_jadwal')
                                ->where('j.status', 'AKTIF')
                                ->select('c.*', 'p.partai')
                                ->get();
                            ?>
                            <select name="id_calon" id="id_calon" class="form-control form-control-sm" required>
                                <option value="">--PILIH CALON--</option>
                                @foreach ($calon as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_calon }} / {{ $item->partai }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kelurahan <sup class="text-danger">*</sup></label>
                            <?php $kel = DB::table('kelurahans')->get(); ?>
                            <select name="id_kelurahan" id="id_kelurahan" class="form-control form-control-sm" required>
                                <option value="">--PILIH KELURAHAN--</option>
                                @foreach ($kel as $item)
                                    <option value="{{ $item->id }}">{{ $item->kelurahan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input name="tempat_lahir" id="tempat_lahir" type="text"
                                        placeholder="Tempat Lahir" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input name="tanggal_lahir" id="tanggal_lahir" type="date"
                                        placeholder="Tanggal Lahir" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Email <sup class="text-danger">*</sup></label>
                                    <input name="email" id="email" type="email" placeholder="Email"
                                        class="form-control form-control-sm" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Password <sup class="text-danger">*</sup></label>
                                    <input name="password" id="password" placeholder="Password" type="password"
                                        required class="form-control form-control-sm">
                                </div>
                            </div>
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
                <form id="formimport" action="{{ url('import-anggota') }}" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <div class="modal-header p-3">
                        <h5 class="modal-title m-2" id="exampleModalLabel">Tim pemenangan Import</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Import Excel</label>
                            <input type="file" name="file" id="file" class="form-control" required>
                            <ul class="mt-4">
                                <li>Download contoh Format untuk Import File Excel <a
                                        href="{{ asset('file_import') }}/import anggota.xlsx">[ Download ]</a></li>
                                <li>Isi sesuai dengan format excel yang diberikan</li>
                                <li>Tidak bisa menggunakan email yang sama, jika saat import terdapat email yang sama maka
                                    data akan ditimpa</li>
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
                ajax: '/data-tim-pemenangan?id_calon={{ Request("id_calon") }}',
                processing: true,
                scrollX: true,
                scrollCollapse: true,
                'language': {
                    'loadingRecords': '&nbsp;',
                    'processing': 'Loading...'
                },
                columns: [{
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        render: function(data, type, row, meta) {
                            return `NAMA: ${row.nama}<br>KODE ANGGOTA: ${row.kode_anggota}`
                        }
                    },
                    {
                        render: function(data, type, row, meta) {
                            return `${row.nama_calon}<br>${row.partai}`
                        }
                    },
                    {
                        data: "nik"
                    },
                    {
                        data: "no_hp"
                    },
                    {
                        render: function(data, type, row, meta) {
                            return `${row.tempat_lahir}, ${row.tanggal_lahir}`
                        }
                    },
                    {
                        data: "kelurahan"
                    },
                    {
                        render: function(data, type, row, meta) {
                            return `<a data-toggle="modal" data-target="#modal"
                                    data-bs-id=` + (row.id) + ` href="javascript:void(0)">
                                    <i style="font-size: 1.5rem;" class="text-success bi bi-grid"></i>
                                </a>`
                        }
                    },
                    {
                        render: function(data, type, row, meta) {
                            return `<a href="javascript:void(0)" onclick="hapusData(` + (row
                                .id) + `)">
                                    <i style="font-size: 1.5rem;" class="text-danger bi bi-trash"></i>
                                </a>`
                        }
                    },
                ]
            })
        }

        $('#modal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('bs-id') // Extract info from data-* attributes
            var cok = $("#myTable").DataTable().rows().data().toArray()

            let cokData = cok.filter((dt) => {
                return dt.id == recipient;
            })

            document.getElementById("form").reset();
            document.getElementById('id').value = ''
            $('.error').empty();

            if (recipient) {
                var modal = $(this)
                modal.find('#id').val(cokData[0].id)
                modal.find('#nama').val(cokData[0].nama)
                modal.find('#kode_anggota').val(cokData[0].kode_anggota)
                modal.find('#nik').val(cokData[0].nik)
                modal.find('#no_hp').val(cokData[0].no_hp)
                modal.find('#alamat').val(cokData[0].alamat)
                modal.find('#id_calon').val(cokData[0].id_calon)
                modal.find('#id_kelurahan').val(cokData[0].id_kelurahan)
                modal.find('#tempat_lahir').val(cokData[0].tempat_lahir)
                modal.find('#tanggal_lahir').val(cokData[0].tanggal_lahir)
                modal.find('#email').val(cokData[0].email)
                modal.find('#id_user').val(cokData[0].id_user)
            }
        })

        form.onsubmit = (e) => {

            let formData = new FormData(form);

            e.preventDefault();

            document.getElementById("tombol_kirim").disabled = true;

            axios({
                    method: 'post',
                    url: formData.get('id') == '' ? '/store-tim-pemenangan' : '/update-tim-pemenangan',
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
                        getData()

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
                    axios.post('/delete-tim-pemenangan', {
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
                                getData();

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
