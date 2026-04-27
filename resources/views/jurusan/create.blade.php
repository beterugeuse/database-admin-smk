@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Jurusan</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('jurusan.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Kode Jurusan</label>
                    <input type="text" name="kode_jurusan" class="form-control @error('kode_jurusan') is-invalid @enderror" value="{{ old('kode_jurusan') }}" placeholder="Contoh: RPL">
                    @error('kode_jurusan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label>Nama Jurusan</label>
                    <input type="text" name="nama_jurusan" class="form-control @error('nama_jurusan') is-invalid @enderror" value="{{ old('nama_jurusan') }}" placeholder="Contoh: Rekayasa Perangkat Lunak">
                    @error('nama_jurusan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3" placeholder="Jelaskan singkat tentang jurusan ini">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                    <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
