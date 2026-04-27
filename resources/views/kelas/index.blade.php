@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Kelas</h1>
        <a href="{{ route('kelas.create') }}" class="btn btn-sm shadow-sm text-white" style="background-color: #ff4d6d;">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Kelas
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Kelas Aktif</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="kelasTable" width="100%" cellspacing="0" style="white-space: nowrap;">
                    <thead class="bg-light">
                        <tr>
                            <th width="50px">No</th>
                            <th width="100px">Aksi</th>
                            <th>Nama Kelas</th>
                            <th>Tingkat</th>
                            <th>Tahun Ajaran</th>
                            <th>Jurusan</th>
                            <th>Wali Kelas</th>
                            <th>Kapasitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kelas as $k)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>
                                    <a href="{{ route('kelas.edit', $k->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kelas ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <span class="badge badge-primary px-3 py-2">{{ $k->nama_kelas }}</span>
                                </td>
                                <td>Kelas {{ $k->tingkat }}</td>
                                <td>{{ $k->tahun_ajaran }}</td>
                                <td>
                                    {{-- Mengambil nama jurusan dari relasi --}}
                                    {{ $k->jurusan->nama_jurusan ?? 'N/A' }}
                                </td>
                                <td>
                                    {{-- Mengambil nama guru dari relasi waliKelas --}}
                                    <i class="fas fa-user-tie mr-1"></i>
                                    {{ $k->waliKelas->nama_lengkap ?? 'Belum Ditentukan' }}
                                </td>
                                <td>
                                    <i class="fas fa-users mr-1"></i>
                                    {{ $k->kapasitas }} Siswa
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Data kelas tidak ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        {{ $kelas->links() }}
    </div>
</div>
@endsection
