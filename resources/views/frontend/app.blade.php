<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistem Informasi Penelitian dan Pengabdian</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/owl-carousel/css/owl.carousel.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/owl-carousel/css/owl.theme.default.css') }} ">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/aos/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="shortcut icon" href="https://poltekbangplg.ac.id/wp-content/uploads/2020/06/favicon.ico"
        type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    @stack('style')
    <style>
        .contact-us .contact-us-bgimage {
            padding: 20px !important;
            border-radius: 15px;
        }

        .card.card-body {
            padding: 0;
        }

        .features-overview .content-header {
            padding: 0;
        }

        .navbar {
            padding: 18px 0;
        }

        .font-weight-semibold {
            padding-top: 50px;
        }

        .img-proporsional {
            float: center;
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .img-proporsional:hover,
        .img-proporsional:focus {
            transform: scale(1.1);
        }

        @media only screen and (max-width: 800px) {
            .card .card-body {
                padding: 0 0 43px 0;
            }

            .sika-map {
                margin-bottom: 30px;
            }

            .sika-map iframe {
                height: 320px;
            }

            .sika-description h1 {
                font-size: 25px;
            }

            .web-title {
                display: none;
            }

            .btn-contact-us {
                margin-left: 0 !important;
            }

            .close-icon {
                margin-right: 20px;
            }

            .kuesioner img {
                display: none;
            }

            .card-kuesioner {
                margin: 20px;
            }

            .detail-news-image {
                height: 250px !important;
            }
        }
    </style>
    <style>
        .timeline {
            /* width: 800px; */
            height: 20px;
            list-style: none;
            text-align: justify;
            margin: 80px auto;
            background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(255, 255, 255, 0)), color-stop(45%, rgba(255, 255, 255, 0)), color-stop(51%, rgba(191, 128, 11, 1)), color-stop(57%, rgba(255, 255, 255, 0)), color-stop(100%, rgba(255, 255, 255, 0)));
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0) 45%, rgba(191, 128, 11, 1) 51%, rgba(255, 255, 255, 0) 57%, rgba(255, 255, 255, 0) 100%);
        }

        .timeline:after {
            display: inline-block;
            content: "";
            width: 100%;
        }

        .timeline li {
            display: inline-block;
            width: 20px;
            height: 20px;
            background: #F2BB13;
            text-align: center;
            line-height: 1.2;
            position: relative;
            border-radius: 50%;
        }

        .timeline li:before {
            display: inline-block;
            content: attr(data-year);
            font-size: 14px;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
        }

        .timeline li:nth-child(odd):before {
            top: -40px;
        }

        .timeline li:nth-child(even):before {
            bottom: -40px;
        }

        .timeline li:after {
            display: inline-block;
            content: attr(data-text);
            font-size: 11px;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .timeline li:nth-child(odd):after {
            bottom: 0;
            margin-bottom: -10px;
            transform: translate(-50%, 100%);
        }

        .timeline li:nth-child(even):after {
            top: 0;
            margin-top: -10px;
            transform: translate(-50%, -100%);
        }
    </style>
</head>

<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
    <header id="header-section">
        <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
            <div class="container" data-aos="fade-down">
                <div class="navbar-brand-wrapper d-flex w-100">
                    <img class="icon-image d-none d-lg-block" src="{{ asset('sipp.png') }}"
                        style="margin-top: -5px; width: 20%;" alt="">
                    <img class="icon-image d-lg-none" src="{{ asset('sipp.png') }}"
                        style="margin-top: -5px; width: 25%;" alt="">
                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="mdi mdi-menu navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-lg-center align-items-start ml-auto right">
                        <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
                            <div class="navbar-collapse-logo">
                                {{-- <img src="{{ asset('frontend/images/Group2.svg') }}" alt=""> --}}
                                <img src="{{ asset('frontend/images/logo.png') }}" style="width: 50%;" alt="">
                            </div>
                            <button class="navbar-toggler close-button" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="close-icon toggle-icon mdi mdi-close navbar-toggler-icon pl-5"></span>
                            </button>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="white-space: nowrap;" href="{{ url('front/jadwal') }}">
                                📅 Jadwal
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="white-space: nowrap;" href="{{ url('front/pengumuman') }}">
                                🎺 Pengumuman
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="white-space: nowrap;" href="{{ url('front/library') }}">
                                📁 Library
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="white-space: nowrap;" href="{{ url('front/aktivitas') }}">
                                👷 Kegiatan PusPPM
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="white-space: nowrap;" href="{{ url('front/kebutuhan_dosen') }}">
                                😼 Kebutuhan Dosen
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')

    <iframe class="embed-responsive"
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15938.708954153537!2d104.6991992!3d-2.9089414!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5e411b86b9a1b4e9!2sPoliteknik%20Penerbangan%20Palembang!5e0!3m2!1sid!2sid!4v1613966893900!5m2!1sid!2sid"
        height="420" title="poltekbangplg" style="border:0" allowfullscreen>
    </iframe>

    <div class="container">
        <section class="contact-details" id="contact-details-section">
            <div class="row text-center text-md-left mt-5">
                <div class="col-12 col-md-6 col-lg-3 grid-margin">
                    <img src="{{ asset('frontend/images/logo.png') }}" width="30%" alt="" class="pb-2">
                    <div class="pt-2">
                        <p class="text-muted m-0">Jl. Adi Sucipto No.3012, Sukodadi, Kec. Sukarami, Palembang, Sumatera
                            Selatan, 30961</p>
                        <p class="text-muted m-0">Email: pusbangkar@poltekbangplg.ac.id</p>
                        <p class="text-muted m-0">Telpon: 0711-410930</p>
                        <p class="text-muted m-0">Fax: 0711-420385</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 grid-margin">
                    <h5 class="pb-2">Sosial Media</h5>
                    <div class="d-flex justify-content-center justify-content-md-start">
                        <a target="_blank" href="https://www.facebook.com/poltekbangplg/"><span
                                class="mdi mdi-facebook"></span></a>
                        <a target="_blank" href="https://twitter.com"><span class="mdi mdi-twitter"></span></a>
                        <a target="_blank" href="https://www.instagram.com/poltekbangplg/"><span
                                class="mdi mdi-instagram"></span></a>
                        <a target="_blank" href="https://www.youtube.com/channel/UC_AW0-niVg52RtQB5NeG34g"><span
                                class="mdi mdi-youtube-play"></span></a>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 grid-margin">
                    <h5 class="pb-2">Akses Akademik</h5>
                    <a target="_blank" href="https://siakad.poltekbangplg.ac.id">
                        <p class="m-0 pt-1 pb-2">Sistem Informasi Akademik</p>
                    </a>
                    <a target="_blank" href="https://feedeer.poltekbangplg.ac.id:8082">
                        <p class="m-0 pt-1 pb-2">Feeder Dikti</p>
                    </a>
                    <a target="_blank" href="http://sister.poltekbangplg.ac.id/auth/login">
                        <p class="m-0 pt-1 pb-2">Sister Dikti</p>
                    </a>
                    <a target="_blank" href="https://e-learning.poltekbangplg.ac.id/">
                        <p class="m-0 pt-1 pb-2">Learning Management System</p>
                    </a>
                    <a target="_blank" href="https://library.poltekbangplg.ac.id/">
                        <p class="m-0 pt-1">Library Management System</p>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-3 grid-margin">
                    <h5 class="pb-2">Akses Aplikasi Lain</h5>
                    <a target="_blank" href="https://sik.dephub.go.id/">
                        <p class="m-0 pt-1 pb-2">Sistem Informasi Kepegawaian</p>
                    </a>
                    <a target="_blank" href="https://esurat.dephub.go.id/site/login">
                        <p class="m-0 pt-1 pb-2">E-persuratan</p>
                    </a>
                    <a target="_blank" href="https://skemaraja.dephub.go.id/">
                        <p class="m-0 pt-1 pb-2">Skemaraja</p>
                    </a>
                    <a target="_blank" href="https://marketing.poltekbangplg.ac.id">
                        <p class="m-0 pt-1 pb-2">E-marketing</p>
                    </a>
                    <a target="_blank" href="https://e-spm.poltekbangplg.ac.id/">
                        <p class="m-0 pt-1">Sistem Penjamin Mutu Internal</p>
                    </a>
                </div>
            </div>
        </section>
        <footer class="border-top">
            <p class="text-center text-muted pt-4">Copyright © <?php echo date('Y'); ?> BAAK Politeknik Penerbangan
                Palembang.
                Developed by<a target="_blank" href="https://www.mustechs.com/" class="px-1">Mustechs</a>All rights
                reserved.</p>
        </footer>
    </div>

    <script src="{{ asset('frontend/vendors/jquery/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('frontend/vendors/bootstrap/bootstrap.min.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="{{ asset('frontend/vendors/owl-carousel/js/owl.carousel.min.js') }}"></script>
    {{-- <script src="{{ asset('frontend/vendors/aos/js/aos.js') }}"></script> --}}
    <script src="{{ asset('frontend/js/landingpage.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js "></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

        $("#myTable").DataTable({
            "ordering": false,
            "pageLength": 4
        })
    </script>
    <script src="https://unpkg.com/axios@0.27.2/dist/axios.min.js"></script>
</body>

</html>
