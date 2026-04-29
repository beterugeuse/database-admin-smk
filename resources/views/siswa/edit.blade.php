@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Edit Data Siswa: {{ $siswas->nama_lengkap }} ({{ $siswas->nis }})
            </h6>
        </div>
        <div class="card-body">
            <form action="{{ route('siswa.update', $siswas->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="row">
                    {{-- Kolom Kiri: Identitas Utama --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror"
                                   value="{{ old('nama_lengkap', $siswas->nama_lengkap) }}">
                            @error('nama_lengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>NIS</label>
                                    <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror"
                                           value="{{ old('nis', $siswas->nis) }}">
                                    @error('nis') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>NISN</label>
                                    <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror"
                                           value="{{ old('nisn', $siswas->nisn) }}">
                                    @error('nisn') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                        <option value="Laki-Laki" {{ old('jenis_kelamin', $siswas->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin', $siswas->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                           value="{{ old('tanggal_lahir', $siswas->tanggal_lahir) }}">
                                    @error('tanggal_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Agama</label>
                            <select name="agama" class="form-control @error('agama') is-invalid @enderror">
                                @foreach(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu'] as $agama)
                                    <option value="{{ $agama }}" {{ old('agama', $siswas->agama) == $agama ? 'selected' : '' }}>{{ $agama }}</option>
                                @endforeach
                            </select>
                            @error('agama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', $siswas->email) }}">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>No. Telepon</label>
                            <input type="text" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror"
                                   value="{{ old('no_telp', $siswas->no_telp) }}">
                            @error('no_telp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Pilih Kelas</label>
                                    <select name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror">
                                        @foreach($kelass as $k)
                                            <option value="{{ $k->id }}" {{ old('kelas_id', $siswas->kelas_id) == $k->id ? 'selected' : '' }}>
                                                {{ $k->nama_kelas }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kelas_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Status Siswa</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                                        @foreach(['Aktif', 'Alumni', 'Pindah', 'Keluar'] as $status)
                                            <option value="{{ $status }}" {{ old('status', $siswas->status) == $status ? 'selected' : '' }}>{{ $status }}</option>
                                        @endforeach
                                    </select>
                                    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Foto Siswa</label>
                    <div class="mb-2">
                        @if($siswas->image)
                            <img src="{{ $siswas->image }}" alt="Foto Lama" class="img-thumbnail" style="width: 100px;">
                            <small class="text-muted d-block italic">*Foto saat ini</small>
                        @endif
                    </div>
                    <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                    @error('image') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label>Alamat Lengkap</label>
                    <textarea name="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $siswas->alamat) }}</textarea>
                    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mt-4 border-top pt-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i> Update Data Siswa
                    </button>
                    <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
