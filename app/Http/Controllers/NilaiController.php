<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Mapel;
use App\Http\Requests\NilaiRequest;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Menampilkan daftar nilai siswa.
     */
    public function index()
    {
        // Mengambil data nilai beserta relasinya
        $nilais = Nilai::with(['siswa.kelas', 'mapel.guru'])->latest()->paginate(5);

        return view('nilais.index', compact('nilais'));
    }

    /**
     * Menampilkan form tambah nilai.
     */
    public function create()
    {
        $siswas = Siswa::with('kelas')->get();
        $mapels = Mapel::with('guru')->get();

        return view('nilais.create', compact('siswas', 'mapels'));
    }

    /**
     * Menyimpan data nilai baru.
     */
    public function store(NilaiRequest $request)
    {
        $data = $request->validated();

        // Logika: Hitung Nilai Akhir otomatis (Rata-rata UTS & UAS)
        $data['nilai_akhir'] = ($request->nilai_uts + $request->nilai_uas) / 2;

        Nilai::create($data);

        return to_route('nilai.index')->with('success', 'Nilai siswa berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail nilai tertentu.
     */
    public function show(string $id)
    {
        $nilai = Nilai::with(['siswa.kelas', 'mapel.guru'])->find($id);
        return view('nilais.show', compact('nilai'));
    }

    /**
     * Menampilkan form edit nilai.
     */
    public function edit(Nilai $nilai)
    {
        $siswas = Siswa::all();
        $mapels = Mapel::all();

        return view('nilais.edit', compact('nilai', 'siswas', 'mapels'));
    }

    /**
     * Memperbarui data nilai.
     */
    public function update(NilaiRequest $request, Nilai $nilai)
    {
        $data = $request->validated();

        // Update hitungan Nilai Akhir jika UTS/UAS berubah
        $data['nilai_akhir'] = ($request->nilai_uts + $request->nilai_uas) / 2;

        $data['nilai_akhir'] = ($data['nilai_uts'] + $data['nilai_uas']) / 2;
        $nilai->update($data);
        return to_route('nilai.index')->with('success', 'Nilai berhasil diperbarui!');
    }

    /**
     * Menghapus data nilai.
     */
    public function destroy(Nilai $nilai)
    {
        $nilai->delete();

        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil dihapus!');
    }
}
