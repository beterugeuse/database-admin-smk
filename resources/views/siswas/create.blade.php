@extends('layouts.admin')
@section('content')
<div class="container-fluid">

<h1>Tambah Siswa</h1>
<form action="{{ route('siswas.store') }}" method="POST">
    @csrf
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
    <div class="mt-4">
        {{-- Tombol sudah diganti teksnya menjadi Simpan --}}
        <button type="submit" class="btn btn-success px-4" style="border-radius: 8px;">
            <i class="fas fa-save me-1"></i> Simpan
        </button>
        <a href="{{ route('siswas.index') }}" class="btn btn-secondary px-4" style="border-radius: 8px;">Batal</a>
    </div>
</form>
</div>
@endsection
