<?php

namespace App\Imports;

use App\Models\Kelurahan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DB;

class KelurahanImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $data = DB::table('kecamatans')
            ->where('kecamatan', $row['kecamatan'])
            ->first();

        // dd($data);

        if($data){
            return Kelurahan::updateOrCreate(
                [
                    'kelurahan' => $row['kelurahan'],
                ],
                [
                    'id_kecamatan' => $data->id,
                    'kelurahan' => $row['kelurahan'],
                ]
            );
        }
    }
}
