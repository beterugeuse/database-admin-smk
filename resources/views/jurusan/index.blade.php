@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Data Jurusan</h1>
        <a href="{{ route('jurusan.create') }}" class="btn btn-sm shadow-sm text-white" style="background-color: #ff4d6d;">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Jurusan
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
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Jurusan Sekolah</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="jurusanTable" width="100%" cellspacing="0">
                    <thead class="bg-light text-center">
                        <tr>
                            <th width="50px">No</th>
                            <th width="120px">Aksi</th>
                            <th width="150px">Kode Jurusan</th>
                            <th width="250px">Nama Jurusan</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jurusan as $j)
                            <tr>
                                <td class="text-center" style="white-space: nowrap;">
                                    {{ $loop->iteration + ($jurusan->firstItem() - 1) }}
                                </td>

                                <td class="text-center" style="white-space: nowrap;">
                                    <a href="{{ route('jurusan.show', $j->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('jurusan.edit', $j->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('jurusan.destroy', $j->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus jurusan ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>

                                <td class="text-center" style="white-space: nowrap;">
                                    <span class="badge badge-primary px-3 py-2" style="letter-spacing: 1px;">
                                        {{ $j->kode_jurusan }}
                                    </span>
                                </td>

                                <td>{{ $j->nama_jurusan }}</td>

                                <td class="text-wrap" style="min-width: 300px;">
                                    {{ ($j->deskripsi) }}
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="fas fa-folder-open fa-3x mb-3"></i><br>
                                    Belum ada data Jurusan yang diinputkan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end mt-3">
        {{ $jurusan->links() }}
    </div>
</div>
@endsection
