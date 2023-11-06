<table>
    <thead>
        <tr>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                Kode TPS</th>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                Nama TPS</th>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                Kelurahan / Desa
            </th>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                Kecamatan
            </th>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                Dapil
            </th>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                Kabupaten
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->kode_tps }}</td>
                <td>
                    {{ $item->nama_tps }}
                </td>
                <td>{{ $item->kelurahan }}</td>
                <td>{{ $item->kecamatan }}</td>
                <td>{{ $item->dapil }}</td>
                <td>{{ $item->kabupaten}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
