<?php

namespace App\Http\Controllers;

use App\Http\Requests\KelasRequest;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Guru;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::orderBy('id', 'asc')->paginate(10);
        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusans = Jurusan::all();
        $gurus = Guru::all();

        return view('kelas.create', compact('jurusans', 'gurus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KelasRequest $request)
    {
        Kelas::create([
            'nama_kelas'    => $request->nama_kelas,
            'tingkat'       => $request->tingkat,
            'tahun_ajaran'  => $request->tahun_ajaran,
            'jurusan_id'    => $request->jurusan_id,
            'wali_kelas_id' => $request->wali_kelas_id,
            'kapasitas'     => $request->kapasitas,
        ]);

        return to_route('kelas.index')->with('success', 'Data kelas berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        $jurusans = Jurusan::all();
        $gurus = Guru::all();

        return view('kelas.edit', compact('kelas', 'jurusans','gurus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KelasRequest $request, Kelas $kelas)
    {
        $data = $request->only(['nama_kelas', 'tingkat', 'tahun_ajaran', 'jurusan_id', 'wali_kelas_id', 'kapasitas']);
        $kelas->update($data);
        return to_route('kelas.index')->with('success', 'Kelas berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect()->route('kelas.index')->with('success', 'Data Kelas berhasil dihapus!');
    }
}
