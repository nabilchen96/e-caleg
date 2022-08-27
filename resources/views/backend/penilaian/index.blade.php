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
    </style>
@endpush
@section('content')
    <div class="row" style="margin-top: -200px;">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12 col-xl-8 mb-xl-0">
                    <h3 class="font-weight-bold text-white">Data Penilaian</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card w-100">
                <div class="card-body">
                    <button type="button" class="btn btn-danger btn-sm mb-4">
                        Cetak PDF
                    </button>
                    <br>
                    <h3>{{ DB::table('gruppenilaians')->where('status', 'Aktif')->value('nama_grup') }}</h3>
                    <br>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped" style="width: 100%;">
                            <thead class="table-bordered table-dark" style="border-color: #c3c5c8 !important;">
                                <tr>
                                    <th width="5%" rowspan="2" style="vertical-align: middle;">No</th>
                                    <th rowspan="2" style="vertical-align: middle;">Nama</th>
                                    <th style="border-bottom: 2px solid #454d55;">Samapta A</th>
                                    <th colspan="3" style="border-bottom: 2px solid #454d55; text-align: center;">Samapta B</th>
                                    <th style="border-bottom: 1px solid #454d55; vertical-align: middle;">Nilai Akhir</th>
                                    <th rowspan="2" width="5%"></th>
                                </tr>
                                <tr>
                                    <th>Lari</th>
                                    <th>Push Up</th>
                                    <th>Sit Up</th>
                                    <th>Shuttle Run</th>
                                    <th>S = (A + B) / 2</th>
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
                        <h5 class="modal-title m-2" id="exampleModalLabel">User Form</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="detail_grup_penilaian_id" id="detail_grup_penilaian_id">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Lengkap</label>
                            <input name="name" id="name" type="text" placeholder="Nama Lengkap"
                                class="form-control form-control-sm" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jarak Lari</label>
                            <input name="jarak_lari" id="jarak_lari" step="0.01" type="number" placeholder="Jarak Lari"
                                class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jumlah Push Up</label>
                            <input name="jumlah_push_up" id="jumlah_push_up" step="0.01" type="number" placeholder="Jumlah Push Up"
                                class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jumlah Sit Up</label>
                            <input name="jumlah_sit_up" id="jumlah_sit_up" step="0.01" type="number" placeholder="Jumlah Sit Up"
                                class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Shuttle Run DTK</label>
                            <input name="jumlah_shuttle_run" id="jumlah_shuttle_run" step="0.01" type="number" placeholder="Jumlah Shuttle Run"
                                class="form-control form-control-sm">
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            getData()
        })

        function getData() {
            $("#myTable").DataTable({
                "ordering": false,
                ajax: '/back/data-penilaian',
                processing: true,
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
                        render: function(data, type, row, meta){

                            return `${row.name} <br> <b>No Reg</b>: ${row.no_reg} <br> <b>JK</b>: ${row.jk}`
                        }
                    },
                    {
                        data: "nilai_lari"
                    },
                    {
                        data: "nilai_push_up"
                    },
                    {
                        data: "nilai_sit_up"
                    },
                    {
                        data: "nilai_shuttle_run"
                    },
                    {
                        render: function(data, type, row, meta){
                            let samaptaA = row.nilai_lari
                            let samaptaB = (row.nilai_push_up + row.nilai_sit_up + row.nilai_shuttle_run) / 3

                            return Math.round((samaptaA + samaptaB) / 2)
                        }
                    },
                    {
                        render: function(data, type, row, meta) {
                            return `<a data-toggle="modal" data-target="#modal"
                                    data-bs-id=` + (row.detail_grup_penilaian_id) + ` href="javascript:void(0)">
                                    <i style="font-size: 1.5rem;" class="text-success bi bi-grid"></i>
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
                return dt.detail_grup_penilaian_id == recipient;
            })

            document.getElementById("form").reset();
            // document.getElementById('id').value = ''
            $('.error').empty();

            if (recipient) {
                var modal = $(this)
                modal.find('#detail_grup_penilaian_id').val(cokData[0].detail_grup_penilaian_id)
                modal.find('#name').val(cokData[0].name)
                modal.find('#jarak_lari').val(cokData[0].jarak_lari)
                modal.find('#jumlah_push_up').val(cokData[0].jumlah_push_up)
                modal.find('#jumlah_sit_up').val(cokData[0].jumlah_sit_up)
                modal.find('#jumlah_shuttle_run').val(cokData[0].jumlah_shuttle_run)
            }
        })

        form.onsubmit = (e) => {

            let formData = new FormData(form);

            e.preventDefault();

            document.getElementById("tombol_kirim").disabled = true;

            axios({
                    method: 'post',
                    url: '/back/store-penilaian',
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
                        //error validation
                        // document.getElementById('password_alert').innerHTML = res.data.respon.password ?? ''
                        // document.getElementById('email_alert').innerHTML = res.data.respon.email ?? ''
                    }

                    document.getElementById("tombol_kirim").disabled = false;
                })
                .catch(function(res) {
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
                    axios.post('/back/delete-user', {
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
