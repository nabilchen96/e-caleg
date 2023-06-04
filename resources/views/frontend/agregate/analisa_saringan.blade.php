<?php

    $data = DB::table('analisa_saringan_haluses')
                ->select('analisa_saringan_haluses.*', 'users.name')
                ->leftJoin('users', 'users.id', 'analisa_saringan_haluses.user_id')
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
                <th>Berat Pasir</th>
                <th>Modulus Halus</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $k => $item)                
                <tr>
                    <td>{{ $k+1 }}</td>
                    <td>{{ $item->kode_uji }}</td>
                    <td>{{ @$item->pasir_asal }}</td>
                    <td>{{ @$item->berat_pasir }}</td>
                    <td>{{ @$item->modulus_halus }}</td>
                    <td>
                        <a href="/cetak-analisa-saringan-halus/{{ $item->id }}" target="_blank">
                            <i style="font-size: 1.5rem;" class="text-warning bi bi-file-pdf"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>