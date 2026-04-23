@extends('layouts.admin')
@section('content')
<div class="container-fluid">

<h1>Tambah Guru</h1>
<form action="{{ route('gurus.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>NIP</label>
        <input type="text" name="nip" class="form-control" value="{{ old('nip') }}">
        @error('nip') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
        @error('nama') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Telepon</label>
        <input type="text" name="telepon" class="form-control" value="{{ old('telepon') }}">
        @error('telepon') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label font-weight-bold">Alamat</label>
        <textarea name="alamat" class="form-control" rows="3">{{ old('alamat') }}</textarea>
        @error('alamat') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>
    <div class="mt-4">
        <button type="submit" class="btn btn-success px-4" style="border-radius: 8px;">
            <i class="fas fa-save me-1"></i> Simpan
        </button>
    </div>
</form>
</div>
@endsection
