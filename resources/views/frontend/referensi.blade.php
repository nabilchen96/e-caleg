@extends('frontend.app')
@section('content')
    <div class="container" style="margin-top: 100px;">
        <a href="{{ url('/') }}">        
            <h4 class="font-weight-bold mb-3">
                <i class="bi bi-arrow-left"></i>
                Dokumen Referensi
            </h4>
        </a>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped text-center" style="width: 100%;">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Judul</th>
                                <th width="5%">Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $k => $item)
                                <tr>
                                    <td>{{ $k+1 }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>
                                        <a href="{{ $item->link_file }}">📥</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection