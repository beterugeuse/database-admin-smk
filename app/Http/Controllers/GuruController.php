<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuruRequest;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::latest()->paginate(10);

        return view('guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuruRequest $request)
    {
        // ambil file
        $file = $request->file('image');

        // buat nama unik
        $nama_file = time() . "_" . $file->getClientOriginalName();

        // simpan langsung ke folder public/gurus
        // public_path() akan mengarahkan file ke root_folder/public/gurus
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
            'image'          => $nama_file,
        ]);


        return redirect()->route('guru.index')->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        return view('guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        return view('guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GuruRequest $request, Guru $guru)
    {
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

            // update guru with new foto
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

        return to_route('guru.index')->with('success', 'Data Guru berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {

        // 2. Proses hapus foto dari folder public/gurus
        if ($guru->image) {
            // basename() memotong URL (hasil Accessor) jadi nama file saja
            $nama_file = basename($guru->image);
            $path_file = public_path('gurus/' . $nama_file);

            // Cek apakah filenya benar-benar ada di folder sebelum dihapus
            if (File::exists($path_file)) {
                File::delete($path_file);
            }
        }

        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Data Guru berhasil dihapus!');
    }
}
