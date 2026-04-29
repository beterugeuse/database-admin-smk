@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Mata Pelajaran: {{ $mapel->nama_mapel }}</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('mata-pelajaran.update', $mapel) }}" method="POST">
                @csrf
                @method("PUT")

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Kode Mata Pelajaran</label>
                            <input type="text" name="kode_mapel" class="form-control @error('kode_mapel') is-invalid @enderror"
                                   value="{{ old('kode_mapel', $mapel->kode_mapel) }}">
                            @error('kode_mapel') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Nama Mata Pelajaran</label>
                            <input type="text" name="nama_mapel" class="form-control @error('nama_mapel') is-invalid @enderror"
                                   value="{{ old('nama_mapel', $mapel->nama_mapel) }}">
                            @error('nama_mapel') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Jam Pelajaran (Per Minggu)</label>
                            <input type="number" name="jam_pelajaran" class="form-control @error('jam_pelajaran') is-invalid @enderror"
                                   value="{{ old('jam_pelajaran', $mapel->jam_pelajaran) }}">
                            @error('jam_pelajaran') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Guru Pengampu</label>
                            <select name="guru_id" class="form-control @error('guru_id') is-invalid @enderror">
                                @foreach($gurus as $g)
                                    <option value="{{ $g->id }}" {{ old('guru_id', $mapel->guru_id) == $g->id ? 'selected' : '' }}>
                                        {{ $g->nama_lengkap }}
                                    </option>
                                @endforeach
                            </select>
                            @error('guru_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Jurusan</label>
                            <select name="jurusan_id" class="form-control @error('jurusan_id') is-invalid @enderror">
                                @foreach($jurusans as $j)
                                    <option value="{{ $j->id }}" {{ old('jurusan_id', $mapel->jurusan_id) == $j->id ? 'selected' : '' }}>
                                        {{ $j->nama_jurusan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jurusan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Perbarui Data</button>
                    <a href="{{ route('mata-pelajaran.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
