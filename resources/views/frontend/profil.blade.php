@extends('frontend.app')
@section('content')
    <div class="shadow"
        style="
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
  background-image: linear-gradient(transparent, black),
    url('{{ asset('mountain.png') }}') !important;
  min-height: 200px;
  /* background: #9e9e9e80; */
">
        <div class="container px-4 py-4">
            <div class="row text-white">
                <div class="col-lg-2 col-md-3 my-4">
                    <div class="card bg-white shadow"
                        style="
          width: 100%;
          aspect-ratio: 1 / 1;
          background-position: center;
          background-size: cover;
          background-image: url('{{ asset('foto_profil') }}/{{ $data->foto_profil }}') !important;
        ">
                    </div>
                </div>
                <div class="col-lg-10 col-md-9 my-4">
                    <div>
                        <h4>{{ $data->name }}</h4>
                        <p style="width: 80%">
                            Alamat: {{ $data->alamat }}
                        </p>
                        <p style="width: 80%">
                            {{ $data->deskripsi_toko }}
                        </p>

                        <?php echo $data->wa != null ? '<i class="bi bi-whatsapp"></i> '.$data->wa. ' |' : ''; ?>
                        <?php echo $data->facebook != null ? '<i class="bi bi-facebook"></i> '.$data->facebook. ' |' : ''; ?>
                        <?php echo $data->instagram != null ? '<i class="bi bi-instagram"></i> '.$data->instagram.' |' : ''; ?>
                        <?php echo $data->tiktok != null ? '<i class="bi bi-tiktok"></i> '.$data->tiktok.' |' : ''; ?>
                        <?php echo $data->youtube != null ? '<i class="bi bi-youtube"></i> '.$data->youtube.' |' : ''; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            @include('frontend.components.list-produk', ['data' => $produk ])

            <div class="mt-4 px-4">
                {{ $produk->links() }}
            </div>
        </div>
    </div>
@endsection
