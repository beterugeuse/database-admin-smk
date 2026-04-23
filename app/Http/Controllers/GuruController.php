<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::latest()->paginate(10);
        return view('gurus.index', compact('gurus'));
    }

    public function create()
    {
        return view('gurus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip'     => 'required|string|max:20|unique:gurus,nip',
            'nama'    => 'required|string|max:100',
            'telepon' => 'nullable|string|max:15',
            'alamat'  => 'nullable|string',
        ]);

        Guru::create($request->only(['nip', 'nama', 'telepon', 'alamat']));

        return redirect()->route('gurus.index')->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function edit(Guru $guru)
    {
        return view('gurus.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $data = $request->only(['nip', 'nama', 'telepon', 'alamat']);
        $guru->update($data);
        return to_route('gurus.index')->with('success', 'Data Siswa berhasil diupdate!');
    }

    public function destroy(Guru $guru)
    {
        $guru->delete();
        return redirect()->route('gurus.index')->with('success', 'Data guru berhasil dihapus.');
    }
}
