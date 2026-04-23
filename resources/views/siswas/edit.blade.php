@extends('layouts.admin')
@section('content')
<div class="container-fluid">

<h1>Edit Data Siswa</h1>
<form action="{{ route('siswas.update', $siswa) }}" method="POST">
    @csrf
    @method("PUT")

    <div class="mb-3">
        <label>NIS</label>
        <input type="text" name="nis" class="form-control" value="{{ old('nis') }}">
        @error('nis') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
        @error('nama') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Kelas</label>
        <input type="text" name="kelas" class="form-control" value="{{ old('kelas') }}">
        @error('kelas') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Jurusan</label>
        <input type="text" name="jurusan" class="form-control" value="{{ old('jurusan') }}">
        @error('jurusan') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label font-weight-bold">Alamat</label>
        <textarea name="alamat" class="form-control" rows="3">{{ old('alamat') }}</textarea>
        @error('alamat') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <button class="btn btn-success">Simpan</button>
</form>
</div>
@endsection
