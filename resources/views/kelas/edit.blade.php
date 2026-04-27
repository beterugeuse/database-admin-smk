@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Kelas: {{ $kelas->nama_kelas }}</h6>
        </div>
        <div class="card-body">
            {{-- Pastikan route-nya sesuai dengan resource kelas --}}
            <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
                @csrf
                @method("PUT")

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Nama Kelas</label>
                            <input type="text" name="nama_kelas" class="form-control @error('nama_kelas') is-invalid @enderror"
                                   value="{{ old('nama_kelas', $kelas->nama_kelas) }}" placeholder="Contoh: XII RPL 1">
                            @error('nama_kelas') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Tingkat</label>
                            <select name="tingkat" class="form-control @error('tingkat') is-invalid @enderror">
                                @foreach(['10', '11', '12'] as $tkt)
                                    <option value="{{ $tkt }}" {{ old('tingkat', $kelas->tingkat) == $tkt ? 'selected' : '' }}>
                                        {{ $tkt }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tingkat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Tahun Ajaran</label>
                            <input type="text" name="tahun_ajaran" class="form-control @error('tahun_ajaran') is-invalid @enderror"
                                   value="{{ old('tahun_ajaran', $kelas->tahun_ajaran) }}" placeholder="Contoh: 2025/2026">
                            @error('tahun_ajaran') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Jurusan</label>
                            <select name="jurusan_id" class="form-control @error('jurusan_id') is-invalid @enderror">
                                @foreach($jurusans as $j)
                                    <option value="{{ $j->id }}" {{ old('jurusan_id', $kelas->jurusan_id) == $j->id ? 'selected' : '' }}>
                                        {{ $j->nama_jurusan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jurusan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Wali Kelas</label>
                            <select name="wali_kelas_id" class="form-control @error('wali_kelas_id') is-invalid @enderror">
                                @foreach($gurus as $g)
                                    <option value="{{ $g->id }}" {{ old('wali_kelas_id', $kelas->wali_kelas_id) == $g->id ? 'selected' : '' }}>
                                        {{ $g->nama_lengkap }}
                                    </option>
                                @endforeach
                            </select>
                            @error('wali_kelas_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Kapasitas Siswa</label>
                            <input type="number" name="kapasitas" class="form-control @error('kapasitas') is-invalid @enderror"
                                   value="{{ old('kapasitas', $kelas->kapasitas) }}">
                            @error('kapasitas') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Perbarui Data Kelas</button>
                    <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
