<?php

namespace App\Imports;

use App\Models\Kecamatan;
use DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KecamatanImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $cek = DB::table('dapils')
            ->where('dapil', $row['dapil'])
            ->where('kabupaten', $row['kabupaten'])
            ->first();

        // dd($cek);

        if (@$cek) {
            return Kecamatan::updateOrCreate(
                [
                    'kecamatan' => $row['kecamatan'],
                    'kode_kecamatan' => $row['kode_kecamatan'],
                ],
                [
                    'kecamatan' => $row['kecamatan'],
                    'kode_kecamatan' => $row['kode_kecamatan'],
                    'jumlah_dpt' => $row['jumlah_dpt'],
                    'id_dapil' => $cek->id
                ]
            );
        }
    }
}
