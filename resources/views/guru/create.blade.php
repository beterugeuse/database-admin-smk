@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Guru</h6>
        </div>
        <div class="card-body">
            {{-- Tambahkan enctype untuk upload foto --}}
            <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>NIP</label>
                            <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip') }}" placeholder="Masukkan NIP">
                            @error('nip') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ old('nama_lengkap') }}" placeholder="Nama beserta gelar">
                            @error('nama_lengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Pendidikan Terakhir</label>
                            <select name="pendidikan_terakhir" class="form-control @error('pendidikan_terakhir') is-invalid @enderror">
                                <option value="">-- Pilih Pendidikan --</option>
                                @foreach(['D3', 'D4', 'S1', 'S2', 'S3'] as $p)
                                    <option value="{{ $p }}" {{ old('pendidikan_terakhir') == $p ? 'selected' : '' }}>{{ $p }}</option>
                                @endforeach
                            </select>
                            @error('pendidikan_terakhir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" value="{{ old('jabatan') }}" placeholder="Contoh: Guru Produktif">
                            @error('jabatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>No. Telepon</label>
                            <input type="text" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" value="{{ old('no_telp') }}" placeholder="08xxx">
                            @error('no_telp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="email@sekolah.sch.id">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Status Kepegawaian</label>
                            <select name="status_kepegawaian" class="form-control @error('status_kepegawaian') is-invalid @enderror">
                                <option value="">-- Pilih Status --</option>
                                @foreach(['PNS', 'PPPK', 'Honorer', 'Tetap', 'Kontrak'] as $s)
                                    <option value="{{ $s }}" {{ old('status_kepegawaian') == $s ? 'selected' : '' }}>{{ $s }}</option>
                                @endforeach
                            </select>
                            @error('status_kepegawaian') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Foto Guru</label>
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">
                            <small class="text-muted">Format: jpg, jpeg, png. Maks: 2MB</small>
                            @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Alamat Lengkap</label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3" placeholder="Alamat rumah sesuai KTP">{{ old('alamat') }}</textarea>
                    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Simpan Data Guru</button>
                    <a href="{{ route('guru.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
