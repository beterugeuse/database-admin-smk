@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Edit Jadwal Pelajaran: {{ $jadwal->mapel->nama_mapel ?? 'N/A' }} - {{ $jadwal->kelas->nama_kelas ?? 'N/A' }}
            </h6>
        </div>
        <div class="card-body">
            <form action="{{ route('jadwal-pelajaran.update', $jadwal->id) }}" method="POST">
                @csrf
                @method("PUT")

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Pilih Kelas</label>
                            <select name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror">
                                <option value="">-- Pilih Kelas --</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}" {{ old('kelas_id', $jadwalPelajaran->kelas_id) == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kelas_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Mata Pelajaran</label>
                            <select name="mapel_id" class="form-control @error('mapel_id') is-invalid @enderror">
                                <option value="">-- Pilih Mapel --</option>
                                @foreach($mapels as $m)
                                    <option value="{{ $m->id }}" {{ old('mapel_id', $jadwalPelajaran->mapel_id) == $m->id ? 'selected' : '' }}>
                                        {{ $m->nama_mapel }}
                                    </option>
                                @endforeach
                            </select>
                            @error('mapel_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Guru Pengampu</label>
                            <select name="guru_id" class="form-control @error('guru_id') is-invalid @enderror">
                                <option value="">-- Pilih Guru --</option>
                                @foreach($gurus as $g)
                                    <option value="{{ $g->id }}" {{ old('guru_id', $jadwalPelajaran->guru_id) == $g->id ? 'selected' : '' }}>
                                        {{ $g->nama_lengkap }}
                                    </option>
                                @endforeach
                            </select>
                            @error('guru_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    {{-- Kolom Kanan: Waktu dan Tempat --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Hari</label>
                            <select name="hari" class="form-control @error('hari') is-invalid @enderror">
                                @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $h)
                                    <option value="{{ $h }}" {{ old('hari', $jadwalPelajaran->hari) == $h ? 'selected' : '' }}>
                                        {{ $h }}
                                    </option>
                                @endforeach
                            </select>
                            @error('hari') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Jam Mulai</label>
                                    <input type="time" name="jam_mulai" class="form-control @error('jam_mulai') is-invalid @enderror"
                                           value="{{ old('jam_mulai', \Carbon\Carbon::parse($jadwalPelajaran->jam_mulai)->format('H:i')) }}">
                                    @error('jam_mulai') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Jam Selesai</label>
                                    <input type="time" name="jam_selesai" class="form-control @error('jam_selesai') is-invalid @enderror"
                                           value="{{ old('jam_selesai', \Carbon\Carbon::parse($jadwalPelajaran->jam_selesai)->format('H:i')) }}">
                                    @error('jam_selesai') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Ruangan</label>
                            <input type="text" name="ruangan" class="form-control @error('ruangan') is-invalid @enderror"
                                   value="{{ old('ruangan', $jadwalPelajaran->ruangan) }}" placeholder="Contoh: Lab Komputer 1">
                            @error('ruangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan Jadwal</button>
                    <a href="{{ route('jadwal-pelajaran.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
