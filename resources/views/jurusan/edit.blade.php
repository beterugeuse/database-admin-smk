@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Jurusan: {{ $jurusan->nama_jurusan }}</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('jurusan.update', $jurusan->id) }}" method="POST">
                @csrf
                @method("PUT")

                <div class="row">
                    <div class="col-12">

                        {{-- Input Kode Jurusan --}}
                        <div class="mb-3">
                            <label class="font-weight-bold">Kode Jurusan</label>
                            <input type="text" name="kode_jurusan" class="form-control @error('kode_jurusan') is-invalid @enderror"
                                   value="{{ old('kode_jurusan', $jurusan->kode_jurusan) }}" placeholder="Contoh: RPL">
                            @error('kode_jurusan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Input Nama Jurusan --}}
                        <div class="mb-3">
                            <label class="font-weight-bold">Nama Jurusan</label>
                            <input type="text" name="nama_jurusan" class="form-control @error('nama_jurusan') is-invalid @enderror"
                                   value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}" placeholder="Contoh: Rekayasa Perangkat Lunak">
                            @error('nama_jurusan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Input Deskripsi --}}
                        <div class="mb-3">
                            <label class="font-weight-bold">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                                      rows="4" placeholder="Jelaskan singkat tentang jurusan ini">{{ old('deskripsi', $jurusan->deskripsi) }}</textarea>
                            @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Perbarui Data Jurusan</button>
                    <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">Batal</a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
