@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h1>Data Jurusan</h1>
    <a href="{{ route('jurusan.create') }}" class="btn mb-2 text-white" style="background-color: #ff4d6d;">Tambah Jurusan</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Jurusan</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($jurusan as $jurusanSekolah)
            <tr>
                <td></td>
                <td>{{ $jurusanSekolah->kode_jurusan }}</td>
                <td>{{ $jurusanSekolah->nama_jurusan }}</td>
                <td>{{ $jurusanSekolah->deskripsi }}</td>
                <td>
                    <a href="{{ route('jurusan.edit', $jurusanSekolah) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('jurusan.destroy', $jurusanSekolah) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data user</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $jurusan->links() }}
</div>
@endsection
