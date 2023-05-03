@extends('backend.app')
@push('style')
    <link href="{{ asset('bell.css') }}" rel="stylesheet">
@endpush
@section('content')
    @php
        $data_user = Auth::user();
    @endphp

    <div class="row" style="margin-top: -200px;">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold text-white">Dashboard</h3>
                    <h6 class="font-weight-normal mb-0 text-white">Hi, {{ @$data_user->name }}. Welcome back to Smart
                        Material Test</h6>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin transparent">
            <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <a href="{{ url('berat-isi-kasar') }}" style="text-decoration: none; color:white">
                            <div class="card-body">
                                <p class="mb-4">Agregate Kasar @if ($bi_kasar_new)
                                        <sup>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                                            </svg>
                                        </sup>
                                    @endif
                                </p>
                                <p class="fs-30 mb-2">{{ $bi_kasar }}</p>
                                <p>Pengujian Berat Isi</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <a href="{{ url('gradasi-kasar') }}" style="text-decoration: none; color:white">
                            <div class="card-body">
                                <p class="mb-4">Agregate Kasar @if ($gradasi_kasar_new)
                                        <sup>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                                            </svg>
                                        </sup>
                                    @endif
                                </p>
                                <p class="fs-30 mb-2">{{ $gradasi_kasar }}</p>
                                <p>Pengujian Gradasi</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                    <div class="card card-light-blue">
                        <a href="{{ url('kadar-lumpur-halus') }}" style="text-decoration: none; color:white">
                            <div class="card-body">
                                <p class="mb-4">Agregate Halus @if ($kadar_lumpur_halus_new)
                                        <sup>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                                            </svg>
                                        </sup>
                                    @endif
                                </p>
                                <p class="fs-30 mb-2">{{ $kadar_lumpur_halus }}</p>
                                <p>Pengujian Kadar Lumpur</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                    <div class="card card-light-danger">
                        <a href="{{ url('berat-isi-halus') }}" style="text-decoration: none; color:white">
                            <div class="card-body">
                                <p class="mb-4">Agregate Halus @if ($berat_isi_halus_new)
                                        <sup>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                                            </svg>
                                        </sup>
                                    @endif
                                </p>
                                <p class="fs-30 mb-2">{{ $berat_isi_halus }}</p>
                                <p>Pengujian Berat Isi</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin transparent">
            <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <a href="{{ url('ssd-kasar') }}" style="text-decoration: none; color:white">
                            <div class="card-body">
                                <p class="mb-4">Agregate Kasar @if ($ssd_kasar_new)
                                        <sup>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                                            </svg>
                                        </sup>
                                    @endif
                                </p>
                                <p class="fs-30 mb-2">{{ $ssd_kasar }}</p>
                                <p>Pengujian SSD</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <a href="{{ url('los-angeles') }}" style="text-decoration: none; color:white">
                            <div class="card-body">
                                <p class="mb-4">Agregate Kasar @if ($los_angeles_kasar_new)
                                        <sup>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                                            </svg>
                                        </sup>
                                    @endif
                                </p>
                                <p class="fs-30 mb-2">{{ $los_angeles_kasar }}</p>
                                <p>Pengujian Los Angeles</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                    <div class="card card-light-blue">
                        <a href="{{ url('analisa-saringan-halus') }}" style="text-decoration: none; color:white">
                            <div class="card-body">
                                <p class="mb-4">Agregate Halus @if ($analisa_saringan_halus_new)
                                        <sup>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                                            </svg>
                                        </sup>
                                    @endif
                                </p>
                                <p class="fs-30 mb-2">{{ $analisa_saringan_halus }}</p>
                                <p>Pengujian Analisa Saringan</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                    <div class="card card-light-danger">
                        <a href="{{ url('ssd-halus') }}" style="text-decoration: none; color:white">
                            <div class="card-body">
                                <p class="mb-4">Agregate Halus @if ($ssd_halus_new)
                                        <sup>
                                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16"  >
                                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                                          </svg>
                                        </sup>
                                    @endif
                                </p>
                                <p class="fs-30 mb-2">{{ $ssd_halus }}</p>
                                <p>Pengujian SSD</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

    </div>
@endsection
