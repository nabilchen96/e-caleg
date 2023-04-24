<!--
=========================================================
* Soft UI Design System - v1.0.9
=========================================================

* Product Page:  https://www.creative-tim.com/product/soft-ui-design-system
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="./assets/img/favicon.png" />

    <title>Soft UI Design System by Creative FTim</title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Nucleo Icons -->
    <link href="{{ asset('soft-ui/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('soft-ui/assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('soft-ui/assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- CSS Files -->

    <link id="pagestyle" href="{{ asset('soft-ui/assets/css/soft-design-system.css?v=1.0.9') }}" rel="stylesheet" />
</head>

<body class="index-page">
    <!-- Navbar -->
    <div class="position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light blur shadow position-absolute py-2 start-0 end-0">
                    <div class="container">
                        <a class="navbar-brand py-0" href="{{ url('') }}">
                            <div class="float-left tentang">
                                <div
                                    style="
                      margin-left: 10px;
                      margin-top: auto;
                      margin-bottom: auto;
                    ">
                                    <h5 class="">✈️ AIRPORT LAB</h5>
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
                                    <a href="{{ url('login') }}" class="btn btn-primary"
                                        style="
                        border-radius: 50px;
                        margin-bottom: 5px;
                        margin-top: 5px;
                      ">
                                        🔐 Login
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
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
                            Free & Open Source Web UI Kit built over Bootstrap 5. <br />
                            Join over 1.4 million developers around the world.
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

    <div class="container" style="margin-top: -190px;">
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
                                From buttons, to inputs, navbars, alerts or cards, you are
                                covered
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
                                From buttons, to inputs, navbars, alerts or cards, you are
                                covered
                            </p>
                            <a href="#konten" class="d-flex align-items-center justify-content-center">
                                <button style="border-radius: 25px;" class="btn btn-sm btn-primary nav-link"
                                    id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#mechanic"
                                    type="button" role="tab" aria-controls="nav-contact"
                                    aria-selected="false">Detail</button>
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
                                From buttons, to inputs, navbars, alerts or cards, you are
                                covered
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
                                            url('');
                                        ">
                                        <div class="card-body d-flex align-items-center justify-content-center">
                                            <div class="text-center">
                                                <h2 style="color: white">CONCRETE</h2>
                                                <p class="text-sm text-white">
                                                    From buttons, to inputs, navbars, alerts or cards, you
                                                    are covered
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
                                            url('');
                                        ">
                                        <div class="card-body d-flex align-items-center justify-content-center">
                                            <div class="text-center">
                                                <h2 style="color: white">AGREGATE</h2>
                                                <p class="text-sm text-white">
                                                    From buttons, to inputs, navbars, alerts or cards, you
                                                    are covered
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
                                            url('');
                                        ">
                                        <div class="card-body d-flex align-items-center justify-content-center">
                                            <div class="text-center">
                                                <h2 style="color: white">ASPHALT</h2>
                                                <p class="text-sm text-white">
                                                    From buttons, to inputs, navbars, alerts or cards, you
                                                    are covered
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
                                            url('');
                                        ">
                                        <div class="card-body d-flex align-items-center justify-content-center">
                                            <div class="text-center">
                                                <h2 style="color: white">SOIL</h2>
                                                <p class="text-sm text-white">
                                                    From buttons, to inputs, navbars, alerts or cards, you
                                                    are covered
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
                                        From buttons, to inputs, navbars, alerts or cards, you are
                                        covered
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

    <footer class="footer pt-5 mt-5">
        <hr class="horizontal dark mb-5" />
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-4 ms-auto">
                    <div>
                        <h6 class="text-gradient text-primary font-weight-bolder">
                            Soft UI Design System
                        </h6>
                    </div>
                    <div>
                        <h6 class="mt-3 mb-2 opacity-8">Social</h6>
                        <ul class="d-flex flex-row ms-n3 nav">
                            <li class="nav-item">
                                <a class="nav-link pe-1" href="https://www.facebook.com/CreativeTim/"
                                    target="_blank">
                                    <i class="fab fa-facebook text-lg opacity-8"></i>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link pe-1" href="https://twitter.com/creativetim" target="_blank">
                                    <i class="fab fa-twitter text-lg opacity-8"></i>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link pe-1" href="https://dribbble.com/creativetim" target="_blank">
                                    <i class="fab fa-dribbble text-lg opacity-8"></i>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link pe-1" href="https://github.com/creativetimofficial"
                                    target="_blank">
                                    <i class="fab fa-github text-lg opacity-8"></i>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link pe-1"
                                    href="https://www.youtube.com/channel/UCVyTG4sCw-rOvB9oHkzZD1w" target="_blank">
                                    <i class="fab fa-youtube text-lg opacity-8"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-2 col-sm-6 col-6 mb-4">
                    <div>
                        <h6 class="text-gradient text-primary text-sm">Company</h6>
                        <ul class="flex-column ms-n3 nav">
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/presentation" target="_blank">
                                    About Us
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/templates/free"
                                    target="_blank">
                                    Freebies
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/templates/premium"
                                    target="_blank">
                                    Premium Tools
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/blog" target="_blank">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-2 col-sm-6 col-6 mb-4">
                    <div>
                        <h6 class="text-gradient text-primary text-sm">Resources</h6>
                        <ul class="flex-column ms-n3 nav">
                            <li class="nav-item">
                                <a class="nav-link" href="https://iradesign.io/" target="_blank">
                                    Illustrations
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/bits" target="_blank">
                                    Bits & Snippets
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/affiliates/new"
                                    target="_blank">
                                    Affiliate Program
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-2 col-sm-6 col-6 mb-4">
                    <div>
                        <h6 class="text-gradient text-primary text-sm">Help & Support</h6>
                        <ul class="flex-column ms-n3 nav">
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/contact-us" target="_blank">
                                    Contact Us
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/knowledge-center"
                                    target="_blank">
                                    Knowledge Center
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="https://services.creative-tim.com/?ref=ct-soft-ui-footer"
                                    target="_blank">
                                    Custom Development
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/sponsorships" target="_blank">
                                    Sponsorships
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-2 col-sm-6 col-6 mb-4 me-auto">
                    <div>
                        <h6 class="text-gradient text-primary text-sm">Legal</h6>
                        <ul class="flex-column ms-n3 nav">
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/terms" target="_blank">
                                    Terms &amp; Conditions
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/privacy" target="_blank">
                                    Privacy Policy
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/license" target="_blank">
                                    Licenses (EULA)
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-12">
                    <div class="text-center">
                        <p class="my-4 text-sm">
                            All rights reserved. Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            Soft UI Design System by
                            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--   Core JS Files   -->
    <script src="{{ asset('soft-ui/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('soft-ui/assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('soft-ui/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>

    <!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
    <script src="{{ asset('soft-ui/assets/js/plugins/countup.min.js') }}"></script>

    <script src="{{ asset('soft-ui/assets/js/plugins/choices.min.js') }}"></script>

    <script src="{{ asset('soft-ui/assets/js/plugins/prism.min.js') }}"></script>
    <script src="{{ asset('soft-ui/assets/js/plugins/highlight.min.js') }}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
    <script src="./assets/js/soft-design-system.min.js?v=1.0.9" type="text/javascript"></script>

    <script type="text/javascript">
        if (document.getElementById("state1")) {
            const countUp = new CountUp(
                "state1",
                document.getElementById("state1").getAttribute("countTo")
            );
            if (!countUp.error) {
                countUp.start();
            } else {
                console.error(countUp.error);
            }
        }
        if (document.getElementById("state2")) {
            const countUp1 = new CountUp(
                "state2",
                document.getElementById("state2").getAttribute("countTo")
            );
            if (!countUp1.error) {
                countUp1.start();
            } else {
                console.error(countUp1.error);
            }
        }
        if (document.getElementById("state3")) {
            const countUp2 = new CountUp(
                "state3",
                document.getElementById("state3").getAttribute("countTo")
            );
            if (!countUp2.error) {
                countUp2.start();
            } else {
                console.error(countUp2.error);
            }
        }
    </script>
</body>

</html>
