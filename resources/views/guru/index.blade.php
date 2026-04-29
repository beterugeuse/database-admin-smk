@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Data Guru</h1>
        <a href="{{ route('guru.create') }}" class="btn btn-sm shadow-sm text-white" style="background-color: #ff4d6d;">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Guru
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
            <h6 class="m-0 font-weight-bold text-primary">Daftar Guru</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="guruTable" width="100%" cellspacing="0" style="white-space: nowrap;">
                    <thead class="bg-light text-center">
                        <tr>
                            <th width="50px">No</th>
                            <th width="120px">Aksi</th>
                            <th>Foto</th>
                            <th>NIP</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Pendidikan</th>
                            <th>Jabatan</th>
                            <th>No. Telp</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($guru as $g)
                        <tr>
                            <td class="text-center">{{ $loop->iteration + ($guru->firstItem() - 1) }}</td>

                            <td class="text-center">
                                <a href="{{ route('guru.show', $g->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('guru.edit', $g->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('guru.destroy', $g->id) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Yakin ingin menghapus data guru ini?')" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>

                            {{-- Foto --}}
                            <td class="text-center">
                                @if($g->image)
                                        <img src="{{ $g->image }}" width="100">                              @else
                                    <div style="width:45px; height:45px; border-radius:50%; background-color:#858796; display:inline-flex; align-items:center; justify-content:center;">
                                        <i class="fas fa-user" style="color:#fff; font-size:18px;"></i>
                                    </div>
                                @endif
                            </td>

                            <td>{{ $g->nip ?? '-' }}</td>

                            <td>{{ $g->nama_lengkap }}</td>

                            <td class="text-center">{{ $g->jenis_kelamin }}</td>

                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($g->tanggal_lahir)->translatedFormat('d F Y') }}
                            </td>

                            <td>{{ $g->pendidikan_terakhir }}</td>

                            <td>{{ $g->jabatan }}</td>

                            <td>{{ $g->no_telp }}</td>

                            <td>
                                <span class="badge badge-light border px-3 py-2 text-primary">
                                    <i class="fas fa-envelope fa-sm mr-1"></i> {{ $g->email }}
                                </span>
                            </td>

                            <td>{{ $g->alamat }}</td>

                            <td class="text-center">
                                @php
                                    $statusColor = [
                                        'PNS'     => 'success',
                                        'PPPK'    => 'primary',
                                        'Honorer' => 'warning',
                                        'Tetap'   => 'info',
                                    ][$g->status_kepegawaian] ?? 'secondary';
                                @endphp
                                <span class="badge badge-{{ $statusColor }} px-3 py-2">
                                    {{ $g->status_kepegawaian }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="13" class="text-center py-5 text-muted">
                                <i class="fas fa-folder-open fa-3x mb-3 d-block"></i>
                                Belum ada data Guru yang diinputkan.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end mt-3">
        {{ $guru->links() }}
    </div>
</div>
@endsection
