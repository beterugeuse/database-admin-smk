<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Kelas;
use App\Http\Resources\KelasResource;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all kelas
        $kelas = Kelas::latest()->paginate(5);

        //return collection of mapel as a resource
        return new KelasResource(true, 'List Data Kelas', $kelas);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama_kelas'    => 'required',
            'tingkat'       => 'required',
            'tahun_ajaran'  => 'required',
            'jurusan_id'    => 'required|exists:jurusans,id',
            'wali_kelas_id' => 'required|exists:gurus,id',
            'kapasitas'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create kelas
        $kelas = Kelas::create([
            'nama_kelas'    => $request->nama_kelas,
            'tingkat'       => $request->tingkat,
            'tahun_ajaran'  => $request->tahun_ajaran,
            'jurusan_id'    => $request->jurusan_id,
            'wali_kelas_id' => $request->wali_kelas_id,
            'kapasitas'     => $request->kapasitas,
        ]);

        //return response
        return new KelasResource(true, 'Data Kelas Berhasil Ditambahkan!', $kelas);
    }

    public function show($id)
    {
        //find jurusan by ID
        $kelas = Kelas::find($id);

        //return single book as a resource
        return new KelasResource(true, 'Detail Data Kelas!', $kelas);
    }

    public function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama_kelas'    => 'required',
            'tingkat'       => 'required',
            'tahun_ajaran'  => 'required',
            'jurusan_id'    => 'required|exists:jurusans,id',
            'wali_kelas_id' => 'required|exists:gurus,id',
            'kapasitas'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //find jurusan by ID
        $kelas = Kelas::find($id);

        // update jurusan
        $kelas->update([
            'nama_kelas'    => $request->nama_kelas,
            'tingkat'       => $request->tingkat,
            'tahun_ajaran'  => $request->tahun_ajaran,
            'jurusan_id'    => $request->jurusan_id,
            'wali_kelas_id' => $request->wali_kelas_id,
            'kapasitas'     => $request->kapasitas,
        ]);

        //return response
        return new KelasResource(true, 'Data Kelas Berhasil Diubah!', $kelas);
    }

    public function destroy($id)
    {

        //find jurusan by ID
        $kelas = Kelas::find($id);

        //delete book
        $kelas->delete();

        //return response
        return new KelasResource(true, 'Data Kelas Berhasil Dihapus!', null);
    }

}
