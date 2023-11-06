<table>
    <thead>
        <tr>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                Nama Calon </th>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                Partai </th>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                Kecamatan</th>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                Suara</th>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                Max Suara
            </th>
            <th
                style="width: 130px; height: 20px; vertical-align: middle !important; border: 1px solid black; background-color: #ED7D31;">
                Persentase
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->nama_calon }}</td>
                <td>{{ $item->partai }}</td>
                <td>{{ $item->kecamatan }}</td>
                <td>{{ $item->total_suara }}</td>
                <td>{{ $item->max_suara }}</td>
                <td>
                    <?php
                    if ($item->max_suara != 0) {
                        echo $percentage = round(($item->total_suara / $item->max_suara) * 100) . '%';
                    } else {
                        echo $percentage = 0; // Atau nilai default lainnya jika diperlukan
                    }
                    ?>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
