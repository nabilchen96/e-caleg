<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;

class KelurahanExport implements FromView
{
    public function view(): View
    {
        $data = DB::table('kelurahans as kl')
                ->join('kecamatans as kc','kc.id','=','kl.id_kecamatan')
                ->get();

        return view('backend.kelurahan.export', [
            'data' => $data
        ]);
    }
}
