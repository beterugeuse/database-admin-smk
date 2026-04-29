<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Mapel;
use App\Http\Resources\MapelResource;
use Illuminate\Support\Facades\Validator;

class MapelController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all mapel
        $mapels = Mapel::latest()->paginate(5);

        //return collection of mapel as a resource
        return new MapelResource(true, 'List Data Mapel', $mapels);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'kode_mapel'    => 'required',
            'nama_mapel'    => 'required',
            'jam_pelajaran' => 'required',
            'guru_id'       => 'required|exists:gurus,id',
            'jurusan_id'    => 'required|exists:jurusans,id',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create mapel
        $mapel = Mapel::create([
            'kode_mapel'  => $request->kode_mapel,
            'nama_mapel'  => $request->nama_mapel,
            'jam_pelajaran' => $request->jam_pelajaran,
            'guru_id'     => $request->guru_id,
            'jurusan_id'  => $request->jurusan_id,
        ]);

        //return response
        return new MapelResource(true, 'Data Mapel Berhasil Ditambahkan!', $mapel);
    }

    public function show($id)
    {
        //find jurusan by ID
        $mapel = Mapel::find($id);

        //return single book as a resource
        return new MapelResource(true, 'Detail Data Mata Pelajaran!', $mapel);
    }

    public function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'kode_mapel'    => 'required',
            'nama_mapel'    => 'required',
            'jam_pelajaran' => 'required',
            'guru_id'       => 'required|exists:gurus,id',
            'jurusan_id'    => 'required|exists:jurusans,id',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //find jurusan by ID
        $mapel = Mapel::find($id);

        // update jurusan
        $mapel->update([
            'kode_mapel'  => $request->kode_mapel,
            'nama_mapel'  => $request->nama_mapel,
            'jam_pelajaran' => $request->jam_pelajaran,
            'guru_id'     => $request->guru_id,
            'jurusan_id'  => $request->jurusan_id,
        ]);

        //return response
        return new MapelResource(true, 'Data Mata pelajaran Berhasil Diubah!', $mapel);
    }

    public function destroy($id)
    {

        //find jurusan by ID
        $mapel = Mapel::find($id);

        //delete book
        $mapel->delete();

        //return response
        return new MapelResource(true, 'Data Mata Pelajaran Berhasil Dihapus!', null);
    }

}
