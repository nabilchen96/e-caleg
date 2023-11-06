<table>
    <thead>
        <tr>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                Kode Kecamatan</th>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                Kecamatan</th>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                Kabupaten</th>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                Dapil</th>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                Jumlah Kursi
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->kode_kecamatan }}</td>
                <td>{{ $item->kecamatan }}</td>
                <td>{{ $item->kabupaten }}</td>
                <td>{{ $item->dapil }}</td>
                <td>{{ $item->jumlah_kursi }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
