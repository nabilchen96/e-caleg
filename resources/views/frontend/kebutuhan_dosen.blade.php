@extends('frontend.app')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <section class="features-overview" id="features-section">
            </section>
            <div class="row">
                <div class="col-lg-6">
                    <img data-aos="fade-right" data-aos-duration="1500" width="100%" style="margin-left: -100px; margin-top: 50px;" src="{{ asset('hero 9.png') }}">
                    <img width="100%" style="margin-right: -100px; margin-top: 50px;" src="{{ asset('hero 10.png') }}">
                </div>
                <div class="col-lg-6">
                    <div class="mt-5">
                        <h2>🎺 Kebutuhan Dosen</h2>
                        
                        <h6 class="section-subtitle text-muted mb-4">
                            Kebutuhan Dosen Terkait Kegiatan Penelitian & Pengabdian Kepada Masyarakat Politeknik Penerbangan Palembang
                        </h6>

                        <div class="d-flex justify-content-center">
                            <button style="border-radius: 25px; font-size: 12px;" class="btn btn-info mx-1">Publikasi</button>
                <button style="border-radius: 25px; font-size: 12px;" class="btn btn-info mx-1">Surat Jalan Penelitian</button>
                <button style="border-radius: 25px; font-size: 12px;" class="btn btn-info mx-1">Pelatihan Penelitian & Pengabdian</button>
                        </div>
                    </div>
                    <br>
                    <div class="">
                        <form action="">
                            <div class="mb-4">
                                <label>Jenis Publikasi <sup class="text-danger">*</sup></label>
                                <select name="" class="form-control border" id="">
                                    <option value="">publikasi buku</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="">Nama Dosen Pengusul<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control border" placeholder="Nama Dosen">
                            </div>
                            <div class="mb-4">
                                <label for="">Jumlah Pengajuan (Rp) <sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control border" placeholder="Jumlah Pengajuan (Rp)">
                            </div>
                            <div class="mb-4">
                                <label for="">Judul Publikasi <sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control border" placeholder="Judul Publikasi">
                            </div>
                            <div class="mb-4">
                                <label for="">Link Publikasi <sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control border" placeholder="Link Publikasi">
                            </div>
                            <div class="mb-4">
                                <label for="">Upload Dokumen Publikasi <sup class="text-danger">*</sup></label>
                                <input type="file" class="form-control border" placeholder="Nama Dosen">
                            </div>
                            <div class="mb-4">
                                <label for="">Upload Bukti Pembayaran <sup class="text-danger">*</sup></label>
                                <input type="file" class="form-control border" placeholder="Nama Dosen">
                            </div>
                            <button class="btn btn-info btn-sm">
                                <i class="bi bi-send"></i> Submit
                            </button>
                        </form>
                    </div>
                </div>
                {{-- <div class="col-lg-4"></div> --}}
            </div>
        </div>
    </div>
    <br><br><br><br>
@endsection
