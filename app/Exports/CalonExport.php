<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;

class CalonExport implements FromView
{

    public function view(): View
    {
        $data = DB::table('calons as c')
                ->join('jadwals as j', 'j.id', '=', 'c.id_jadwal')
                ->join('partais as p', 'p.id', '=', 'c.id_partai')
                ->join('dapils as d', 'd.id', '=', 'c.id_dapil')
                ->select(
                    'c.*', 
                    'p.partai', 
                    'd.dapil', 
                    'd.kabupaten'
                )
                ->where('j.status', 'AKTIF')
                ->get();

        return view('backend.calon.export', [
            'data' => $data
        ]);
    }
}
