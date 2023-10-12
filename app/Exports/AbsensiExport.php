<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;

class AbsensiExport implements FromView
{

    public $tanggal_awal;
    public $tanggal_akhir;
    public function __construct(string $tanggal_awal, string $tanggal_akhir){

        $this->tanggal_awal = $tanggal_awal;
        $this->tanggal_akhir = $tanggal_akhir;
    }

    public function view(): View
    {
        //jika id pegawai pilihan
        $data = DB::table('absensis')
            ->join('users', 'users.id', '=', 'absensis.id_pegawai')
            ->select(
                'absensis.*',
                'users.name'
            )
            ->whereBetween('absensis.tanggal', [$this->tanggal_awal, $this->tanggal_akhir])
            ->orderBy('created_at', 'DESC')->get();

        return view('backend.absensi.export', [
            'data' => $data
        ]);
    }
}