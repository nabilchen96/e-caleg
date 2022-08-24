@extends('backend.app')
@push('style')
    <style>
        .btn {
            border-radius: 50px !important;
        }
    </style>
@endpush
@section('content')
    <div class="row" style="margin-top: -200px;">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12 col-xl-8 mb-xl-0">
                    <h3 class="font-weight-bold text-white">User Profil</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card w-100">
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="{{ url('/back/store-profil') }}">
                        @csrf
                        <input type="hidden" name="id_user" value="{{ $data->user_id }}">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama Toko</label>
                                    <input type="text" class="form-control" readonly value="{{ $data->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Toko</label>
                                    <textarea class="form-control" placeholder="deskripsi" name="deskripsi_toko" id="" cols="30" rows="10">{{ $data->deskripsi_toko }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Alamat Toko</label>
                                    <textarea class="form-control" placeholder="deskripsi" name="alamat" id="" cols="5" rows="5">{{ $data->alamat }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Foto (Ukuran ideal: 150X150 pixel)</label>
                                    <input type="file" name="foto_profil" class="mb-4 form-control">
                                    <img width="150" height="150" class="shadow" style="object-fit: cover; border-radius: 10px;" src="{{ asset('foto_profil') }}/{{ $data->foto_profil ?? "office.jpg" }}">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-send"></i> Submit</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>No. Whatsapp</label>
                                    <input type="text" class="form-control" name="wa" placeholder="Nomor Whatsapp" value="{{ $data->wa }}">
                                </div>
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input type="text" class="form-control" name="facebook" placeholder="Facebook" value="{{ $data->facebook }}">
                                </div>
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input type="text" class="form-control" name="instagram" placeholder="Instagram" value="{{ $data->instagram }}">
                                </div>
                                <div class="form-group">
                                    <label>Tiktok</label>
                                    <input type="text" class="form-control" name="tiktok" placeholder="Tiktok" value="{{ $data->tiktok }}">
                                </div>
                                <div class="form-group">
                                    <label>Youtube</label>
                                    <input type="text" class="form-control" name="youtube" placeholder="Youtube" value="{{ $data->youtube }}">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
