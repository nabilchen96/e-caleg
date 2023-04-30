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
                    <h3 class="font-weight-bold text-white">Data Pengujian Analisa Saringan Halus</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card w-100">
                <div class="card-body">
                    {{-- @if (Auth::user()->role == 'Admin')                         --}}
                        <button type="button" class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#modal">
                            Tambah
                        </button>
                    {{-- @endif --}}
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Kode Uji</th>
                                    <th>Pasir Asal</th>
                                    <th>Berat Pasir</th>
                                    <th>Modulus Halus</th>
                                    <th width="5%"></th>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="form">
                    <div class="modal-header p-3">
                        <h5 class="modal-title m-2" id="exampleModalLabel">Form Uji</h5>
                    </div>
                    <div class="modal-body">
                        <h4>Benda Uji :</h4>
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="exampleInputEmail1">a. Pasir Asal</label>
                            <input name="pasir_asal" id="pasir_asal" type="text" placeholder="Pasir Asal"
                                class="form-control form-control-sm"  aria-describedby="emailHelp">
                            <span class="text-danger error" style="font-size: 12px;" id="pasir_asal_alert"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">b. Berat pasir yang diperiksa</label>
                            <input name="berat_pasir" id="berat_pasir" type="text" placeholder="Berat pasir yang diperiksa"
                                class="form-control form-control-sm" onKeyPress="return goodchars(event,'1234567890.',this)" aria-describedby="emailHelp">
                            <span class="text-danger error" style="font-size: 12px;" id="berat_pasir_alert"></span>
                        </div> required
                        
                        <h4>Hasil Pengujian</h4>
                        <table class="table table-bordered">
                            <tr>
                                <th>Lubang Ayakan (mm)</th>
                                <th>Berat Tertinggal (gr)</th>
                            </tr>
                            <tr>
                                <td><input type="number" class="form-control" name="inputan_1" value="4.75" readonly></td>
                                <td><input type="text" onKeyPress="return goodchars(event,'1234567890.',this)" class="form-control" name="inputa_1" id="inputa_1" required></td>
                            </tr>
                            <tr>
                                <td><input type="number" class="form-control" name="inputan_2" value="2.36" readonly></td>
                                <td><input type="text" onKeyPress="return goodchars(event,'1234567890.',this)" class="form-control" name="inputa_2" id="inputa_2" required></td>
                            </tr>
                            <tr>
                                <td><input type="number" class="form-control" name="inputan_3" value="1.18" readonly></td>
                                <td><input type="text" onKeyPress="return goodchars(event,'1234567890.',this)" class="form-control" name="inputa_3" id="inputa_3" required></td>
                            </tr>
                            <tr>
                                <td><input type="number" class="form-control" name="inputan_4" value="0.60" readonly></td>
                                <td><input type="text" onKeyPress="return goodchars(event,'1234567890.',this)" class="form-control" name="inputa_4" id="inputa_4" required></td>
                            </tr>
                            <tr>
                                <td><input type="number" class="form-control" name="inputan_5" value="0.30" readonly></td>
                                <td><input type="text" onKeyPress="return goodchars(event,'1234567890.',this)" class="form-control" name="inputa_5" id="inputa_5" required></td>
                            </tr>
                            <tr>
                                <td><input type="number" class="form-control" name="inputan_6" value="0.15" readonly></td>
                                <td><input type="text" onKeyPress="return goodchars(event,'1234567890.',this)" class="form-control" name="inputa_6" id="inputa_6" required></td>
                            </tr>
                            <tr>
                                <td>Sisa</td>
                                <td><input type="text" onKeyPress="return goodchars(event,'1234567890.',this)" class="form-control" name="sisa_inputa" id="sisa_inputa" required></td>
                            </tr>
                        </table>
                       
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
                ajax: '/back/data-analisa-saringan-halus',
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
                        data: "kode_uji"
                    },
                    
                    {
                        data: "pasir_asal"
                    },

                    {
                        data: "berat_pasir"
                    },

                    {
                        data: "modulus_halus"
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
                            return `<a href=/back/cetak-analisa-saringan-halus/${row.id} target="_blank">
                                    <i style="font-size: 1.5rem;" class="text-warning bi bi-file-pdf"></i>
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
                modal.find('#pasir_asal').val(cokData[0].pasir_asal)
                modal.find('#berat_pasir').val(cokData[0].berat_pasir)
                modal.find('#inputa_1').val(cokData[0].inputa_1)
                modal.find('#inputa_2').val(cokData[0].inputa_2)
                modal.find('#inputa_3').val(cokData[0].inputa_3)
                modal.find('#inputa_4').val(cokData[0].inputa_4)
                modal.find('#inputa_5').val(cokData[0].inputa_5)
                modal.find('#inputa_6').val(cokData[0].inputa_6)
                modal.find('#sisa_inputa').val(cokData[0].sisa_inputa)
            }
        })

        form.onsubmit = (e) => {

            let formData = new FormData(form);

            e.preventDefault();

            document.getElementById("tombol_kirim").disabled = true;

            axios({
                    method: 'post',
                    url: formData.get('id') == '' ? '/back/store-analisa-saringan-halus' : '/back/update-analisa-saringan-halus',
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
                        document.getElementById('password_alert').innerHTML = res.data.respon.password ?? ''
                        document.getElementById('email_alert').innerHTML = res.data.respon.email ?? ''
                    }

                    document.getElementById("tombol_kirim").disabled = false;
                })
                .catch(function(res) {
                    //handle error
                    console.log(res);
                    Swal.fire({
                            icon: 'success',
                            title: 'Gagal',
                            text: res.data.respon,
                            timer: 3000,
                            showConfirmButton: false
                        })
                    document.getElementById("tombol_kirim").disabled = false;
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
