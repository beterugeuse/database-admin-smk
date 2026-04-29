<?php

namespace App\Http\Controllers;

use App\Http\Requests\MapelRequest;
use App\Models\Mapel;
use App\Models\Jurusan;
use App\Models\Guru;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mapel = Mapel::orderBy('id', 'asc')->paginate(10);
        return view('mapel.index', compact('mapel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusans = Jurusan::all();
        $gurus = Guru::all();

        return view('mapel.create', compact('jurusans', 'gurus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MapelRequest $request)
    {
        Mapel::create([
            'kode_mapel'    => $request->kode_mapel,
            'nama_mapel'    => $request->nama_mapel,
            'jam_pelajaran' => $request->jam_pelajaran,
            'guru_id'       => $request->guru_id,
            'jurusan_id'    => $request->jurusan_id,
        ]);

        return to_route('mata-pelajaran.index')->with('success', 'Data Mapel berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mapel = Mapel::with(['guru', 'jurusan'])->findOrFail($id);

        return view('mapel.show', compact('mapel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mapel $mapel)
    {
        $jurusans = Jurusan::all();
        $gurus = Guru::all();

        return view('mapel.edit', compact('mapel', 'jurusans', 'gurus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MapelRequest $request, Mapel $mapel)
    {
        $mapel->update($request->only([
            'kode_mapel', 'nama_mapel', 'jam_pelajaran', 'guru_id', 'jurusan_id'
        ]));

        return to_route('mata-pelajaran.index')->with('success', 'Data Mapel berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mapel $mapel)
    {
        $mapel->delete();
        return redirect()->route('mata-pelajaran.index')->with('success', 'Data Mapel berhasil dihapus!');
    }
}
