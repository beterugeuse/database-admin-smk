@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Data Mata Pelajaran</h1>
        <a href="{{ route('mata-pelajaran.create') }}" class="btn btn-sm shadow-sm text-white" style="background-color: #ff4d6d;">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Mapel
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Mata Pelajaran</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="mapelTable" width="100%" cellspacing="0" style="white-space: nowrap;">
                    <thead class="bg-light text-center">
                        <tr>
                            <th width="50px">No</th>
                            <th width="120px">Aksi</th>
                            <th>Kode</th>
                            <th>Nama Mata Pelajaran</th>
                            <th>Jam/Minggu</th>
                            <th>Guru Pengampu</th>
                            <th>Jurusan</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($mapel as $mataPelajaran)
                        <tr>
                            <td class="text-center">{{ $loop->iteration + ($mapel->firstItem() - 1) }}</td>

                            <td class="text-center">
                                <a href="{{ route('mata-pelajaran.show', $mataPelajaran->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('mata-pelajaran.edit', $mataPelajaran->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('mata-pelajaran.destroy', $mataPelajaran->id) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Yakin ingin menghapus mata pelajaran ini?')" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>

                            <td class="text-center">
                                <span class="badge badge-primary px-3 py-2" style="letter-spacing: 1px;">
                                    {{ $mataPelajaran->kode_mapel }}
                                </span>
                            </td>

                            <td>{{ $mataPelajaran->nama_mapel }}</td>

                            <td class="text-center">
                                {{ $mataPelajaran->jam_pelajaran }} JP
                            </td>

                            <td>
                                {{ $mataPelajaran->guru->nama_lengkap }}
                            </td>

                            <td class="text-center">
                                    {{ $mataPelajaran->jurusan->nama_jurusan }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="fas fa-folder-open fa-3x mb-3"></i><br>
                                Belum ada data Mata Pelajaran yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end mt-3">
        {{ $mapel->links() }}
    </div>
</div>
@endsection
