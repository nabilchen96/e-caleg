<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <!-- <link rel="stylesheet" href="assets/css/style.css" /> -->
    <link rel="shortcut icon" href="{{ asset('logosc.png') }}" />
    <title>SUMSEL CRAFTERS</title>
    <style>
        .card {
            border-radius: 10px;
            border: none;
        }

        .tentang {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .judul_produk,
        .judul_berita {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            /* number of lines to show */
            line-clamp: 2;
            -webkit-box-orient: vertical;
            height: 42px;
        }

        .nama_toko {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            /* number of lines to show */
            line-clamp: 1;
            -webkit-box-orient: vertical;
            height: 19px;
        }

        .deskripsi_singkat {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            /* number of lines to show */
            line-clamp: 3;
            -webkit-box-orient: vertical;
            height: 63px;
        }

        .foto_produk,
        .foto_berita {
            border-radius: 10px 10px 0 0;
            object-fit: cover;
            /* aspect-ratio: 1/1; */
            height: 150px;
        }
    </style>
    @stack('style')
</head>

<body style="background-color: #f6f6f6">
    <div style="z-index: 9; position: sticky; top: 0">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
            <div class="container py-2 px-3">
                <a class="navbar-brand py-0" href="{{ url('/') }}">
                    <div class="float-left tentang">
                        <img src="{{ url('logosc.png') }}" height="45" alt="">
                        <div style="margin-left: 10px; margin-top: auto; margin-bottom: auto;">
                            <h6 class="">SUMSEL CRAFTERS</h6>
                        </div>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('/') }}"
                                style="margin-right: 20px">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('produk') }}" style="margin-right: 20px">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('berita') }}" style="margin-right: 20px">Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tentang.html" style="margin-right: 20px">Tentang</a>
                        </li>
                        <li class="nav-item" data-bs-toggle="modal" data-bs-target="#modalcari">
                            <a href="javascript:void(0)" class="btn btn-primary mb-1"
                                style="margin-right: 5px; border-radius: 50px">
                                <i class="bi bi-search"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('login') }}" class="btn btn-primary" style="border-radius: 50px">
                                Login
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="modal fade" id="modalcari" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cari Produk....</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="GET" action="{{ url('produk') }}">
                    {{-- @csrf --}}
                    <div class="modal-body">
                        <input type="text" class="form-control" name="cari" placeholder="Cari Pempek Palembang..." required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i> Cari
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @yield('content')

    <br /><br>
    {{-- maps --}}
    <div class="mt-5" style="min-height: 200px; background: #f6f6f6">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.3829541449463!2d104.7545615152989!3d-2.9910576978216468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b7606b5245b43%3A0xdc206fa2daf3249a!2sKantor%20Walikota%20Palembang!5e0!3m2!1sid!2sid!4v1658304675313!5m2!1sid!2sid"
            width="100%" height="300" style="border: 0" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="text-center py-4">
            Copyright ©2022 All rights reserved | Created By Nabil Sahretech
        </div>
    </div>

    <script src="https://unpkg.com/axios@0.27.2/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
    @stack('script')
</body>

</html>
