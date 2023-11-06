<table>
    <thead>
        <tr>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                Kelurahan</th>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                Kode Kecamatan</th>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                Kecamatan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->kelurahan }}</td>
                <td>{{ $item->kode_kecamatan }}</td>
                <td>{{ $item->kecamatan }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
