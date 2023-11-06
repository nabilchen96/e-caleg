<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class LaporanDapilExport implements FromView
{
    public function view(): View
    {
        $data = DB::table('calons as c')
            ->leftJoin('suaras as s', 's.id_calon', '=', 'c.id')
            ->leftJoin('partais as p', 'p.id', '=', 'c.id_partai')
            ->leftJoin('dapils as d', 'd.id', '=', 'c.id_dapil')
            ->leftJoin('jadwals as j', 'j.id', '=', 'c.id_jadwal')
            ->select(
                'c.nama_calon',
                'p.partai',
                'd.dapil',
                'd.kabupaten',
                DB::raw('SUM(s.total_suara_sah) as total_suara'),
                DB::raw('(SELECT SUM(tps.max_surat_suara) 
                  FROM tps
                  INNER JOIN kelurahans kl ON tps.id_kelurahan = kl.id
                  INNER JOIN kecamatans k ON kl.id_kecamatan = k.id
                  WHERE k.id_dapil = d.id) as max_suara')
            )
            ->where('j.status', 'AKTIF')
            ->groupBy('c.id', 'd.id')
            ->get();

        return view('backend.laporan_dapil.export', [
            'data' => $data
        ]);
    }
}
