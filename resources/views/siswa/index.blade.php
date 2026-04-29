@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
        <a href="{{ route('siswa.create') }}" class="btn btn-sm shadow-sm text-white" style="background-color: #ff4d6d;">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Siswa
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
            <h6 class="m-0 font-weight-bold text-primary">Daftar Data Siswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="siswaTable" width="100%" cellspacing="0" style="white-space: nowrap;">
                    <thead class="bg-light text-center">
                        <tr>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Foto</th>
                            <th>NIS</th>
                            <th>NISN</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Agama</th>
                            <th>Alamat</th>
                            <th>No. Telp</th>
                            <th>Email</th>
                            <th>Kelas</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($siswas as $s)
                            <tr>
                                <td class="text-center">{{ $loop->iteration + ($siswas->firstItem() - 1) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('siswa.show', $s->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('siswa.edit', $s->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                <td class="text-center">
                                    @if($s->image)
                                        <img src="{{ $s->image }}" width="100">
                                        <span>{{$s->image}}</span>
                                    @endif
                                </td>
                                <td>{{ $s->nis }}</td>
                                <td>{{ $s->nisn }}</td>
                                <td>{{ $s->nama_lengkap }}</td>
                                <td class="text-center">{{ $s->jenis_kelamin }}</td>
                                <td>{{ \Carbon\Carbon::parse($s->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                                <td>{{ $s->agama }}</td>
                                <td>{{ $s->alamat }}</td>
                                <td>{{ $s->no_telp }}</td>
                                <td>
                                    <span class="badge badge-light border px-3 py-2 text-primary">
                                        <i class="fas fa-envelope fa-sm mr-1"></i> {{ $s->email }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-primary">{{ $s->kelas->nama_kelas ?? 'N/A' }}</span>
                                </td>
                                <td class="text-center">
                                    @php
                                        $color = [
                                            'Aktif' => 'success',
                                            'Alumni' => 'secondary',
                                            'Pindah' => 'warning',
                                            'Keluar' => 'danger'
                                        ][$s->status] ?? 'dark';
                                    @endphp
                                    <span class="badge badge-{{ $color }}">{{ $s->status }}</span>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="14" class="text-center py-4 text-muted">
                                <i class="fas fa-folder-open fa-3x mb-3"></i><br>
                                Belum ada data Siswa yang diinputkan
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        {{ $siswas->links() }}
    </div>
</div>
@endsection
