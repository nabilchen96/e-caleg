@extends('frontend.app')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <section class="features-overview" id="features-section">
                <div class="row">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1200">
                        <div id="lottie-container"></div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1200">
                        <div class="mt-5">
                            <h2>🎺 Pengumuman</h2>
                            <h6 class="section-subtitle text-muted mb-4">
                                Pengumuman Penelitian dan Pengabdian Kepada Masyarakat <br> Politeknik Penerbangan Palembang
                            </h6>
                        </div>
                        <br>
                        <div class="bg-success card text-white p-3 w-100 mb-2"
                            style="background: grey; border-radius: 20px;">
                            ⚡ Pengumuman Jadwal Pengumpulan Proposal Penelitian Hibah Poltekbang Palembang
                            📅 10-10-2023⚡
                        </div>
                        <div class="card text-white p-3 w-100 mb-2" style="background: grey; border-radius: 20px;">
                            📂 Hasil Seleksi Pendaftaran Penelitian Hibah Poltekbang Palembang
                            📅 09-10-2023
                        </div>
                        <div class="card text-white p-3 w-100 mb-2" style="background: grey; border-radius: 20px;">
                            📂 Pembukaan Pendaftaran Penelitian Hibah Poltekbang Palembang
                            📅 01-10-2023
                        </div>
                        <div class="d-flex justify-content-end">
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li class="page-item m-1 border">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item m-1 border"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item m-1 border"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item m-1 border"><a class="page-link bg-success" href="#">3</a></li>
                                    <li class="page-item m-1 border">
                                        <a class="page-link border" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-lg-6">
                        <div id="lottie-container"></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-2 mb-5">
                            <h2>🎺 Pengumuman</h2>
                            <h6 class="section-subtitle text-muted">
                                Pengumuman Penelitian dan Pengabdian Kepada Masyarakat Politeknik Penerbangan Palembang
                            </h6>
                        </div>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped mt-4" width="100%">
                                <thead>
                                    <tr>
                                        <th class="bg-info text-white">Pengumuman</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Pembukaan Pendaftaran Penelitian Hibah Poltekbang Palembang
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Pengumuman Hasil Seleksi Judul Penelitian Poltekbang Palembang
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> --}}
            </section>
        </div>
    </div>
    <br><br>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.4/lottie.min.js"></script>
    <script>
        // Mendapatkan referensi ke elemen container
        const container = document.getElementById('lottie-container');

        // Inisialisasi Lottie
        const animation = lottie.loadAnimation({
            container: container, // Elemen container
            renderer: 'svg', // Pilih renderer yang sesuai (SVG atau Canvas)
            loop: true, // Apakah animasi harus berulang
            autoplay: true, // Apakah animasi harus dimulai secara otomatis
            path: '{{ asset('announcement.json') }}', // Lokasi file JSON animasi Anda
        });
    </script>
@endsection
