<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel; //library excel
use App\Exports\UserExport;

class UserController extends Controller
{
    public function index()
    {
        return view('backend.users.index');
    }

    public function data()
    {

        $user = DB::table('users');

        $data_user = Auth::user();
        $user = $user->get();


        return response()->json(['data' => $user]);
    }

    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'email' => 'unique:users'
        ]);

        if ($validator->fails()) {
            $data = [
                'responCode' => 0,
                'respon' => $validator->errors()
            ];
        } else {
            $data = User::create([
                'name' => $request->name,
                'role' => $request->role,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            $data = [
                'responCode' => 1,
                'respon' => 'Data Sukses Ditambah'
            ];
        }

        return response()->json($data);
    }

    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);

        if ($validator->fails()) {
            $data = [
                'responCode' => 0,
                'respon' => $validator->errors()
            ];
        } else {

            $user = User::find($request->id);
            $data = $user->update([
                'name' => $request->name,
                'role' => $request->role,
                'email' => $request->email,
                'password' => $request->password ? Hash::make($request->password) : $user->password
            ]);

            $data = [
                'responCode' => 1,
                'respon' => 'Data Sukses Disimpan'
            ];
        }

        return response()->json($data);
    }

    public function delete(Request $request)
    {

        $data = User::find($request->id)->delete();

        $data = [
            'responCode' => 1,
            'respon' => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }

    public function import(Request $request)
    {

        //melakukan import file
        Excel::import(new UserImport, request()->file('file'));

        //jika berhasil kembali ke halaman sebelumnya
        return back();
    }

    public function export()
    {
        return Excel::download(new UserExport, 'Data_user.xlsx');
    }
}
