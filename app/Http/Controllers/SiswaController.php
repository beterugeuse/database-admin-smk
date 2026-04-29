<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaRequest;
use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

            // upload image
            $image = $request->file('image');
            $image->storeAs('siswas', $image->hashName(), 'public');

            // delete old image
            Storage::disk('public')->delete('siswas/' . basename($siswa->image));

            // update siswa with new image
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

        return to_route('siswa.index')->with('success', 'Data Siswa berhasil diupdate!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        Storage::disk('public')->delete('siswas/' . basename($siswa->image));
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data Siswa berhasil dihapus!');
    }
}
