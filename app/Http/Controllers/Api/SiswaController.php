<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Siswa;
use App\Http\Resources\SiswaResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all guru
        $siswas = Siswa::latest()->paginate(5);

        //return collection of guru as a resource
        return new SiswaResource(true, 'List Data Siswa', $siswas);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nis'           => 'required|string|max:20|unique:siswas,nis',
            'nisn'          => 'required|string|max:20|unique:siswas,nisn',
            'nama_lengkap'  => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'agama'         => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Khonghucu',
            'alamat'        => 'required|string',
            'no_telp'       => 'required|string|max:15',
            'email'         => 'required|email|unique:siswas,email',
            'kelas_id'      => 'required|exists:kelas,id',
            'status'        => 'required|in:Aktif,Alumni,Pindah,Keluar',
            'image'         => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // upload image
        $image = $request->file('image');
        $image->storeAs('siswas', $image->hashName(), 'public');

        //create siswa
        $siswa = Siswa::create([
            'nis'           => $request->nis,
            'nisn'          => $request->nisn,
            'nama_lengkap'  => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama'         => $request->agama,
            'alamat'        => $request->alamat,
            'no_telp'       => $request->no_telp,
            'email'         => $request->email,
            'kelas_id'      => $request->kelas_id,
            'status'        => $request->status,
            'image'         => $image->hashName(),
        ]);

        //return response
        return new SiswaResource(true, 'Data Siswa Berhasil Ditambahkan!', $siswa);
    }

    public function show($id)
    {
        //find guru by ID
        $siswa = Siswa::find($id);

        //return single book as a resource
        return new SiswaResource(true, 'Detail Data Siswa!', $siswa);
    }

    public function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nis'           => 'required|string|max:20|unique:siswas,nis',
            'nisn'          => 'required|string|max:20|unique:siswas,nisn',
            'nama_lengkap'  => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'agama'         => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Khonghucu',
            'alamat'        => 'required|string',
            'no_telp'       => 'required|string|max:15',
            'email'         => 'required|email|unique:siswas,email',
            'kelas_id'      => 'required|exists:kelas,id',
            'status'        => 'required|in:Aktif,Alumni,Pindah,Keluar',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //find guru by ID
        $siswa = Siswa::find($id);

        // check if image is not empty
        if ($request->hasFile('image')) {

            // upload image
            $image = $request->file('image');
            $image->storeAs('siswas', $image->hashName(), 'public');

            // delete old image
            Storage::disk('public')->delete('gurus/' . basename($siswa->image));

            // update guru with new image
            $siswa->update([
                'image'         => $image->hashName(),
                'nis'           => $request->nis,
                'nisn'          => $request->nisn,
                'nama_lengkap'  => $request->nama_lengkap,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'agama'         => $request->agama,
                'alamat'        => $request->alamat,
                'no_telp'       => $request->no_telp,
                'email'         => $request->email,
                'kelas_id'      => $request->kelas_id,
                'status'        => $request->status,
            ]);

        } else {

            // update siswa without image
            $siswa->update([
                'nis'           => $request->nis,
                'nisn'          => $request->nisn,
                'nama_lengkap'  => $request->nama_lengkap,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'agama'         => $request->agama,
                'alamat'        => $request->alamat,
                'no_telp'       => $request->no_telp,
                'email'         => $request->email,
                'kelas_id'      => $request->kelas_id,
                'status'        => $request->status,
            ]);
        }

        //return response
        return new SiswaResource(true, 'Data Siswa Berhasil Diubah!', $siswa);
    }

    public function destroy($id)
    {

        //find siswa by ID
        $siswa = Siswa::find($id);

        // delete image
        Storage::disk('public')->delete('siswas/' . basename($siswa->image));

        //delete siswa
        $siswa->delete();

        //return response
        return new SiswaResource(true, 'Data Siswa Berhasil Dihapus!', null);
    }

}
