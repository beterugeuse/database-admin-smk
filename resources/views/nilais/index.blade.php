@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Nilai Akademik</h1>
        <a href="{{ route('nilai.create') }}" class="btn btn-sm shadow-sm text-white" style="background-color: #ff4d6d;">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Nilai
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
            <h6 class="m-0 font-weight-bold text-primary">Daftar Nilai Siswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="nilaiTable" width="100%" cellspacing="0" style="white-space: nowrap;">
                    <thead class="bg-light text-center">
                        <tr>
                            <th width="50px">No</th>
                            <th width="120px">Aksi</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru Pengampu</th>
                            <th>Nilai UTS</th>
                            <th>Nilai UAS</th>
                            <th>Nilai Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($nilais as $n)
                            <tr>
                                <td class="text-center">{{ $loop->iteration + ($nilais->firstItem() - 1) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('nilai.show', $n->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('nilai.edit', $n->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('nilai.destroy', $n->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data nilai ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>{{ $n->siswa->nama_lengkap ?? 'N/A' }}</td>

                                <td class="text-center">
                                    <span class="badge badge-primary px-2 py-1">
                                        {{ $n->siswa->kelas->nama_kelas }}
                                    </span>
                                </td>

                                <td>{{ $n->mapel->nama_mapel ?? 'N/A' }}</td>

                                <td>
                                    {{ $n->mapel->guru->nama_lengkap}}
                                </td>

                                <td class="text-center">{{ number_format($n->nilai_uts, 0) }}</td>
                                <td class="text-center">{{ number_format($n->nilai_uas, 0) }}</td>

                                <td class="text-center">
                                    @php
                                        $badgeColor = $n->nilai_akhir >= 75 ? 'badge-success' : 'badge-danger';
                                    @endphp
                                    <span class="badge {{ $badgeColor }} px-3 py-2" style="min-width: 50px;">
                                        {{ number_format($n->nilai_akhir, 1) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-4 text-muted">
                                    <i class="fas fa-folder-open fa-3x mb-3"></i><br>
                                    Belum ada data Nilai yang diinputkan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end mt-3">
        {{ $nilais->links() }}
    </div>
</div>
@endsection
