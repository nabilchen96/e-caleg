@extends('frontend.app')
@section('content')
    <style>
        .nav-lt-tab .nav-item .nav-link.active {
            border-top: 2.5px solid #624bff;
        }

        .nav {
            /* display: inline-block; */
            overflow: auto;
            overflow-y: hidden;
            max-width: 100%;
            /* margin: 0 0 1em; */
            white-space: nowrap;
        }

        .nav li {
            display: inline-block;
            vertical-align: top;
        }

        .nav-item {
            margin-bottom: 0 !important;
        }

        .nav:hover> ::-webkit-scrollbar-thumb {
            visibility: visible;
        }

        ::-webkit-scrollbar {
            width: 0.5rem;
        }

        .nav .nav-item {
            line-height: 2rem;
        }

        .nav-tabs .nav-link {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            background: aliceblue;
        }
    </style>
    <div class="container mt-8">
        <a href="{{ url('/') }}">
            <h4 class="font-weight-bold mb-3">
                <i class="bi bi-arrow-left"></i>
                Pengujian Agregate
            </h4>
        </a>
        <div class="card">
            <div class="card-body">

                <?php
                $p = @$_GET['p'];
                $sp = @$_GET['sp'];
                ?>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('agregate') }}?p=agregate_kasar" class="nav-link <?php echo $p == '' || $p == 'agregate_kasar' ? 'active' : ''; ?>">Agregate
                            Kasar</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('agregate') }}?p=agregate_halus" class="nav-link <?php echo $p == 'agregate_halus' ? 'active' : ''; ?>">Agregate
                            Halus</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    @if ($p == '' || $p == 'agregate_kasar')
                        <div class="col-lg-12 mt-3 mb-3">
                            <ul class="nav nav-lt-tab" style="border: 0;" role="tablist">
                                <li class="nav-item" style="margin-right: 10px;">
                                    <a href="{{ url('agregate') }}?p=agregate_kasar&sp=berat_isi"
                                        class="btn <?php echo $sp == '' || $sp == 'berat_isi' ? 'btn-primary' : 'btn-info'; ?> btn-sm" style="border-radius: 25px;">Berat Isi</a>
                                    <a href="{{ url('agregate') }}?p=agregate_kasar&sp=pengujian_ssd"
                                        class="btn <?php echo $sp == 'pengujian_ssd' ? 'btn-primary' : 'btn-info'; ?> btn-sm" style="border-radius: 25px;">Pengujian
                                        SSD</a>
                                    <a href="{{ url('agregate') }}?p=agregate_kasar&sp=gradasi"
                                        class="btn <?php echo $sp == 'gradasi' ? 'btn-primary' : 'btn-info'; ?> btn-sm" style="border-radius: 25px;">Gradasi</a>
                                    <a href="{{ url('agregate') }}?p=agregate_kasar&sp=los_angeles"
                                        class="btn <?php echo $sp == 'los_angeles' ? 'btn-primary' : 'btn-info'; ?> btn-sm" style="border-radius: 25px;">Los Angeles</a>
                                </li>
                            </ul>
                        </div>
                    @endif

                    @if ($p == 'agregate_halus')
                        <div class="col-lg-12 mt-3 mb-3">
                            <ul class="nav nav-lt-tab" style="border: 0;" role="tablist">
                                <li class="nav-item" style="margin-right: 10px;">
                                    <a href="{{ url('agregate') }}?p=agregate_halus&sp=berat_isi"
                                        class="btn <?php echo $sp == '' || $sp == 'berat_isi' ? 'btn-primary' : 'btn-info'; ?> btn-sm" style="border-radius: 25px;">Berat Isi</a>
                                    <a href="{{ url('agregate') }}?p=agregate_halus&sp=analisa_saringan"
                                        class="btn <?php echo $sp == 'analisa_saringan' ? 'btn-primary' : 'btn-info'; ?> btn-sm" style="border-radius: 25px;">Analisa
                                        Saringan</a>
                                    <a href="{{ url('agregate') }}?p=agregate_halus&sp=pengujian_ssd"
                                        class="btn <?php echo $sp == 'pengujian_ssd' ? 'btn-primary' : 'btn-info'; ?> btn-sm" style="border-radius: 25px;"
                                        class="btn btn-info btn-sm">Pengujian SSD</a>
                                    <a href="{{ url('agregate') }}?p=agregate_halus&sp=kadar_lumpur"
                                        class="btn <?php echo $sp == 'kadar_lumpur' ? 'btn-primary' : 'btn-info'; ?> btn-sm" style="border-radius: 25px;"
                                        class="btn btn-info btn-sm">Kadar Lumpur</a>
                                </li>
                            </ul>
                        </div>
                    @endif

                    @if ($p == '' || $p == 'agregate_kasar')
                        @if ($sp == '' || $sp == 'berat_isi')
                            @include('frontend.agregate.kasar_berat_isi')
                        @elseif($sp == 'pengujian_ssd')
                            @include('frontend.agregate.pengujian_ssd')
                        @elseif($sp == 'gradasi')
                            @include('frontend.agregate.gradasi')
                        @elseif($sp == 'los_angeles')
                            @include('frontend.agregate.los_angeles')
                        @endif
                    @elseif($p == 'agregate_halus')
                        @if ($sp == '' || $sp == 'berat_isi')
                            @include('frontend.agregate.halus_berat_isi')
                        @elseif($sp == 'analisa_saringan')
                            @include('frontend.agregate.analisa_saringan')
                        @elseif($sp == 'pengujian_ssd')
                            @include('frontend.agregate.halus_pengujian_ssd')
                        @elseif($sp == 'kadar_lumpur')
                            @include('frontend.agregate.kadar_lumpur')
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
