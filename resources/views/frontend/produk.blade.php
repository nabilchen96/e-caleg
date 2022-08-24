@extends('frontend.app')
@section('content')
    <div class="shadow"
        style="
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        background-image: linear-gradient(transparent, black),
            url('{{ asset('batik.jpg') }}') !important;
        min-height: 200px;
        ">
        <div class="container px-3 py-4">
            <div class="tentang text-white">
                <div style="margin-top: auto; margin-bottom: auto">
                    <h2>Daftar Produk</h2>
                    Temukan produk terbaik UKM disini
                </div>
                <!-- <img src="shop-illustration.svg" width="300px" alt="" /> -->
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            {{-- daftar produk  --}}
            <h4 class="px-3">Daftar Produk</h4>
            @include('frontend.components.list-produk', ['data' => $produk])

            <div class="mt-4 px-4">
                {{ $produk->links() }}
            </div>
        </div>
    </div>
@endsection
