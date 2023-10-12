<table>
    <thead>
        <tr>
            <th width="5%">No</th>
            <th>Pegawai</th>
            <th>Tanggal</th>
            <th>Scan Masuk</th>
            <th>Terlambat</th>
            <th>Scan Pulang</th>
            <th>Pulang Cepat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $k => $item)
            <tr>
                <td>{{ $k + 1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                <td>{{ $item->scan_masuk }}</td>
                <td>{{ $item->terlambat }}</td>
                <td>{{ $item->scan_pulang }}</td>
                <td>{{ $item->pulang_cepat }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
