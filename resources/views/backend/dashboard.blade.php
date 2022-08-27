@extends('backend.app')
@section('content')
    @php
        $data_user = Auth::user();
    @endphp
    <div class="row" style="margin-top: -200px;">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold text-white">Dashboard</h3>
                    <h6 class="font-weight-normal mb-0 text-white">Hi, {{ @$data_user->name }}. Welcome back to Samapta app</h6>
                </div>
                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card tale-bg">
                <div class="card-people mt-auto">
                    <img src="{{ asset('skydash/images/dashboard/people.svg') }}" alt="people">
                    <div class="weather-info">
                        <div class="d-flex">
                            <div>
                                <p>Grup Aktif</p>
                                <h2 class="mb-0 font-weight-normal">
                                    LOREM IPSUM
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin transparent">
            <div class="row">
                <div class="col-md-6 col-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4">Total Peserta <br> Terdaftar</p>
                            <h2 class="mb-2">200</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-6 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p class="mb-4">Total Panitia<br> Terdaftar</p>
                            <h2 class="mb-2">100</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-6 mb-4 mb-lg-0 stretch-card transparent">
                    <div class="card card-light-blue">
                        <div class="card-body">
                            <p class="mb-4">Total Grup<br> Penilaian</p>
                            <h2 class="mb-2">10</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-6 mb-4 mb-lg-0 stretch-card transparent">
                    <div class="card card-light-danger">
                        <div class="card-body">
                            <p class="mb-4">Total Grup <br> Tidak Aktif</p>
                            <h2 class="mb-2"></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
