<?php

namespace App\Http\Controllers;

use App\Http\Requests\JurusanRequest;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusan = Jurusan::latest()->paginate(5);
        return view('jurusan.index', compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JurusanRequest $request)
    {
        Jurusan::create([
            'kode_jurusan' => $request->kode_jurusan,
            'nama_jurusan' => $request->nama_jurusan,
            'deskripsi'    => $request->deskripsi,
        ]);
        return to_route('jurusan.index')->with('success', 'Jurusan berhasil ditambahkan!');
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
    public function edit(Jurusan $jurusan)
    {
        return view('jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JurusanRequest $request, Jurusan $jurusan)
    {
        $data = $request->only(['kode_jurusan', 'nama_jurusan', 'deskripsi']);
        $jurusan->update($data);
        return to_route('jurusan.index')->with('success', 'Jurusan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();
        return redirect()->route('jurusan.index')->with('success', 'Data Jurusan berhasil dihapus!');
    }
}
