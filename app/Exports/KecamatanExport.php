<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;

class KecamatanExport implements FromView
{
    public function view(): View
    {
        $data = DB::table('kecamatans')
                ->join('dapils', 'dapils.id', '=', 'kecamatans.id_dapil')
                ->select(
                    'kecamatans.*', 
                    'dapils.dapil', 
                    'dapils.kabupaten', 
                    'dapils.jumlah_kursi'
                )
                ->get();

        return view('backend.kecamatan.export', [
            'data' => $data
        ]);
    }
}
