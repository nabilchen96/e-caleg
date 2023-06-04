@extends('frontend.app')
@section('content')
    <header class="header-2">
        <div class="page-header min-vh-100 relative"
            style="
      background-position: bottom;
      background-size: cover;
      background-image: linear-gradient(
          rgba(0, 0, 0, 0.1),
          rgba(0, 0, 0, 0.5)
        ),
        url('{{ asset('airplane.jpg') }}');
    ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 text-center mx-auto">
                        <h1 class="text-white pt-3 mt-n9">Smart Material Test</h1>
                        <p class="lead text-white mt-3">
                            Selamat Datang di Aplikasi Uji Coba Material <br />
                            Politeknik Penerbangan Palembang
                        </p>
                    </div>
                </div>
            </div>

            <div class="position-absolute w-100 z-index-1 bottom-0">
                <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                    <defs>
                        <path id="gentle-wave"
                            d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                    </defs>
                    <g class="moving-waves">
                        <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40" />
                        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)" />
                        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)" />
                        <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)" />
                        <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)" />
                        <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255,0.95" />
                    </g>
                </svg>
            </div>
        </div>
    </header>

    <div class="container" style="margin-top: -230px;">
        <div class="row nav">
            <div class="col-lg-4 mb-4">
                <div class="card z-index-2 mx-auto py-3"
                    style="
          border: none;
          height: 250px;
          background-size: cover;
          background-position: center;
          background-image: linear-gradient(
              rgba(0, 0, 0, 0.5),
              rgba(0, 0, 0, 0.5)
            ),
            url('https://cdn.pixabay.com/photo/2018/01/07/12/44/machine-3067233_960_720.jpg');
        ">
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <div class="text-center">
                            <h2 style="color: white">👷 CIVIL</h2>
                            <p class="text-sm text-white">
                                {{-- From buttons, to inputs, navbars, alerts or cards, you are
                                covered --}}
                            </p>
                            <a href="#konten" class="d-flex align-items-center justify-content-center">
                                <!-- tes -->
                                <button style="border-radius: 25px;" class="btn btn-sm btn-primary nav-link active"
                                    id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#civil" type="button"
                                    role="tab" aria-controls="nav-profile" aria-selected="false">Detail</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card z-index-2 mx-auto py-3"
                    style="
          border: none;
          height: 250px;
          background-size: cover;
          background-position: center;
          background-image: linear-gradient(
              rgba(0, 0, 0, 0.5),
              rgba(0, 0, 0, 0.5)
            ),
            url('https://libapps-au.s3-ap-southeast-2.amazonaws.com/accounts/92824/images/gears-g5607a146f_640.jpg');
        ">
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <div class="text-center">
                            <h2 style="color: white">👨‍🔧 MECHANIC</h2>
                            <p class="text-sm text-white">
                                {{-- From buttons, to inputs, navbars, alerts or cards, you are
                                covered --}}
                            </p>
                            <a href="#konten" class="d-flex align-items-center justify-content-center">
                                <button style="border-radius: 25px;" class="btn btn-sm btn-primary nav-link"
                                    id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#mechanic" type="button"
                                    role="tab" aria-controls="nav-contact" aria-selected="false">Detail</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card z-index-2 mx-auto py-3"
                    style="
          border: none;
          height: 250px;
          background-size: cover;
          background-position: center;
          background-image: linear-gradient(
              rgba(0, 0, 0, 0.5),
              rgba(0, 0, 0, 0.5)
            ),
            url('https://cdn.pixabay.com/photo/2019/05/12/15/07/electric-4198293_960_720.jpg');
        ">
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <div class="text-center">
                            <h2 style="color: white">🔌 ELECTRIC</h2>
                            <p class="text-sm text-white">
                                {{-- From buttons, to inputs, navbars, alerts or cards, you are
                                covered --}}
                            </p>
                            <a href="#konten" class="d-flex align-items-center justify-content-center">
                                <button style="border-radius: 25px;" class="btn btn-sm btn-primary nav-link"
                                    id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#electric" type="button"
                                    role="tab" aria-controls="nav-home" aria-selected="true">Detail</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="konten"></div>
    <div class="tab-content" id="">
        <div class="tab-pane fade show active" id="civil" role="tabpanel" aria-labelledby="nav-home-tab">
            <section class="my-5 py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card z-index-2 mx-auto py-3"
                                        style="
                                        border: none;
                                        height: 250px;
                                        background-size: cover;
                                        background-position: center;
                                        background-image: linear-gradient(
                                            rgba(0, 0, 0, 0.5),
                                            rgba(0, 0, 0, 0.5)
                                        ),
                                        url('https://cdn.pixabay.com/photo/2014/08/05/03/15/bulldozer-410115_1280.jpg');
                                    ">
                                        <div class="card-body d-flex align-items-center justify-content-center">
                                            <div class="text-center">
                                                <h2 style="color: white">PENGUJIAN AGREGATE</h2>
                                                <p class="text-sm text-white">
                                                    {{-- From buttons, to inputs, navbars, alerts or cards, you
                                                    are covered --}}
                                                </p>
                                                <a href="{{ url('agregate') }}"
                                                    class="d-flex align-items-center justify-content-center">
                                                    <button style="border-radius: 25px;"
                                                        class="btn btn-sm btn-primary">Detail</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 mb-4">
                                    <div class="card z-index-2 mx-auto py-3"
                                        style="
                                        border: none;
                                        height: 250px;
                                        background-size: cover;
                                        background-position: center;
                                        background-image: linear-gradient(
                                            rgba(0, 0, 0, 0.5),
                                            rgba(0, 0, 0, 0.5)
                                        ),
                                        url('https://cdn.pixabay.com/photo/2014/08/05/03/15/bulldozer-410115_1280.jpg');
                                    ">
                                        <div class="card-body d-flex align-items-center justify-content-center">
                                            <div class="text-center">
                                                <h2 style="color: white">PENGUJIAN CONCRETE</h2>
                                                <p class="text-sm text-white">
                                                    {{-- From buttons, to inputs, navbars, alerts or cards, you
                                                    are covered --}}
                                                </p>
                                                <a href="{{ url('concrete') }}"
                                                    class="d-flex align-items-center justify-content-center">
                                                    <button style="border-radius: 25px;"
                                                        class="btn btn-sm btn-primary">Detail</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-4">
                                    <div class="card z-index-2 mx-auto py-3"
                                        style="
                                        border: none;
                                        height: 250px;
                                        background-size: cover;
                                        background-position: center;
                                        background-image: linear-gradient(
                                            rgba(0, 0, 0, 0.5),
                                            rgba(0, 0, 0, 0.5)
                                        ),
                                        url('https://cdn.pixabay.com/photo/2014/08/05/03/15/bulldozer-410115_1280.jpg');
                                    ">
                                        <div class="card-body d-flex align-items-center justify-content-center">
                                            <div class="text-center">
                                                <h2 style="color: white">PENGUJIAN ASPHALT</h2>
                                                <p class="text-sm text-white">
                                                    {{-- From buttons, to inputs, navbars, alerts or cards, you
                                                    are covered --}}
                                                </p>
                                                <a href="{{ url('asphalt') }}"
                                                    class="d-flex align-items-center justify-content-center">
                                                    <button style="border-radius: 25px;"
                                                        class="btn btn-sm btn-primary">Detail</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card z-index-2 mx-auto py-3"
                                        style="
                                        border: none;
                                        height: 250px;
                                        background-size: cover;
                                        background-position: center;
                                        background-image: linear-gradient(
                                            rgba(0, 0, 0, 0.5),
                                            rgba(0, 0, 0, 0.5)
                                        ),
                                        url('https://cdn.pixabay.com/photo/2014/08/05/03/15/bulldozer-410115_1280.jpg');
                                    ">
                                        <div class="card-body d-flex align-items-center justify-content-center">
                                            <div class="text-center">
                                                <h2 style="color: white">PENGUJIAN <BR> SOIL</h2>
                                                <p class="text-sm text-white">
                                                    {{-- From buttons, to inputs, navbars, alerts or cards, you
                                                    are covered --}}
                                                </p>
                                                <a href="{{ url('soil') }}"
                                                    class="d-flex align-items-center justify-content-center">
                                                    <button style="border-radius: 25px;"
                                                        class="btn btn-sm btn-primary">Detail</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div style="height: 525px" class="card card-background card-background-mask-primary tilt"
                                data-tilt>
                                <div class="full-background"
                                    style="
                  background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/team-working.jpg');
                ">
                                </div>
                                <div class="card-body pt-7 text-center">
                                    <div class="icon icon-lg up mb-3 mt-3"></div>
                                    <h2 style="color: white">👷 CIVIL</h2>
                                    <p class="text-sm text-white">
                                        {{-- From buttons, to inputs, navbars, alerts or cards, you are
                                        covered --}}
                                        PENGUJIAN CONCRETE, PENGUJIAN AGREGATE, PENGUJIAN ASPHALT, DAN PENGUJIAN SOIL
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="tab-pane fade" id="mechanic" role="tabpanel" aria-labelledby="nav-profile-tab">
            <section class="container py-5 my-5" id="download-soft-ui">
                <div class="bg-gradient-dark position-relative border-radius-xl overflow-hidden">
                    <img src="{{ asset('soft-ui/assets/img/shapes/waves-white.svg') }}" alt="pattern-lines"
                        class="position-absolute start-0 top-md-0 w-100 opacity-6" />
                    <div class="container py-7 postion-relative z-index-2 position-relative">
                        <div class="row">
                            <div class="col-md-7 mx-auto text-center">
                                <h2 style="color: white">👨‍🔧 MECHANIC</h2>
                                <h4 class="text-white">
                                    Sedang dalam tahap pengembangan
                                </h4>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="tab-pane fade" id="electric" role="tabpanel" aria-labelledby="nav-contact-tab">
            <section class="container py-5 my-5" id="download-soft-ui">
                <div class="bg-gradient-dark position-relative border-radius-xl overflow-hidden">
                    <img src="{{ asset('soft-ui/assets/img/shapes/waves-white.svg') }}" alt="pattern-lines"
                        class="position-absolute start-0 top-md-0 w-100 opacity-6" />
                    <div class="container py-7 postion-relative z-index-2 position-relative">
                        <div class="row">
                            <div class="col-md-7 mx-auto text-center">
                                <h2 style="color: white">🔌 ELECTRIC</h2>
                                <h4 class="text-white">
                                    Sedang dalam tahap pengembangan
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
