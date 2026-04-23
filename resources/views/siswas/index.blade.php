@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1>Data Siswa</h1>
    <a href="{{ route('siswas.create') }}" class="btn mb-2 text-white" style="background-color: #ff4d6d;">Tambah Data Siswa</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Alamat</th>
                <th width="150px">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($siswas as $index => $siswa)
            <tr>
                <td>{{ ($siswas->currentPage() - 1) * $siswas->perPage() + $loop->iteration }}</td>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->jurusan }}</td>
                <td>{{ $siswa->alamat }}</td>
                <td>
                    <a href="{{ route('siswas.edit', $siswa->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('siswas.destroy', $siswa->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                {{-- Colspan diubah menjadi 6 karena jumlah kolom berkurang --}}
                <td colspan="6" class="text-center">Tidak ada data siswa</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $siswas->links() }}
    </div>
</div>
@endsection
