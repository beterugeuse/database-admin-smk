<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuruRequest;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::latest()->paginate(10);

        return view('guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuruRequest $request)
    {
        dd($request->all());
        // upload foto
        $image = $request->file('image');
        $image->storeAs('gurus', $image->hashName(), 'public');

        //create guru
        $guru = Guru::create([
            'nip'           => $request->nip,
            'nama_lengkap'  => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'jabatan'       => $request->jabatan,
            'no_telp'       => $request->no_telp,
            'email'         => $request->email,
            'alamat'        => $request->alamat,
            'status_kepegawaian' => $request->status_kepegawaian,
            'image'          => $image->hashName(),
        ]);


        return redirect()->route('guru.index')->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        return view('guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        return view('guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GuruRequest $request, Guru $guru)
    {
        if ($request->hasFile('image')) {

            // upload foto
            $image = $request->file('image');
            $image->storeAs('gurus', $image->hashName(), 'public');

            // delete old foto
            Storage::disk('public')->delete('gurus/' . basename($guru->image));

            // update guru with new foto
            $guru->update([
                'image'          => $image->hashName(),
                'nip'           => $request->nip,
                'nama_lengkap'  => $request->nama_lengkap,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'pendidikan_terakhir' => $request->pendidikan_terakhir,
                'jabatan'       => $request->jabatan,
                'no_telp'       => $request->no_telp,
                'email'         => $request->email,
                'alamat'        => $request->alamat,
                'status_kepegawaian' => $request->status_kepegawaian,
            ]);
        } else {

            // update guru without foto
            $guru->update([
                'nip'           => $request->nip,
                'nama_lengkap'  => $request->nama_lengkap,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'pendidikan_terakhir' => $request->pendidikan_terakhir,
                'jabatan'       => $request->jabatan,
                'no_telp'       => $request->no_telp,
                'email'         => $request->email,
                'alamat'        => $request->alamat,
                'status_kepegawaian' => $request->status_kepegawaian,
            ]);
        }

        return to_route('guru.index')->with('success', 'Data Guru berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        Storage::disk('public')->delete('gurus/' . basename($guru->image));

        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Data Guru berhasil dihapus!');
    }
}
