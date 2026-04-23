@extends('layouts.admin')
@section('content')
<div class="container-fluid">

<h1>Edit Data Guru</h1>
<form action="{{ route('gurus.update', $guru) }}" method="POST">
    @csrf
    @method("PUT")
    <div class="mb-3">
        <label>NIP</label>
        <input type="text" name="nip" class="form-control" value="{{ old('nip', $guru->nip) }}">
        @error('nip') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $guru->nama) }}">
        @error('nama') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Telepon</label>
        <input type="text" name="telepon" class="form-control" value="{{ old('telepon', $guru->telepon) }}">
        @error('telepon') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label font-weight-bold">Alamat</label>
        <textarea name="alamat" class="form-control" rows="3">{{ old('alamat', $guru->alamat)}}</textarea>
        @error('alamat') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>
    <button class="btn btn-success">Simpan</button>
</form>
</div>
@endsection
