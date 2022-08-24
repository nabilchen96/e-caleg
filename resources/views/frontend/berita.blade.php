@extends('frontend.app')
@section('content')
    <div class="shadow"
        style="
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-image: linear-gradient(transparent, black),
            url('{{ asset('office.jpg') }}') !important;
            min-height: 200px;
        ">
        <div class="container px-3 py-4">
            <div class="tentang text-white">
                <div style="margin-top: auto; margin-bottom: auto">
                    <h2>Daftar Berita</h2>
                    Temukan informasi dan tips halaman ini
                </div>
                <!-- <img src="shop-illustration.svg" width="300px" alt="" /> -->
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            {{-- list berita --}}
            <h4 class="px-3">Berita</h4>
            @include('frontend.components.list-berita', ['data' => $berita])

        </div>
    </div>
@endsection
