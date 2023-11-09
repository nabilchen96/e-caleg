<?php

namespace App\Imports;

use App\Models\Calon;
use App\Models\Anggota;
use App\Models\User;
use DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;

class AnggotaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        //WAJIB
        $kelurahan = DB::table('kelurahans')
            ->where('kelurahan', $row['kelurahan'])
            ->first();

        $data = User::updateOrCreate(
            [
                'email' => $row['email']
            ],
            [
                'name' => $row['nama'],
                'role' => $row['status'],
                'password' => Hash::make($row['password']),
                'email' => $row['email'],
            ]
        );

        $calon = DB::table('calons')
            ->where('nama_calon', $row['nama_calon'])
            ->first();

        $tps = DB::table('tps')
            ->where('nama_tps', $row['nama_tps'])
            ->where('id_kelurahan', $kelurahan->id)
            ->first();

        $anggota = DB::table('anggotas')
            ->where('nama', $row['direkrut_oleh'])
            ->first();

        // $date = $row['tanggal_lahir'];
        // dd(date('d-m-y', strtotime($row['tanggal_lahir'])));

        // $date_components = explode('/', $date);
        // $new_date = $date_components[2] . '-' . $date_components[1] . '-' . $date_components[0];

        // dd($new_date);

        if (@$kelurahan && @$calon) {
            Anggota::updateOrCreate(
                [
                    'nama' => $row['nama'],
                    'kode_anggota' => $row['kode_anggota'],
                ],
                [
                    'nama' => $row['nama'],
                    'kode_anggota' => $row['kode_anggota'],
                    'nik' => $row['nik'],
                    'no_hp' => $row['no_hp'],
                    'alamat' => $row['alamat'],
                    'id_kelurahan' => $kelurahan->id,
                    'id_user' => $data->id,
                    'id_calon' => @$calon->id,
                    'id_tps' => @$tps->id,
                    'status' => $row['status'],
                    'tempat_lahir' => $row['tempat_lahir'],
                    'tanggal_lahir' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_lahir']),
                    'id_anggota' => @$anggota->id
                ]
            );
        }
    }
}
