<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Jurusan;
use App\Http\Resources\JurusanResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class JurusanController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all jurusan
        $jurusans = Jurusan::latest()->paginate(5);

        //return collection of jurusan as a resource
        return new JurusanResource(true, 'List Data Jurusan', $jurusans);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'kode_jurusan'  => 'required',
            'nama_jurusan'  => 'required',
            'deskripsi'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create jurusan
        $jurusan = Jurusan::create([
            'kode_jurusan'  => $request->kode_jurusan,
            'nama_jurusan'  => $request->nama_jurusan,
            'deskripsi'     => $request->deskripsi,
        ]);

        //return response
        return new JurusanResource(true, 'Data Jurusan Berhasil Ditambahkan!', $jurusan);
    }

    public function show($id)
    {
        //find jurusan by ID
        $jurusan = Jurusan::find($id);

        //return single book as a resource
        return new JurusanResource(true, 'Detail Data Jurusan!', $jurusan);
    }

    public function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'kode_jurusan'  => 'required',
            'nama_jurusan'  => 'required',
            'deskripsi'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //find jurusan by ID
        $jurusan = Jurusan::find($id);

        // update jurusan
        $jurusan->update([
            'kode_jurusan'  => $request->kode_jurusan,
            'nama_jurusan'  => $request->nama_jurusan,
            'deskripsi'     => $request->deskripsi,
        ]);

        //return response
        return new JurusanResource(true, 'Data Jurusan Berhasil Diubah!', $jurusan);
    }

    public function destroy($id)
    {

        //find jurusan by ID
        $jurusan = Jurusan::find($id);

        //delete book
        $jurusan->delete();

        //return response
        return new JurusanResource(true, 'Data Jurusan Berhasil Dihapus!', null);
    }

}
