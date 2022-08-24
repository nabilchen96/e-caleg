<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Berita;
use App\Models\Slider;

class WelcomeController extends Controller
{
    public function index(){

        $produk = Produk::join('users', 'users.id', '=', 'produks.id_user')
                    ->select(
                        'users.name', 
                        'produks.*'
                    )
                    ->inRandomOrder()->limit(8)->get();

        $berita = Berita::join('users', 'users.id', '=', 'beritas.id_user')
                    ->select(
                        'users.name', 
                        'beritas.*'
                    )
                    ->inRandomOrder()->limit(4)->get();

        $slider = Slider::limit(3)->get();

        return view('frontend.welcome', [
            'produk'    => $produk, 
            'berita'    => $berita, 
            'slider'    => $slider
        ]);
    }
}
