@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <h1 class="mb-4">Tambah Mata Pelajaran</h1>

    <div class="row">
        {{-- Kita batasi lebarnya hanya 6 kolom (setengah layar desktop) --}}
        <div class="col-md-6">
            <form action="{{ route('mapels.store') }}" method="POST">
                @csrf

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

                <div class="mt-4">
                    <button type="submit" class="btn btn-success px-4" style="border-radius: 8px;">
                        <i class="fas fa-save me-1"></i> Simpan
                    </button>
                    <a href="{{ route('mapels.index') }}" class="btn btn-secondary px-4" style="border-radius: 8px;">Batal</a>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
