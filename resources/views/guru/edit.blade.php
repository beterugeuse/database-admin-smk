@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Guru: {{ $guru->nama_lengkap }}</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>NIP</label>
                            <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip', $guru->nip) }}">
                            @error('nip') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ old('nama_lengkap', $guru->nama_lengkap) }}">
                            @error('nama_lengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                <option value="Laki-Laki" {{ old('jenis_kelamin', $guru->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin', $guru->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir', $guru->tanggal_lahir) }}">
                            @error('tanggal_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Pendidikan Terakhir</label>
                            <select name="pendidikan_terakhir" class="form-control @error('pendidikan_terakhir') is-invalid @enderror">
                                @foreach(['D3', 'D4', 'S1', 'S2', 'S3'] as $p)
                                    <option value="{{ $p }}" {{ old('pendidikan_terakhir', $guru->pendidikan_terakhir) == $p ? 'selected' : '' }}>{{ $p }}</option>
                                @endforeach
                            </select>
                            @error('pendidikan_terakhir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" value="{{ old('jabatan', $guru->jabatan) }}">
                            @error('jabatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>No. Telepon</label>
                            <input type="text" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" value="{{ old('no_telp', $guru->no_telp) }}">
                            @error('no_telp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $guru->email) }}">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Status Kepegawaian</label>
                            <select name="status_kepegawaian" class="form-control @error('status_kepegawaian') is-invalid @enderror">
                                @foreach(['PNS', 'PPPK', 'Honorer', 'Tetap', 'Kontrak'] as $s)
                                    <option value="{{ $s }}" {{ old('status_kepegawaian', $guru->status_kepegawaian) == $s ? 'selected' : '' }}>{{ $s }}</option>
                                @endforeach
                            </select>
                            @error('status_kepegawaian') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Foto Guru</label>
                            <div class="mb-2">
                                <small class="text-muted">Foto Saat Ini:</small><br>
                                @if($guru->foto)
                                    <img src="{{ asset('storage/gurus/' . $guru->foto) }}" width="80" class="img-thumbnail">
                                @else
                                    <span class="badge badge-secondary">Belum ada foto</span>
                                @endif
                            </div>
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">
                            <small class="text-info">*Kosongkan jika tidak ingin mengganti foto</small>
                            @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Alamat Lengkap</label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3">{{ old('alamat', $guru->alamat) }}</textarea>
                    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary shadow">Perbarui Data Guru</button>
                    <a href="{{ route('guru.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
