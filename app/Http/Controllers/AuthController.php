<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Absensi;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login()
    {
        if(Auth::check() == true ) {
            return redirect('dashboard');
        } else {

            return view('frontend.auth.login');
        }

    }

    public function loginProses(Request $request)
    {

        //cek jaringan
        // $response = Http::get('http://api.bigdatacloud.net/data/client-info');
        // $data = $response->json();
        // $ipString = $data['ipString'];
        
        $iplocal = [
            '::1', '127.0.0.1'
        ];

        if(in_array($this->getClientIP(), $iplocal)){
    
            $ipString = file_get_contents("http://ipinfo.io/ip");

            // dd($ipString);
            
        }else{

            $ipString = $this->getClientIP();

            // dd($ipString);
        }

        $jaringan = DB::table('jaringans')
                    ->where('ip', $ipString)
                    ->first();


                    // dd($jaringan);

        $response_data = [
            'responCode' => 0,
            'respon'    => ''
        ];

        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];

        Auth::attempt($data);

        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            $role = Auth::user()->role;

            //cek apakah admin?
            if(Auth::user()->role != 'Admin' && $jaringan){
                $this->storeAbsen();
            }elseif(Auth::user()->role != 'Admin' && !$jaringan){
                $response_data['respon'] = 'Anda Harus Menggunakan Jaringan Kantor Untuk Melakukan Absensi.
                Silahkan Beralih ke Jaringan Kantor Terlebih Dahulu!';
                return response()->json($response_data);
            }

            $response_data = [
                'responCode' => 1,
                'respon'    => $role
            ];

        } else { 

            $response_data['respon'] = 'Username atau password salah!';

        }

        return response()->json($response_data);

    }

    public function register(){

        return view('frontend.auth.register');
    }

    public function registerProses(Request $request){

        $validator = Validator::make($request->all(), [
            'password'   => 'required|min:8',
            'email'      => 'unique:users'
        ]);

        if($validator->fails()){
            
            $data['respon'] = 'Ada kesalahan silahkan ulangi!';

        }else{
            $data = User::create([
                'name'          => $request->name,
                'role'          => 'Pengguna',
                'email'         => $request->email,
                'password'      => Hash::make($request->password)
            ]);

            $data = [
                'responCode'    => 1,
                'respon'        => 'Data Berhasil Didaftarkan!'
            ];

            Auth::attempt([
                'email'     => $request->email, 
                'password'  => $request->password,
            ]);
        }

        return response()->json($data);
    }

    public function storeAbsen(){
        $scan_masuk = '';
        $scan_pulang = '';
        $terlambat = '';
        $pulang_cepat = '';

        //cek jadwal user
        $jadwal = DB::table('jadwals')
                    ->whereDate('tanggal_awal_shift', '<=', date('Y-m-d'))
                    ->whereDate('tanggal_akhir_shift', '>=', date('Y-m-d'))
                    ->where('id_pegawai', Auth::id())
                    ->first();

        //cek shift
        $shift = DB::table('shifts')->where('id', $jadwal->id_shift)->first();

        // dd($jadwal, $shift);

        //tentukan masuk atau pulang
        $sekarang = (date("H:i:s"));
        $awal_masuk = ($shift->awal_masuk);
        $batas_masuk = ($shift->batas_masuk);
        $terlambat_masuk = ($shift->terlambat_masuk);
        $awal_pulang = ($shift->awal_pulang);
        $batas_pulang = ($shift->batas_pulang);

        //jika terjadi penyeberangan hari
        //ini masih harus diperbaiki
        if($batas_masuk < $awal_masuk){

        }else{
            //jika jam scan saat ini lebih besar atau sama dengan dari jam awal masuk
            //dan jam scan saat ini lebih kecil atau sama dengan dari jam batas datang
            if($sekarang >= $awal_masuk && $sekarang <= $batas_masuk){

                
                $scan_masuk = $sekarang;

                //tentukan telat
                if($sekarang > $terlambat_masuk && $sekarang < $batas_masuk){

                    $new_sekarang = new \DateTime($sekarang);
                    $new_terlambat_masuk = new \DateTime($terlambat_masuk);
                    $selisih = $new_sekarang->diff($new_terlambat_masuk);
                    $selisih = $selisih->format('%H:%I:%S');

                    //total jam terlambat
                    $terlambat = $selisih;
                }

            
            //jika jam scan lebih besar atau sama dengan jam awal pulang
            //dan jika jam scan lebih kecil dari batas jam pulang --> hitung pulang tepat

            //atau jika jam scan lebih besar dari batas jam masuk
            //dan jika jam scan lebih kecil dari awal pulang --> hitung pulang cepat
            }elseif($sekarang >= $awal_pulang && $sekarang <= $batas_pulang 
            || $sekarang > $batas_masuk && $sekarang < $awal_pulang){

                $scan_pulang = $sekarang;

                if($sekarang < $awal_pulang){

                    $new_sekarang = new \DateTime($sekarang);
                    $new_awal_pulang = new \DateTime($awal_pulang);
                    $selisih = $new_awal_pulang->diff($new_sekarang);
                    $selisih = $selisih->format('%H:%I:%S');

                    $pulang_cepat = $selisih;

                }
            
            //kondisi diluar itu
            }else{

                // dd('tidak dapat absen diluar waktu');

                return redirect('/absensi');
            }
        }

        
        $cek = DB::table('absensis')
                ->where('id_pegawai', Auth::id())
                ->where('tanggal', date('Y-m-d'))
                ->first();

        
        if($scan_masuk != ''){

            Absensi::updateOrInsert(
                [
                    'id_pegawai'    => Auth::id(),
                    'tanggal'       => date("Y-m-d"),
                ],
                [
                    'id_pegawai'    => Auth::id(), 
                    'tanggal'       => date("Y-m-d"), 
                    'scan_masuk'    => $scan_masuk, 
                    'terlambat'     => $terlambat, 
                ]
            );

        }else{

            Absensi::updateOrInsert(
                [
                    'id_pegawai'    => Auth::id(),
                    'tanggal'       => date("Y-m-d"),
                ],
                [
                    'id_pegawai'    => Auth::id(), 
                    'tanggal'       => date("Y-m-d"), 
                    'scan_pulang'   => $scan_pulang, 
                    'pulang_cepat'  => $pulang_cepat
                ]
            );
        }
    }

    public function getClientIP(){       
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)){
               return  $_SERVER["HTTP_X_FORWARDED_FOR"];  
        }else if (array_key_exists('REMOTE_ADDR', $_SERVER)) { 
               return $_SERVER["REMOTE_ADDR"]; 
        }else if (array_key_exists('HTTP_CLIENT_IP', $_SERVER)) {
               return $_SERVER["HTTP_CLIENT_IP"]; 
        } 
   
        return '';
   }
}
