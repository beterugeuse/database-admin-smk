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
            'image'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // 1. Ambil file dari request
        $file = $request->file('image');
    
        // 2. Buat nama unik (ini adalah STRING)
        $nama_file = time() . "_" . $file->getClientOriginalName();
    
        // 3. SIMPAN file fisiknya ke folder public/gurus
        $file->move(public_path('gurus'), $nama_file);


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
            'image'          => $image->hashName(),
        ]);

        //return response
        return new GuruResource(true, 'Data Guru Berhasil Ditambahkan!', $guru);
    }

    public function show(string $id)
    {
        //find guru by ID
        $guru = Guru::find($id);

        //return single book as a resource
        return new GuruResource(true, 'Detail Data Guru!', $guru);
    }

    public function update(Request $request, string $id)
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

        // check if image is not empty
        if ($request->hasFile('image')) {

                // --- PROSES HAPUS FOTO LAMA ---
            if ($guru->image) {
                // Kita ambil nama filenya saja dari URL Accessor
                $nama_file_lama = basename($guru->image); 
                $path_file_lama = public_path('gurus/' . $nama_file_lama);
    
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
            $guru->update([
                'image'         => $nama_file_baru,
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

            // update guru without image
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

            // proses hapus foto dari folder public/gurus
        if ($guru->image) {
            // basename() memotong URL (hasil Accessor) jadi nama file saja
            $nama_file = basename($guru->image); 
            $path_file = public_path('gurus/' . $nama_file);
    
            // cek apakah filenya benar-benar ada di folder sebelum dihapus
            if (File::exists($path_file)) {
                File::delete($path_file);
            }
        }

        //delete guru
        $guru->delete();

        //return response
        return new GuruResource(true, 'Data Guru Berhasil Dihapus!', null);
    }

}
