@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Guru</h1>
        <a href="{{ route('guru.create') }}" class="btn btn-sm shadow-sm text-white" style="background-color: #ff4d6d;">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Guru
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <p>List Data Guru</p>
                <table class="table table-bordered" id="guruTable" width="100%" cellspacing="0" style="white-space: nowrap;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Aksi</th> <th>Foto</th>
                            <th>NIP</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Pendidikan</th>
                            <th>Jabatan</th>
                            <th>No HP</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($guru as $guruSekolah)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <a href="{{ route('guru.edit', $guruSekolah) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('guru.destroy', $guruSekolah) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                @if($guruSekolah->foto)
                                    <img src="{{ asset('storage/gurus/' . $guruSekolah->foto) }}" width="50" class="img-thumbnail">
                                @else
                                    <span class="badge badge-secondary">No Photo</span>
                                @endif
                            </td>
                            <td>{{ $guruSekolah->nip }}</td>
                            <td>{{ $guruSekolah->nama_lengkap }}</td>
                            <td>{{ $guruSekolah->jenis_kelamin }}</td>
                            <td>{{ $guruSekolah->tanggal_lahir }}</td>
                            <td>{{ $guruSekolah->pendidikan_terakhir }}</td>
                            <td>{{ $guruSekolah->jabatan }}</td>
                            <td>{{ $guruSekolah->no_telp }}</td>
                            <td>{{ $guruSekolah->email }}</td>
                            <td>{{ $guruSekolah->alamat }}</td>
                            <td>{{ $guruSekolah->status_kepegawaian }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="13" class="text-center">Tidak ada data guru</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        {{ $guru->links() }}
    </div>
</div>
@endsection
