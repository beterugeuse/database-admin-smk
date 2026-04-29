<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Nilai;
use App\Http\Resources\NilaiResource;
use Illuminate\Support\Facades\Validator;

class NilaiController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all nilai
        $nilai = Nilai::latest()->paginate(5);

        //return collection of nilai as a resource
        return new NilaiResource(true, 'List Data Nilai', $nilai);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'siswa_id'    => 'required|exists:siswas,id',
            'mapel_id'    => 'required|exists:mapels,id',
            'guru_id'     => 'required|exists:gurus,id',
            'nilai_uts'   => 'required|numeric|min:0|max:100',
            'nilai_uas'   => 'required|numeric|min:0|max:100',
            'nilai_akhir' => 'required|numeric|min:0|max:100',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // ambil nilai dari request
        $uts = $request->nilai_uts;
        $uas = $request->nilai_uas;
        // hitung nilai akhir
        $nilai_akhir = ($uts * 0.4) + ($uas * 0.6);

        //create nilai
        $nilai = Nilai::create([
            'siswa_id'    => $request->siswa_id,
            'mapel_id'    => $request->mapel_id,
            'guru_id'     => $request->guru_id,
            'nilai_uts'   => $uts,
            'nilai_uas'   => $uas,
            'nilai_akhir' => $nilai_akhir,
        ]);

        //return response
        return new NilaiResource(true, 'Data Nilai Berhasil Ditambahkan!', $nilai);
    }

    public function show(string $id)
    {
        //find nilai by ID
        $nilai = Nilai::find($id);

        //return single nilai as a resource
        return new NilaiResource(true, 'Detail Data Nilai!', $nilai);
    }

    public function update(Request $request, string $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'siswa_id'    => 'required|exists:siswas,id',
            'mapel_id'    => 'required|exists:mapels,id',
            'guru_id'     => 'required|exists:gurus,id',
            'nilai_uts'   => 'required|numeric|min:0|max:100',
            'nilai_uas'   => 'required|numeric|min:0|max:100',
            'nilai_akhir' => 'required|numeric|min:0|max:100',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //find jurusan by ID
        $nilai = Nilai::find($id);

        // ambil nilai dari request
        $uts = $request->nilai_uts;
        $uas = $request->nilai_uas;
        // hitung nilai akhir
        $nilai_akhir = ($uts * 0.4) + ($uas * 0.6);

        // update jurusan
        $nilai->update([
            'siswa_id'    => $request->siswa_id,
            'mapel_id'    => $request->mapel_id,
            'guru_id'     => $request->guru_id,
            'nilai_uts'   => $uts,
            'nilai_uas'   => $uas,
            'nilai_akhir' => $nilai_akhir,
        ]);

        //return response
        return new NilaiResource(true, 'Data Nilai Berhasil Diubah!', $nilai);
    }

    public function destroy(string $id)
    {

        //find nilai by ID
        $nilai = Nilai::find($id);

        //delete nilai
        $nilai->delete();

        //return response
        return new NilaiResource(true, 'Data Nilai Berhasil Dihapus!', null);
    }

}
