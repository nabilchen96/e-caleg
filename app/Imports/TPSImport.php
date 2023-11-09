<?php

namespace App\Imports;

use App\Models\TPS;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DB;


class TPSImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $data = DB::table('kelurahans')
            ->where('kelurahan', $row['kelurahan'])
            ->first();

        if(@$data){
            return TPS::updateOrCreate(
                [
                    'kode_tps' => $row['kode_tps'],
                    'nama_tps' => $row['nama_tps'],
                ],
                [
                    'kode_tps' => $row['kode_tps'],
                    'nama_tps' => $row['nama_tps'],
                    'id_kelurahan' => $data->id,
                    'max_surat_suara' => $row['max_surat_suara']
                ]
            );
        }
    }
}
