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
                    <h3 class="font-weight-bold text-white">Samapta</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card w-100">
                <div class="card-body">
                    @if (Auth::user()->role == 'Admin')                        
                        <button type="button" class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#modal">
                            Tambah
                        </button>
                    @endif
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Jenis Samapta</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Untuk</th>
                                    <th>Nilai</th>
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
                        <h5 class="modal-title m-2" id="exampleModalLabel">Samapta Form</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="jenis samapta">Jenis Samapta</label>
                            <select name="jenis_samapta" class="form-control" id="jenis_samapta">
                                <option value="Lari">Lari</option>
                                <option value="Push-Up">Push-Up</option>
                                <option value="Sit-Up">Sit-Up</option>
                                <option value="Shuttle Run">Shuttle Run</option>
                            </select>
                            <span class="text-danger error" style="font-size: 12px;" id="jenis_alert"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ukuran Menit</label>
                            <input name="ukuran_menit" id="ukuran_menit" type="text" placeholder="ukuran menit"
                                class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <span class="text-danger error" style="font-size: 12px;" id="ukuran_alert"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah</label>
                            <input name="jumlah" id="jumlah" type="text" placeholder="jumlah"
                                class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <span class="text-danger error" style="font-size: 12px;" id="jumlah_alert"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Untuk</label>
                            <select name="untuk" class="form-control" id="untuk">
                                <option value="Taruna">Taruna</option>
                                <option value="Taruni">Taruni</option>
                            </select>
                            <span class="text-danger error" style="font-size: 12px;" id="untuk_alert"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">nilai</label>
                            <input name="nilai" id="nilai" type="nilai" placeholder="nilai"
                                class="form-control form-control-sm" id="exampleInputPassword1">
                            <span class="text-danger error" style="font-size: 12px;" id="nilai_alert"></span>
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
                ajax: '/back/data-samapta',
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
                        data: "jenis_samapta"
                    },
                    {
                        data: "jumlah"
                    },
                    {
                        render: function(data, type, row, meta) {
                            if (row.jenis_samapta == "Lari") {
                                return "Meter"
                            }else if (row.jenis_samapta == "Push-up") {
                                return "Kali"
                            }else if (row.jenis_samapta == "Sit-up"){
                                return "Kali"
                            }else{
                                return "Detik"
                            }
                        }
                    },
                    {
                        data: "untuk"
                    },
                    {
                        data: "nilai"
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
                modal.find('#jenis_samapta').val(cokData[0].jenis_samapta)
                modal.find('#ukuran_menit').val(cokData[0].ukuran_menit)
                modal.find('#jumlah').val(cokData[0].jumlah)
                modal.find('#nilai').val(cokData[0].nilai)
                modal.find('#untuk').val(cokData[0].untuk)
            }
        })

        form.onsubmit = (e) => {

            let formData = new FormData(form);

            e.preventDefault();

            document.getElementById("tombol_kirim").disabled = true;

            axios({
                    method: 'post',
                    url: formData.get('id') == '' ? '/back/store-samapta' : '/back/update-samapta',
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
                        document.getElementById('jenis_alert').innerHTML = res.data.respon.jenis ?? ''
                        document.getElementById('ukuran_alert').innerHTML = res.data.respon.ukuran ?? ''
                        document.getElementById('jumlah_alert').innerHTML = res.data.respon.jumlah ?? ''
                        document.getElementById('untuk_alert').innerHTML = res.data.respon.untuk ?? ''
                        document.getElementById('nilai_alert').innerHTML = res.data.respon.nilai ?? ''
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
