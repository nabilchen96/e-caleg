<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class LaporanKecamatanExport implements FromView
{
    public function view(): View
    {
        $data = DB::table('suaras as s')
            ->leftJoin('calons as c', 'c.id', '=', 's.id_calon')
            ->leftJoin('partais as p', 'p.id', '=', 'c.id_partai')
            ->leftJoin('jadwals as j', 'j.id', '=', 'c.id_jadwal')
            ->leftJoin('tps as t', 't.id', '=', 's.id_tps')
            ->leftJoin('kelurahans as k', 'k.id', '=', 't.id_kelurahan')
            ->leftJoin('kecamatans as kc', 'kc.id', '=', 'k.id_kecamatan')
            ->leftJoin('dapils as d', 'd.id', '=', 'kc.id_dapil')
            ->select(
                'c.nama_calon',
                'kc.kecamatan',
                'p.partai',
                DB::raw('SUM(s.total_suara_sah) as total_suara'),
                DB::raw('(SELECT SUM(tps.max_surat_suara) 
                  FROM tps
                  INNER JOIN kelurahans kl ON tps.id_kelurahan = kl.id
                  INNER JOIN kecamatans k ON kl.id_kecamatan = k.id
                  WHERE k.id_dapil = d.id AND k.id = kc.id) as max_suara'),
            )
            ->groupBy('k.id', 'c.id')
            ->orderBy('c.id', 'ASC')
            ->orderBy('k.id', 'ASC')
            ->where('j.status', 'AKTIF')
            ->get();

        return view('backend.laporan_kecamatan.export', [
            'data' => $data
        ]);
    }
}
