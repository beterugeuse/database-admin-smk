<?php

namespace App\Http\Controllers;
use App\Http\Requests\JadwalPelajaranRequest;
use App\Models\JadwalPelajaran;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Guru;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = JadwalPelajaran::latest()->paginate(5);
        return view('jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jadwal = JadwalPelajaran::all();
        $gurus = Guru::all();

        return view('jadwal.create', compact('jadwal', 'gurus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JadwalPelajaranRequest $request)
    {
        JadwalPelajaran::create([
            'kelas_id'    => $request->kelas_id,
            'mapel_id'    => $request->mapel_id,
            'guru_id'     => $request->guru_id,
            'hari'        => $request->hari,
            'jam_mulai'   => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'ruangan'     => $request->ruangan,
        ]);

        return to_route('jadwal-pelajaran.index')->with('success', 'Data Jadwal pelajaran berhasil disimpan!');
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
        return view('jadwal.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JadwalPelajaranRequest $request, JadwalPelajaran $jadwal)
    {
        $data = $request->only(['kelas_id', 'mapel_id', 'guru_id', 'hari','jam_mulai', 'jam_selesai', 'ruangan']);
        $jadwal->update($data);
        return to_route('jadwal-pelajaran.index')->with('success', 'Data jadwal pelajaran berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalPelajaran $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal-pelajaran.index')->with('success', 'Data Jadwal Pelajaran berhasil dihapus!');
    }
}
