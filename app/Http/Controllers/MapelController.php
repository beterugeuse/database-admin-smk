<?php

namespace App\Http\Controllers;

use App\Http\Requests\MapelRequest;
use App\Models\Mapel;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mapel = Mapel::latest()->paginate(5);

        return view('mapel.index', compact('mapel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusans = Jurusan::all();

        return view('mapel.create', compact('jurusans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MapelRequest $request)
    {
        Mapel::create([
            'kode_mapel' => $request->kode_mapel,
            'nama_mapel' => $request->nama_mapel,
            'jam_pelajaran' => $request->jam_pelajaran,
            'jurusan_id' => $request->jurusan_id,
        ]);
        return to_route('mata-pelajaran.index')->with('success', 'Mapel berhasil ditambahkan!');
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
        $mapel = Mapel::find($id);
        $jurusans = Jurusan::all();
        return view('mapel.edit', compact('mapel', 'jurusans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MapelRequest $request, Mapel $mapel)
    {
        $data = $request->only(['kode_mapel', 'nama_mapel', 'jam_pelajaran', 'jurusan_id']);
        $mapel->update($data);
        return to_route('mata-pelajaran.index')->with('success', 'Mapel berhasil diupdate!');
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
