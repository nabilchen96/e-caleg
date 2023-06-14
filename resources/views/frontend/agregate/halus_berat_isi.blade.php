<?php

    $data = DB::table('pengujian_berat_isis')
                ->select('pengujian_berat_isis.*', 'users.name')
                ->leftJoin('users', 'users.id', 'pengujian_berat_isis.user_id')
                ->where('status_verifikasi', '1')
                ->get();

?>

<div class="table-responsive">
    <table id="myTable" class="table table-striped" style="text-align: center; width: 100%;">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Kode Uji</th>
                <th>Berat Pasir</th>
                <th>Berat Satuan Pasir</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $k => $item)                
                <tr>
                    <td>{{ $k+1 }}</td>
                    <td>{{ $item->kode_uji }}</td>
                    <td>{{ @$item->berat_pasir }}</td>
                    <td>{{ @$item->berat_satuan_pasir }}</td>
                    <td>
                        <a href="/cetak-berat-isi-halus/{{ $item->id }}" target="_blank">
                            <i style="font-size: 1.5rem;" class="text-warning bi bi-file-pdf"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>