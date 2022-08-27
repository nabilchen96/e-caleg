<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){

        $tipe = request('tipe');

        if($tipe == 'all') {
            $users  = User::all();
        } else if($tipe == 'peserta') {
            $users = User::where('role','Peserta')->get();
        }

        
        return response()->json([
            'success' => true,
            'message' => 'Get data successfully',
            'data' => $users
        ], 200);
    }
}
