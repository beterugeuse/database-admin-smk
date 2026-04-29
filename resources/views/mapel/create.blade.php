@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Mata Pelajaran</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('mata-pelajaran.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Kode Mata Pelajaran</label>
                            <input type="text" name="kode_mapel" class="form-control @error('kode_mapel') is-invalid @enderror" value="{{ old('kode_mapel') }}" placeholder="Contoh: MP001">
                            @error('kode_mapel') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Nama Mata Pelajaran</label>
                            <input type="text" name="nama_mapel" class="form-control @error('nama_mapel') is-invalid @enderror" value="{{ old('nama_mapel') }}" placeholder="Contoh: Pemrograman Web">
                            @error('nama_mapel') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Jam Pelajaran (Per Minggu)</label>
                            <input type="number" name="jam_pelajaran" class="form-control @error('jam_pelajaran') is-invalid @enderror" value="{{ old('jam_pelajaran') }}" placeholder="Contoh: 4">
                            @error('jam_pelajaran') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Guru Pengampu</label>
                            <select name="guru_id" class="form-control @error('guru_id') is-invalid @enderror">
                                <option value="">-- Pilih Guru Pengampu --</option>
                                @foreach($gurus as $guru)
                                    <option value="{{ $guru->id }}" {{ old('jurusan_id') == $guru->id ? 'selected' : '' }}>
                                        {{ $guru->nama_lengkap }}
                                    </option>
                                @endforeach
                            </select>
                            @error('guru_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Jurusan</label>
                            <select name="jurusan_id" class="form-control @error('jurusan_id') is-invalid @enderror">
                                <option value="">-- Pilih Jurusan --</option>
                                @foreach($jurusans as $jurusan)
                                    <option value="{{ $jurusan->id }}" {{ old('jurusan_id') == $jurusan->id ? 'selected' : '' }}>
                                        {{ $jurusan->nama_jurusan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jurusan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                    <a href="{{ route('mata-pelajaran.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
