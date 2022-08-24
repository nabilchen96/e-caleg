@extends('frontend.app')
@section('content')
    {{-- slider --}}
    <div class="container px-3 mt-4">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1">
                </button>
                @if (@$slider[1]->gambar)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2">
                    </button>
                @endif
                @if (@$slider[2]->gambar)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3">
                    </button>
                @endif
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="{{ $slider[0]->url }}" target="_blank">
                        <div class="card"
                            style="
                                    background-image: url('{{ asset('gambar_slider') }}/{{ $slider[0]->gambar }}');
                                    border-radius: 15px;
                                    aspect-ratio: 1/0.3;
                                    background-size: cover;
                                    background-position: center;"
                            src="" class="d-block w-100" alt="...">
    
                        </div>
                    </a>
                </div>
                @if (@$slider[1]->gambar)
                    <div class="carousel-item">
                        <a href="{{ $slider[1]->url }}" target="_blank">                        
                            <div class="card"
                                style="
                            background-image: url('{{ asset('gambar_slider') }}/{{ $slider[1]->gambar }}');
                            border-radius: 15px;
                            aspect-ratio: 1/0.3;
                            background-size: cover;
                            background-position: center;"
                                src="" class="d-block w-100" alt="...">
    
                            </div>
                        </a>
                    </div>
                @endif
                @if (@$slider[2]->gambar)
                    <div class="carousel-item">
                        <a href="{{ $slider[2]->url }}" target="_blank">                        
                            <div class="card"
                                style="
                            background-image: url('{{ asset('gambar_slider') }}/{{ $slider[2]->gambar }}');
                            border-radius: 15px;
                            aspect-ratio: 1/0.3;
                            background-size: cover;
                            background-position: center;"
                                src="" class="d-block w-100" alt="...">
    
                            </div>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- produk dan berita --}}
    <div class="container mt-5">
        <div class="row">
            {{-- daftar produk --}}
            <h4 class="px-3">Daftar Produk</h4>
            <a class="px-3" style="text-decoration: none;" href="{{ url('produk') }}">
                Lihat Porduk UKM Lainnya
                <i class="bi bi-bag"></i>
            </a>
            @include('frontend.components.list-produk', ['data' => $produk])

            {{-- list berita --}}
            <h4 class="px-4 mt-5">Berita</h4>
            <a class="px-4" style="text-decoration: none;" href="{{ url('berita') }}">
                Lihat Berita Lainnya
                <i class="bi bi-newspaper"></i>
            </a>
            @include('frontend.components.list-berita', ['data' => $berita])
        </div>
    </div>
@endsection
