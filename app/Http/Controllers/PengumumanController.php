<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use DB;
use App\Models\Library;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengumumanController extends Controller
{
    public function index()
    {
        return view('backend.pengumuman.index');
    }

    public function data()
    {

        $pengumuman = DB::table('Pengumumen')->orderBy('created_at', 'DESC')->get();

        return response()->json(['data' => $pengumuman]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'judul' => 'required',
        ]);

        $file = $request->file;
        $nama_file = '1' . date('YmdHis.') . $file->extension();
        $file->move('file_library', $nama_file);

        if ($validator->fails()) {

            $data = [
                'responCode' => 0,
                'respon' => $validator->errors()
            ];

        } else {
            $data = Pengumuman::create([
                'judul' => $request->judul,
                'file' => $nama_file,
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
            'id' => 'required',
            'judul' => 'required'
        ]);

        if ($request->file) {
            $file = $request->file;
            $nama_file = '1' . date('YmdHis.') . $file->extension();
            $file->move('file_pengumuman', $nama_file);
        }

        if ($validator->fails()) {
            $data = [
                'responCode' => 0,
                'respon' => $validator->errors()
            ];
        } else {

            $pengumuman = Pengumuman::find($request->id);
            $data = $pengumuman->update([
                'judul' => $request->judul,
                'file' => $nama_file ?? $pengumuman->file
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

        $data = Pengumuman::find($request->id)->delete();

        $data = [
            'responCode' => 1,
            'respon' => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }

    public function frontPengumuman(Request $request)
    {

        $data = Pengumuman::orderBy('created_at', 'DESC')->get();

        return view('frontend.pengumuman', [
            'data' => $data
        ]);
    }
}