@extends('layouts.admin')
@section('content')
<div class="container-fluid">

<h1>Edit Data Mapel</h1>
<form action="{{ route('mapels.update', $mapel) }}" method="POST">
    @csrf
    @method("PUT")

    <div class="mb-3">
        <label class="form-label">Mata Pelajaran</label>
        <input type="text" name="mata_pelajaran" class="form-control" value="{{ old('mata_pelajaran') }}" placeholder="Masukkan nama mata pelajaran">
        @error('mata_pelajaran') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Jurusan</label>
        <input type="text" name="jurusan" class="form-control" value="{{ old('jurusan') }}" placeholder="Masukkan jurusan">
        @error('jurusan') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Guru Pengampu</label>
        {{-- form-select akan otomatis mengikuti lebar kolom pembungkusnya --}}
        <select name="guru_id" class="form-select @error('guru_id') is-invalid @enderror">
            <option value="">-- Pilih Guru --</option>
            @foreach($gurus as $guru)
                <option value="{{ $guru->id }}" {{ old('guru_id') == $guru->id ? 'selected' : '' }}>
                    {{ $guru->nama }} ({{ $guru->nip }})
                </option>
            @endforeach
        </select>
        @error('guru_id') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>


    <button class="btn btn-success">Simpan</button>
</form>
</div>
@endsection
