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
                  <div class="card-body">
                    <p class="mb-4">Agregate Kasar</p>
                    <p class="fs-30 mb-2">4006</p>
                    <p>Pengujian Berat Isi</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                  <div class="card-body">
                    <p class="mb-4">Agregate Kasar</p>
                    <p class="fs-30 mb-2">61344</p>
                    <p>Pengujian Analisa Saringan</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                <div class="card card-light-blue">
                  <div class="card-body">
                    <p class="mb-4">Agregate Kasar</p>
                    <p class="fs-30 mb-2">34040</p>
                    <p>Pengujian Los Angeles</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 stretch-card transparent">
                <div class="card card-light-danger">
                  <div class="card-body">
                    <p class="mb-4">Agregate Halus</p>
                    <p class="fs-30 mb-2">47033</p>
                    <p>Pengujian Berat Isi</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="col-md-6 grid-margin transparent">
          <div class="row">
            <div class="col-md-6 mb-4 stretch-card transparent">
              <div class="card card-tale">
                <div class="card-body">
                  <p class="mb-4">Agregate Kasar</p>
                  <p class="fs-30 mb-2">4006</p>
                  <p>Pengujian SSD</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-4 stretch-card transparent">
              <div class="card card-dark-blue">
                <div class="card-body">
                  <p class="mb-4">Agregate Kasar</p>
                  <p class="fs-30 mb-2">61344</p>
                  <p>Pengujian Gradasi</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
              <div class="card card-light-blue">
                <div class="card-body">
                  <p class="mb-4">Agregate Halus</p>
                  <p class="fs-30 mb-2">34040</p>
                  <p>Pengujian Analisa Saringan</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 stretch-card transparent">
              <div class="card card-light-danger">
                <div class="card-body">
                  <p class="mb-4">Agregate Halus</p>
                  <p class="fs-30 mb-2">47033</p>
                  <p>Pengujian SSD</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="row">

    </div>
@endsection
