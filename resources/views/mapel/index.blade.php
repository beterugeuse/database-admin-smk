@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Mata Pelajaran</h1>
        {{-- Pastikan nama route ini sesuai di web.php kamu --}}
        <a href="{{ route('mata-pelajaran.create') }}" class="btn btn-sm shadow-sm text-white" style="background-color: #ff4d6d;">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Mata Pelajaran
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
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="mapelTable" width="100%" cellspacing="0" style="white-space: nowrap;">
                    <thead>
                        <tr>
                            <th width="50px">No</th>
                            <th>Aksi</th>
                            <th>Kode Mapel</th>
                            <th>Nama Mata Pelajaran</th>
                            <th>Jam Pelajaran</th>
                            <th>Jurusan</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($mapel as $mataPelajaran)
                        <tr>
                            {{-- Mengisi Nomor Otomatis --}}
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{-- Memperbaiki variabel dari $jurusanSekolah ke $mataPelajaran --}}
                                <a href="{{ route('mata-pelajaran.edit', $mataPelajaran->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('mata-pelajaran.destroy', $mataPelajaran->id) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <td><span class="badge badge-dark">{{ $mataPelajaran->kode_mapel }}</span></td>
                            <td>{{ $mataPelajaran->nama_mapel }}</td>
                            <td>{{ $mataPelajaran->jam_pelajaran }} Jam / Minggu</td>
                            <td>
                                {{-- Jika kamu sudah buat relasi di Model, pakai: $mataPelajaran->jurusan->nama_jurusan --}}
                                {{ $mataPelajaran->jurusan->nama_jurusan ?? 'Semua Jurusan / ID: ' . $mataPelajaran->jurusan_id }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data mata pelajaran</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        {{ $mapel->links() }}
    </div>
</div>
@endsection
