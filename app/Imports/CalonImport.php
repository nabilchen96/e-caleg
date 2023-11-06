<?php

namespace App\Imports;

use App\Models\Calon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DB;

class CalonImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        //cek dapil
        $dapil = DB::table('dapils')
            ->where('dapil', $row['dapil'])
            ->where('kabupaten', $row['kabupaten'])
            ->first();

        //cek partai
        $partai = DB::table('partais')
            ->where('partai', $row['partai'])
            ->first();

        //Jadwal
        $jadwal = DB::table('jadwals')
            ->where('status', 'AKTIF')
            ->first();

        if (@$dapil && @$partai) {
            return Calon::updateOrCreate(
                [
                    'nama_calon' => $row['nama_calon'],
                    'id_partai' => $partai->id,
                    'id_dapil' => $dapil->id,
                    'id_jadwal' => $jadwal->id
                ],
                [
                    'nama_calon' => $row['nama_calon'],
                    'id_partai' => $partai->id,
                    'id_dapil' => $dapil->id,
                    'id_jadwal' => $jadwal->id
                ]
            );
        }
    }
}
