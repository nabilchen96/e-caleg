<?php

namespace App\Imports;

use App\Models\Dapil;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DapilImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return Dapil::updateOrCreate(
            [
                'kabupaten' => $row['kabupaten'],
                'dapil' => $row['dapil']
            ],
            [
                'kabupaten' => $row['kabupaten'],
                'jumlah_kursi' => $row['jumlah_kursi'],
                'dapil' => $row['dapil'],
            ]
        );
    }
}
