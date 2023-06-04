<?php

    $data = DB::table('pengujian_kadar_lumpurs')
                ->select('pengujian_kadar_lumpurs.*', 'users.name')
                ->leftJoin('users', 'users.id', 'pengujian_kadar_lumpurs.user_id')
                ->where('status_verifikasi', '1')
                ->get();

?>

<div class="table-responsive">
    <table id="myTable" class="table table-striped" style="text-align: center; width: 100%;">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Kode Uji</th>
                <th>Berat Pasir 1</th>
                <th>Berat Pasir 2</th>
                <th>Hasil Kadar Lumpur</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $k => $item)                
                <tr>
                    <td>{{ $k+1 }}</td>
                    <td>{{ $item->kode_uji }}</td>
                    <td>{{ @$item->berat_pasir_1 }}</td>
                    <td>{{ @$item->berat_pasir_2 }}</td>
                    <td>{{ @$item->hasil_kadar_lumpur }}</td>
                    <td></td>
                    <td>
                        <a href="/cetak-kadar-lumpur-halus/{{ $item->id }}" target="_blank">
                            <i style="font-size: 1.5rem;" class="text-warning bi bi-file-pdf"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>