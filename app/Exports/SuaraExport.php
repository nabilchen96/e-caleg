<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class SuaraExport implements FromView
{
    public function view(): View
    {
        $data = DB::table('suaras as s')
            ->leftJoin('calons as c', 'c.id', '=', 's.id_calon')
            ->leftJoin('partais as p', 'p.id', '=', 'c.id_partai')
            ->leftJoin('tps as t', 't.id', '=', 's.id_tps')
            ->leftJoin('kelurahans as k', 'k.id', '=', 't.id_kelurahan')
            ->leftJoin('kecamatans as kc', 'kc.id', '=', 'k.id_kecamatan')
            ->leftJoin('users as u', 'u.id', '=', 's.id_user')
            ->leftJoin('jadwals as j', 'j.id', '=', 's.id_jadwal')
            ->where('j.status', 'AKTIF')
            ->select(
                's.*',
                'c.nama_calon',
                'p.partai',
                't.nama_tps',
                't.max_surat_suara',
                'k.kelurahan',
                'kc.kecamatan',
                'u.name',
            )
            ->orderBy('s.id_calon', 'ASC')
            ->orderBy('t.nama_tps', 'ASC')
            ->orderBy('k.id', 'ASC')
            ->get();

        return view('backend.suara.export', [
            'data' => $data
        ]);
    }
}
