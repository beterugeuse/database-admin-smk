@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Jadwal Pelajaran</h1>
        <a href="{{ route('jadwal-pelajaran.create') }}" class="btn btn-sm shadow-sm text-white" style="background-color: #ff4d6d;">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Jadwal Pelajaran
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
            <h6 class="m-0 font-weight-bold text-primary">Daftar Jadwal Pelajaran</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="jadwalTable" width="100%" cellspacing="0" style="white-space: nowrap;">
                    <thead class="bg-light text-center">
                        <tr>
                            <th width="50px">No</th>
                            <th width="100px">Aksi</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Kelas</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru Pengampu</th>
                            <th>Ruangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jadwal as $j)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    <a href="{{ route('jadwal-pelajaran.edit', $j->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('jadwal-pelajaran.destroy', $j->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus jadwal ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-info px-3 py-2">{{ $j->hari }}</span>
                                </td>
                                <td class="text-center">
                                    <i class="far fa-clock mr-1"></i>
                                    {{ date('H:i', strtotime($j->jam_mulai)) }} - {{ date('H:i', strtotime($j->jam_selesai)) }}
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-primary px-3 py-2">{{ $j->kelas->nama_kelas ?? 'N/A' }}</span>
                                </td>
                                <td>
                                    <strong>{{ $j->mapel->nama_mapel ?? 'N/A' }}</strong>
                                </td>
                                <td>
                                    <i class="fas fa-user-tie mr-1"></i>
                                    {{ $j->guru->nama_lengkap ?? 'N/A' }}
                                </td>
                                <td>
                                    <i class="fas fa-door-open mr-1"></i>
                                    {{ $j->ruangan }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Data jadwal pelajaran tidak ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        {{ $jadwal->links() }}
    </div>
</div>
@endsection
