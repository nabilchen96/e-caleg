<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class KalkulatorController extends Controller
{
    public function index(){

        $jk         = request('jenis_kelamin');
        $lari       = request('jarak_lari');
        $pushup     = request('jumlah_push_up');
        $situp      = request('jumlah_sit_up');
        $shuttlerun = request('jumlah_shuttle_run');

        

        return view('kalkulator');
    }
}
