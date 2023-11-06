<?php

namespace App\Imports;

use App\Models\Suara;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DB;
use Auth;

class SuaraImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        //cek calon
        $calon = DB::table('calons')
            ->join('jadwals', 'jadwals.id', '=', 'calons.id_jadwal')
            ->where('calons.nama_calon', $row['nama_calon'])
            ->where('jadwals.status', 'AKTIF')
            ->select(
                'calons.*',
            )
            ->first();


        //cek tps
        $tps = DB::table('tps')
            ->where('kode_tps', $row['kode_tps'])
            ->where('nama_tps', $row['nama_tps'])
            ->first();


        // dd(@$calon, @$tps);


        if (@$calon && @$tps) {
            return Suara::updateOrCreate(
                [
                    'id_calon' => $calon->id,
                    'id_jadwal' => $calon->id_jadwal,
                    'id_tps' => $tps->id,
                ],
                [
                    'id_calon' => $calon->id,
                    'id_jadwal' => $calon->id_jadwal,
                    'id_tps' => $tps->id,
                    'total_suara_sah' => $row['total_suara_sah'],
                    'total_suara_tidak_sah' => $row['total_suara_tidak_sah'],
                    'id_user' => Auth::id()
                ]
            );
        }

    }
}
