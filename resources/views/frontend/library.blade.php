@extends('frontend.app')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <section class="features-overview" id="features-section">
                <div class="row">
                    <div class="col-lg-6 mt-4" data-aos="fade-up" data-aos-duration="1200">
                        <div id="lottie-container"></div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1200">
                        <div class="mt-3">
                            <h2>📂 Library</h2>
                            <h6 class="section-subtitle text-muted mb-4">
                                Library Penelitian dan Pengabdian Kepada Masyarakat <br> Politeknik Penerbangan Palembang
                            </h6>
                        </div>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped mt-4" width="100%">
                                <thead>
                                    <tr>
                                        <th class="bg-info text-white">Template</th>
                                        <th width="5%" class="bg-info text-white"></th>
                                    </tr>
                                </thead>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->judul }}</td>
                                        <td>
                                            <a href="{{ asset('file_library') }}/{{ $item->file }}">
                                                <i style="font-size: 1.5rem;" class="bi bi-file-earmark-text"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
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
            path: '{{ asset('skydash/library_3.json') }}', // Lokasi file JSON animasi Anda
        });
    </script>
@endsection
