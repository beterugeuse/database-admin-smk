<?php

namespace App\Http\Controllers;

use App\Http\Requests\MataPelajaranRequest;
use App\Models\Guru;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    public function index()
    {
        $mapels = MataPelajaran::with('guru')->paginate(10);
        return view('mapels.index', compact('mapels'));
    }

    public function create()
    {
        $gurus = Guru::orderBy('nama')->get();
        return view('mapels.create', compact('gurus'));
    }

    public function store(MataPelajaranRequest $request)
    {
        MataPelajaran::create([
            'mata_pelajaran' => $request->mata_pelajaran,
            'jurusan' => $request->jurusan,
            'guru_id'  => $request->guru_id,
        ]);

        return to_route('mapels.index')->with('success', 'Data siswa berhasil disimpan!');
    }

    public function edit(MataPelajaran $mapel)
    {
        $gurus = Guru::orderBy('nama')->get();
        return view('mapels.edit', compact('mapel', 'gurus'));
    }

    public function update(MataPelajaranRequest $request, MataPelajaran $mapel)
    {

        $request->validate([
            'mata_pelajaran' => 'required|string|max:100',
            'jurusan'        => 'required|string|max:100',
            'guru_id'        => 'required|exists:gurus,id',
        ]);

        $mapel->update($request->only(['mata_pelajaran', 'jurusan', 'guru_id']));

        return redirect()->route('mapels.index')->with('success', 'Data mata pelajaran berhasil diperbarui.');
    }

    public function destroy(MataPelajaran $mapel)
    {
        $mapel->delete();
        return redirect()->route('mapels.index')->with('success', 'Data mata pelajaran berhasil dihapus.');
    }
}
