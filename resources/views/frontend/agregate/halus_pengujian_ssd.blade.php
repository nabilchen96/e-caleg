<?php

    $data = DB::table('pengujian_ssd_agregate_haluses')
                ->select('pengujian_ssd_agregate_haluses.*', 'users.name')
                ->leftJoin('users', 'users.id', 'pengujian_ssd_agregate_haluses.user_id')
                ->where('status_verifikasi', '1')
                ->get();

?>

<div class="table-responsive">
    <table id="myTable" class="table table-striped" style="text-align: center; width: 100%;">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Kode Uji</th>
                <th>Pasir Asal</th>
                <th>Berat Pasir SSD</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $k => $item)                
                <tr>
                    <td>{{ $k+1 }}</td>
                    <td>{{ $item->kode_uji }}</td>
                    <td>{{ $item->pasir_asal }}</td>
                    <td>{{ $item->berat_pasir_ssd }}</td>
                    <td>
                        <a href="/cetak-ssd-halus/{{ $item->id }}" target="_blank">
                            <i style="font-size: 1.5rem;" class="text-warning bi bi-file-pdf"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>