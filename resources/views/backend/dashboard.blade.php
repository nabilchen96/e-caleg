@extends('backend.app')
@push('style')
    <link href="{{ asset('bell.css') }}" rel="stylesheet">
@endpush
@section('content')
    @php
        @$data_user = Auth::user();
    @endphp

    <div class="row" style="margin-top: -200px;">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold text-white">Dashboard</h3>
                    <h6 class="font-weight-normal mb-0 text-white">Hi, {{ Auth::user()->name }}. 
                        Welcome back to Sistem Informasi Penelitian dan Pengabdian</h6>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
       
    </div>
@endsection
