@extends('layouts.admin')
@section('content')
<div class="container-fluid">

<h1>Edit Data Jurusan</h1>
<form action="{{ route('jurusan.update', $jurusan) }}" method="POST">
    @csrf
    @method("PUT")
    <div class="mb-3">
        <label>Kode Jurusan</label>
        <input type="text" name="kode_jurusan" class="form-control @error('kode_jurusan') is-invalid @enderror" value="{{ old('kode_jurusan', $jurusan->kode_jurusan) }}" placeholder="Contoh: RPL">
        @error('kode_jurusan') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Nama Jurusan</label>
        <input type="text" name="nama_jurusan" class="form-control @error('nama_jurusan') is-invalid @enderror" value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}" placeholder="Contoh: Rekayasa Perangkat Lunak">
        @error('nama_jurusan') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3" placeholder="Jelaskan singkat tentang jurusan ini">{{ old('deskripsi', $jurusan->deskripsi) }}</textarea>
        @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <button class="btn btn-success">Simpan</button>
</form>
</div>
@endsection
