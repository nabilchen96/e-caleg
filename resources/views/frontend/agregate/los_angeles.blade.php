<?php

    $data = DB::table('pengujian_los_angeles')
                ->select('pengujian_los_angeles.*', 'users.name')
                ->leftJoin('users', 'users.id', 'pengujian_los_angeles.user_id')
                ->where('status_verifikasi', '1')
                ->get();

?>

<div class="table-responsive">
    <table id="myTable" class="table table-striped" style="text-align: center; width: 100%;">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Kode Uji</th>
                <th>Kerikil Asal</th>
                <th>Gradasi</th>
                <th>Keausan I</th>
                <th>Keausan II</th>
                <th>Total Keausan</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $k => $item)                
                <tr>
                    <td>{{ $k+1 }}</td>
                    <td>{{ $item->kode_uji }}</td>
                    <td>{{ @$item->kerikil_asal }}</td>
                    <td>{{ @$item->gradasi }}</td>
                    <td>{{ @$item->keausan_1 }}</td>
                    <td>{{ @$item->keausan_2 }}</td>
                    <td>{{ @$item->total_keausan }}</td>
                    <td>
                        <a href="/cetak-los-angeles/{{ $item->id }}" target="_blank">
                            <i style="font-size: 1.5rem;" class="text-warning bi bi-file-pdf"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>