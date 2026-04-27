<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JadwalPelajaran;
use App\Http\Resources\JadwalPelajaranResource;
use Illuminate\Support\Facades\Validator;

class JadwalPelajaranController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all kelas
        $jadwal = JadwalPelajaran::latest()->paginate(5);

        //return collection of mapel as a resource
        return new JadwalPelajaranResource(true, 'List Jadwal Pelajaran Kelas', $jadwal);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'kelas_id'    => 'required|exists:kelas,id',
            'mapel_id'    => 'required|exists:mapels,id',
            'guru_id'     => 'required|exists:gurus,id',
            'hari'        => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'jam_mulai'   => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'ruangan'     => 'required|string|max:50',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create kelas
        $jadwal = JadwalPelajaran::create([
            'kelas_id'    => $request->kelas_id,
            'mapel_id'    => $request->mapel_id,
            'guru_id'     => $request->guru_id,
            'hari'        => $request->hari,
            'jam_mulai'   => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'ruangan'     => $request->ruangan,
        ]);

        //return response
        return new JadwalPelajaranResource(true, 'Data Jadwal Pelajaran Berhasil Ditambahkan!', $jadwal);
    }

    public function show($id)
    {
        //find jurusan by ID
        $jadwal = JadwalPelajaran::find($id);

        //return single book as a resource
        return new JadwalPelajaranResource(true, 'Detail Data Jadwal Pelajaran!', $jadwal);
    }

    public function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'kelas_id'    => 'required|exists:kelas,id',
            'mapel_id'    => 'required|exists:mapels,id',
            'guru_id'     => 'required|exists:gurus,id',
            'hari'        => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'jam_mulai'   => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'ruangan'     => 'required|string|max:50',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //find jurusan by ID
        $jadwal = JadwalPelajaran::find($id);

        // update jadwal
        $jadwal->update([
            'kelas_id'    => $request->kelas_id,
            'mapel_id'    => $request->mapel_id,
            'guru_id'     => $request->guru_id,
            'hari'        => $request->hari,
            'jam_mulai'   => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'ruangan'     => $request->ruangan,
        ]);

        //return response
        return new JadwalPelajaranResource(true, 'Data Jadwal Pelajaran Berhasil Diubah!', $jadwal);
    }

    public function destroy($id)
    {

        //find jurusan by ID
        $jadwal = JadwalPelajaran::find($id);

        //delete book
        $jadwal->delete();

        //return response
        return new JadwalPelajaranResource(true, 'Data Jadwal Pelajaran Berhasil Dihapus!', null);
    }

}
