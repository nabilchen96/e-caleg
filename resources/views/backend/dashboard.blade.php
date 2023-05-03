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
                    <h6 class="font-weight-normal mb-0 text-white">Hi, {{ @$data_user->name }}. Welcome back to Smart Material Test</h6>
                </div>
                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin transparent">
            <div class="row">
              <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card card-tale">
                  <a href="{{url('berat-isi-kasar')}}" style="text-decoration: none; color:white">
                  <div class="card-body">
                    <p class="mb-4">Agregate Kasar @if($bi_kasar_new) <sup class="text-warning bi bi-info-circle"></sup> @endif </p>
                    <p class="fs-30 mb-2">{{ $bi_kasar }}</p>
                    <p>Pengujian Berat Isi</p>
                  </div>
                  </a>
                </div>
              </div>
              <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                  <a href="{{url('gradasi-kasar')}}" style="text-decoration: none; color:white">
                  <div class="card-body">
                    <p class="mb-4">Agregate Kasar @if($gradasi_kasar_new) <sup class="text-warning bi bi-info-circle"></sup> @endif</p>
                    <p class="fs-30 mb-2">{{$gradasi_kasar}}</p>
                    <p>Pengujian Gradasi</p>
                  </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                <div class="card card-light-blue">
                  <a href="{{url('kadar-lumpur-halus')}}" style="text-decoration: none; color:white">
                  <div class="card-body">
                    <p class="mb-4">Agregate Halus @if($kadar_lumpur_halus_new) <sup class="text-warning bi bi-info-circle"></sup> @endif</p>
                    <p class="fs-30 mb-2">{{ $kadar_lumpur_halus }}</p>
                    <p>Pengujian Kadar Lumpur</p>
                  </div>
                  </a>
                </div>
              </div>
              <div class="col-md-6 stretch-card transparent">
                <div class="card card-light-danger">
                  <a href="{{url('berat-isi-halus')}}" style="text-decoration: none; color:white">
                  <div class="card-body">
                    <p class="mb-4">Agregate Halus @if($berat_isi_halus_new) <sup class="text-warning bi bi-info-circle"></sup> @endif</p>
                    <p class="fs-30 mb-2">{{$berat_isi_halus}}</p>
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
                <a href="{{url('ssd-kasar')}}" style="text-decoration: none; color:white">
                <div class="card-body">
                  <p class="mb-4">Agregate Kasar @if($ssd_kasar_new) <sup class="text-warning bi bi-info-circle"></sup> @endif</p>
                  <p class="fs-30 mb-2">{{$ssd_kasar}}</p>
                  <p>Pengujian SSD</p>
                </div>
                </a>
              </div>
            </div>
            <div class="col-md-6 mb-4 stretch-card transparent">
              <div class="card card-dark-blue">
                <a href="{{url('los-angeles')}}" style="text-decoration: none; color:white">
                <div class="card-body">
                  <p class="mb-4">Agregate Kasar @if($los_angeles_kasar_new) <sup class="text-warning bi bi-info-circle"></sup> @endif</p>
                  <p class="fs-30 mb-2">{{$los_angeles_kasar}}</p>
                  <p>Pengujian Los Angeles</p>
                </div>
                </a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
              <div class="card card-light-blue">
                <a href="{{url('analisa-saringan-halus')}}" style="text-decoration: none; color:white">
                <div class="card-body">
                  <p class="mb-4">Agregate Halus @if($analisa_saringan_halus_new) <sup class="text-warning bi bi-info-circle"></sup> @endif</p>
                  <p class="fs-30 mb-2">{{$analisa_saringan_halus}}</p>
                  <p>Pengujian Analisa Saringan</p>
                </div>
                </a>
              </div>
            </div>
            <div class="col-md-6 stretch-card transparent">
              <div class="card card-light-danger">
                <a href="{{url('ssd-halus')}}" style="text-decoration: none; color:white">
                <div class="card-body">
                  <p class="mb-4">Agregate Halus @if($ssd_halus_new) <sup class="text-warning bi bi-info-circle"></sup> @endif</p>
                  <p class="fs-30 mb-2">{{$ssd_halus}}</p>
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
