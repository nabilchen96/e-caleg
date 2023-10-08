@extends('frontend.app')
@section('content')
    <div class="content-wrapper pt-5">
        <div class="container">
            <section class="features-overview" id="features-section">
                <div class="content-header">
                    <h2>👷 Kegiatan PusPPM</h2>
                    <h6 class="section-subtitle text-muted mb-4">
                        Kegiatan Penelitian dan Pengabdian Kepada Masyarakat <br> Politeknik Penerbangan Palembang
                    </h6>
                </div>
                <br><br>
                <ul class="timeline">
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

            <div class="card mt-5">
                <div style="width: 100%;">
                    <form>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="form-label">Program Studi <sup class="text-danger">*</sup></label>
                                    <select name="" class="form-control border" id="">
                                        <option value="">DIV TRBU</option>
                                        <option value="">DIII PPKP</option>
                                        <option value="">DIII MBU</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Judul Penelitian <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control border" placeholder="Judul Penelitian">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Jenis Penelitian <sup class="text-danger">*</sup></label>
                                    <select name="" class="form-control border" id="">
                                        <option value="">Terapan</option>
                                        <option value="">Basic</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="form-label">Sub Topik Penelitian <sup class="text-danger">*</sup></label>
                                    <select name="" class="form-control border" id="">
                                        <option value="">Aviation of Learning Technology</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Pelaksanaan Penelitian <sup
                                            class="text-danger">*</sup></label>
                                    <select name="" class="form-control border" id="">
                                        <option value="">Kelompok</option>
                                        <option value="">Mandiri</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Nama Peneliti <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control border" placeholder="Nama Peneliti">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
