@extends('frontend.app')
@section('content')
    <div class="content-wrapper pt-5">
        <div class="">
            <section class="features-overview" id="features-section">
                <div class="row">
                    <div class="col-lg-2" data-aos="fade-right" data-aos-duration="1500">
                        <br><br><br>
                        <img width="80%" src="{{ asset('hero 1.png')}}" alt="">
                        <br><br><br><br>
                        <img width="80%" src="{{ asset('hero 3.png')}}" alt="">
                    </div>
                    <div class="col-lg-8" data-aos="fade-up" data-aos-duration="1000">
                        <div class="text-center">
                            <h2>📁 Library</h2>
                            <h6 class="section-subtitle text-muted mb-4">
                                Library dan Template Penelitian dan Pengabdian Kepada Masyarakat <br> Politeknik Penerbangan
                                Palembang
                            </h6>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped mt-4" width="100%">
                                <thead>
                                    <tr>
                                        <th class="bg-info text-white">Template</th>
                                        <th width="5%" class="bg-info text-white"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Template Dokumen Proposal
                                        </td>
                                        <td>
                                            <i style="font-size: 1.5rem;" class="bi bi-file-earmark-text"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Template Pengajuan Surat Izin Penelitian
                                        </td>
                                        <td>
                                            <i style="font-size: 1.5rem;" class="bi bi-file-earmark-text"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Template RAB
                                        </td>
                                        <td>
                                            <i style="font-size: 1.5rem;" class="bi bi-file-earmark-text"></i>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-2" data-aos="fade-left" data-aos-duration="1500">
                        <br><br><br>
                        <img width="80%" src="{{ asset('hero 2.png')}}" alt="">
                        <br><br><br><br>
                        <img width="80%" src="{{ asset('hero 4.png')}}" alt="">
                    </div>
                </div>
            </section>
        </div>
    </div>
    <br><br><br><br>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.4/lottie.min.js"></script>
    <script>
        // Mendapatkan referensi ke elemen container
        const container1 = document.getElementById('container-1');
        const container2 = document.getElementById('container-2');

        // Inisialisasi Lottie
        const animation = lottie.loadAnimation({
            container: container1, // Elemen container
            renderer: 'svg', // Pilih renderer yang sesuai (SVG atau Canvas)
            loop: true, // Apakah animasi harus berulang
            autoplay: true, // Apakah animasi harus dimulai secara otomatis
            path: '{{ asset('library_1.json') }}', // Lokasi file JSON animasi Anda
        });

        // Inisialisasi Lottie
        const animation2 = lottie.loadAnimation({
            container: container2, // Elemen container
            renderer: 'svg', // Pilih renderer yang sesuai (SVG atau Canvas)
            loop: true, // Apakah animasi harus berulang
            autoplay: true, // Apakah animasi harus dimulai secara otomatis
            path: '{{ asset('library_2.json') }}', // Lokasi file JSON animasi Anda
        });
    </script>
@endsection
