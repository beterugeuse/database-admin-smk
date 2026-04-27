<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Guru;
use App\Http\Resources\GuruResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all guru
        $gurus = Guru::latest()->paginate(5);

        //return collection of guru as a resource
        return new GuruResource(true, 'List Data Guru', $gurus);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nip'           => 'required',
            'nama_lengkap'  => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'pendidikan_terakhir' => 'required',
            'jabatan'       => 'required',
            'no_telp'       => 'required',
            'email'         => 'required',
            'alamat'        => 'required',
            'status_kepegawaian' => 'required',
            'foto'          => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // upload foto
        $foto = $request->file('foto');
        $foto->storeAs('public/guru', $foto->hashName());

        //create guru
        $guru = Guru::create([
            'nip'           => $request->nip,
            'nama_lengkap'  => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'jabatan'       => $request->jabatan,
            'no_telp'       => $request->no_telp,
            'email'         => $request->email,
            'alamat'        => $request->alamat,
            'status_kepegawaian' => $request->status_kepegawaian,
            'foto'          => $foto->hashName(),
        ]);

        //return response
        return new GuruResource(true, 'Data Guru Berhasil Ditambahkan!', $guru);
    }

    public function show($id)
    {
        //find guru by ID
        $guru = Guru::find($id);

        //return single book as a resource
        return new GuruResource(true, 'Detail Data Guru!', $guru);
    }

    public function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nip'           => 'required',
            'nama_lengkap'  => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'pendidikan_terakhir' => 'required',
            'jabatan'       => 'required',
            'no_telp'       => 'required',
            'email'         => 'required',
            'alamat'        => 'required',
            'status_kepegawaian' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //find guru by ID
        $guru = Guru::find($id);

        // check if foto is not empty
        if ($request->hasFile('foto')) {

            // upload foto
            $foto = $request->file('foto');
            $foto->storeAs('public/guru/', $foto->hashName());

            // delete old foto
            Storage::delete('public/guru/' . basename($guru->foto));

            // update guru with new foto
            $guru->update([
                'foto'          => $foto->hashName(),
                'nip'           => $request->nip,
                'nama_lengkap'  => $request->nama_lengkap,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'pendidikan_terakhir' => $request->pendidikan_terakhir,
                'jabatan'       => $request->jabatan,
                'no_telp'       => $request->no_telp,
                'email'         => $request->email,
                'alamat'        => $request->alamat,
                'status_kepegawaian' => $request->status_kepegawaian,
            ]);
        } else {

            // update guru without foto
            $guru->update([
                'nip'           => $request->nip,
                'nama_lengkap'  => $request->nama_lengkap,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'pendidikan_terakhir' => $request->pendidikan_terakhir,
                'jabatan'       => $request->jabatan,
                'no_telp'       => $request->no_telp,
                'email'         => $request->email,
                'alamat'        => $request->alamat,
                'status_kepegawaian' => $request->status_kepegawaian,
            ]);
        }

        //return response
        return new GuruResource(true, 'Data Guru Berhasil Diubah!', $guru);
    }

    public function destroy($id)
    {

        //find guru by ID
        $guru = Guru::find($id);

        // delete foto
        Storage::delete('public/guru/' . basename($guru->foto));

        //delete guru
        $guru->delete();

        //return response
        return new GuruResource(true, 'Data Guru Berhasil Dihapus!', null);
    }

}
