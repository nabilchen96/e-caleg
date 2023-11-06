<table>
    <thead>
        <tr>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                Nama Calon / Partai</th>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                TPS / Kelurahan / Kecamatan</th>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                Suara Sah</th>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                Suara Tidak Sah</th>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                Max Suara
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->nama_calon }} <br> {{ $item->partai }}</td>
                <td>
                    {{ $item->nama_tps }} <br>
                    {{ $item->kelurahan }} / {{ $item->kecamatan }}
                </td>
                <td>{{ $item->total_suara_sah }}</td>
                <td>{{ $item->total_suara_tidak_sah }}</td>
                <td>{{ $item->max_surat_suara }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
