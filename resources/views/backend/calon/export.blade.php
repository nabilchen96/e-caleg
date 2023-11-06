<table>
    <thead>
        <tr>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                Nama Calon</th>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                Partai</th>
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
                <td>{{ $item->nama_calon }}</td>
                <td>{{ $item->partai }}</td>
                <td>{{ $item->dapil }}</td>
                <td>{{ $item->kabupaten }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
