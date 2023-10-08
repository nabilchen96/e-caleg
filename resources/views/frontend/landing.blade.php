@extends('frontend.app')
@section('content')
    <div class="banner pt-5">
        <div class="">
            <div data-aos="fade-up" data-aos-duration="2000" class="justify-content-center pt-5" style="margin-bottom: -300px;">
                <h1>Selamat Datang di SIPP 👍</h1>
                <p>
                    Sistem Informasi Penelitian dan Pengabdian Kepada Masyarakat
                    <br>Politeknik Penerbangan Palembang
                </p>
                <p class="text-muted">Lihat Timeline Jadwal</p>
                <a style="border-radius: 25px;" class="text-white btn btn-danger">
                    Jadwal &nbsp; <i class="bi bi-play-circle-fill"></i>
                </a>
            </div>
            
            <div class="row">
                <div class="col-lg-5">
                    <img data-aos="fade-right" data-aos-duration="1500" width="100%" style="margin-left: -100px; margin-top: 50px;" src="{{ asset('hero 9.png') }}">
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-5">
                    <img data-aos="fade-left" data-aos-duration="1500" width="100%" style="margin-right: -100px; margin-top: 50px;" src="{{ asset('hero 10.png') }}">
                </div>
            </div>
            <br><br><br><br>
            <div class="container">
                <section class="features-overview" id="features-section">
                    <div data-aos="fade-up" data-aos-duration="1500" class="content-header">
                        <h2>👷 Kegiatan PusPPM</h2>
                        <h6 class="section-subtitle text-muted mb-4">
                            Kegiatan Penelitian dan Pengabdian Kepada Masyarakat <br> Politeknik Penerbangan Palembang
                        </h6>
                    </div>
                    <br><br>
                    <ul data-aos="fade-up" data-aos-duration="1500" class="timeline">
                        <li style="background: red;" data-year="We Are Here!" data-text="1. Pengajuan Judul"></li>
                        <li data-year="" data-text="2. Pengumuman Hasil Seleksi"></li>
                        <li data-year="" data-text="3. Proposal"></li>
                        <li data-year="" data-text="4. Seminar Proposal"></li>
                        <li data-year="" data-text="5. RAB"></li>
                        <li data-year="" data-text="6. Surat Izin Penelitian"></li>
                        <li data-year="" data-text="7. Seminar Antara"></li>
                        <li data-year="" data-text="8. Luaran Penelitian"></li>
                        <li data-year="" data-text="9. Seminar Hasil"></li>
                        <li data-year="" data-text="10. Survey Kepuasan Layanan"></li>
                    </ul>
                    <br><br>
                </section>
            </div>
        </div>
    </div>
@endsection
