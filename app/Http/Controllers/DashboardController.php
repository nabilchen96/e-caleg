<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $dapil = DB::table('dapils')->count();
        $kecamatan = DB::table('kecamatans')->count();
        $kelurahan = DB::table('kelurahans')->count();
        $partai = DB::table('partais')->count();

        return view('backend.dashboard', [
            'dapil' => $dapil,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
            'partai' => $partai
        ]);
    }

    public function grafikDapil($id_dapil)
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
            ->groupBy('c.id', 'd.id');

        if ($id_dapil != 0) {
            $data = $data->where('d.id', $id_dapil)->get();
        } else {
            $data = $data->get();
        }

        return response()->json(['data' => $data]);
    }

    public function grafikKecamatan($id_calon)
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
            ->where('j.status', 'AKTIF');

        //FILTER
        if ($id_calon) {
            $data = $data->where('c.id', $id_calon)->get();
        } else {
            $data = $data->get();
        }

        return response()->json(['data' => $data]);
    }
}