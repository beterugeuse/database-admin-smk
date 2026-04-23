@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1>Data Guru</h1>
    <a href="{{ route('gurus.create') }}" class="btn mb-2 text-white" style="background-color: #ff4d6d;">Tambah Data Guru</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th width="150px">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($gurus as $index => $guru)
            <tr>
                <td>{{ ($gurus->currentPage() - 1) * $gurus->perPage() + $loop->iteration }}</td>
                <td>{{ $guru->nip }}</td>
                <td>{{ $guru->nama }}</td>
                <td>{{ $guru->telepon }}</td>
                <td>{{ $guru->alamat }}</td>
                <td>
                    <a href="{{ route('gurus.edit', $guru->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('gurus.destroy', $guru->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                {{-- Colspan diubah menjadi 6 karena jumlah kolom berkurang --}}
                <td colspan="6" class="text-center">Tidak ada data guru</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $gurus->links() }}
    </div>
</div>
@endsection
