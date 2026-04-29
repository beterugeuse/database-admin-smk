<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaRequest;
use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::with('kelas')->latest()->paginate(5);

        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelass = Kelas::all();

        return view('siswa.create', compact('kelass'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SiswaRequest $request)
    {
        // ambil file
        $file = $request->file('image');

        // buat nama unik
        $nama_file = time() . "_" . $file->getClientOriginalName();

        // simpan langsung ke folder public/siswas
        // public_path() akan mengarahkan file ke root_folder/public/gurus
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

        return to_route('siswa.index')->with('success', 'Data siswa berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {

        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Cari data jadwal atau kirim 404 jika tidak ada
        $siswas = Siswa::find($id);

        $kelass = Kelas::all();

        return view('siswa.edit', compact('siswas', 'kelass'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SiswaRequest $request, Siswa $siswa)
    {
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
            $file->move(public_path('siswas'), $nama_file_baru);

            // update siswa with new image
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

        return to_route('siswa.index')->with('success', 'Data Siswa berhasil diupdate!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        // 2. Proses hapus foto dari folder public/gurus
        if ($siswa->image) {
            // basename() memotong URL (hasil Accessor) jadi nama file saja
            $nama_file = basename($siswa->image);
            $path_file = public_path('siswas/' . $nama_file);

            // Cek apakah filenya benar-benar ada di folder sebelum dihapus
            if (File::exists($path_file)) {
                File::delete($path_file);
            }
        }
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data Siswa berhasil dihapus!');
    }
}
