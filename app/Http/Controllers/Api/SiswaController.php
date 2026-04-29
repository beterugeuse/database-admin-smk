<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Siswa;
use App\Http\Resources\SiswaResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

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

        // 1. Ambil file dari request
        $file = $request->file('image');

        // 2. Buat nama unik (ini adalah STRING)
        $nama_file = time() . "_" . $file->getClientOriginalName();

        // 3. SIMPAN file fisiknya ke folder public/siswas
        $file->move(public_path('siswas'), $nama_file);

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
            'image'         => $nama_file,
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

            // --- PROSES HAPUS FOTO LAMA ---
            if ($siswa->image) {
                // Kita ambil nama filenya saja dari URL Accessor
                $nama_file_lama = basename($siswa->image);
                $path_file_lama = public_path('siswas/' . $nama_file_lama);

                // Hapus file dari folder public/gurus jika ada
                if (File::exists($path_file_lama)) {
                    File::delete($path_file_lama);
                }
            }

            // --- PROSES UPLOAD FOTO BARU ---
            $file = $request->file('image');
            $nama_file_baru = time() . "_" . $file->getClientOriginalName();

            // Pindah ke public/gurus
            $file->move(public_path('gurus'), $nama_file_baru);

            // update guru with new image
            $siswa->update([
                'image'         => $nama_file_baru,
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

        // proses hapus foto dari folder public/gurus
        if ($siswa->image) {
            // basename() memotong URL (hasil Accessor) jadi nama file saja
            $nama_file = basename($siswa->image);
            $path_file = public_path('siswas/' . $nama_file);

            // cek apakah filenya benar-benar ada di folder sebelum dihapus
            if (File::exists($path_file)) {
                File::delete($path_file);
            }
        }

        //delete siswa
        $siswa->delete();

        //return response
        return new SiswaResource(true, 'Data Siswa Berhasil Dihapus!', null);
    }

}
