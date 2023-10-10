<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Library;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LibraryController extends Controller
{
    public function index()
    {
        return view('backend.library.index');
    }

    public function data()
    {

        $library = DB::table('libraries');
        $library = $library->get();

        return response()->json(['data' => $library]);
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
            $data = Library::create([
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
            'id'    => 'required',
            'judul' => 'required'
        ]);

        if($request->file){
            $file = $request->file;
            $nama_file = '1' . date('YmdHis.') . $file->extension();
            $file->move('file_library', $nama_file);
        }

        if ($validator->fails()) {
            $data = [
                'responCode' => 0,
                'respon' => $validator->errors()
            ];
        } else {

            $library = Library::find($request->id);
            $data = $library->update([
                'judul' => $request->judul, 
                'file'  => $nama_file ?? $library->file
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

        $data = Library::find($request->id)->delete();

        $data = [
            'responCode' => 1,
            'respon' => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }

    public function frontLibrary(Request $request){

        $data = Library::all();

        return view('frontend.library', [
            'data'  => $data
        ]);
    }
}