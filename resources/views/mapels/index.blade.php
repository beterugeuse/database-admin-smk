@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1>Data Mata Pelajaran</h1>
    <a href="{{ route('mapels.create') }}" class="btn mb-2 text-white" style="background-color: #ff4d6d;">Tambah Data Mata Pelajaran</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Mata Pelajaran</th>
                <th>Guru</th>
                <th width="150px">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($mapels as $index => $mapel)
            <tr>
                <td>{{ ($mapels->currentPage() - 1) * $mapels->perPage() + $loop->iteration }}</td>
                <td>{{ $mapel->mata_pelajaran }}</td>
                <td>{{ $mapel->guru->nama }} (NIP: {{ $mapel->guru->nip }})</td>
                <td>
                    <a href="{{ route('mapels.edit', $mapel->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('mapels.destroy', $mapel->id) }}" method="POST" style="display:inline;">
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
        {{ $mapels->links() }}
    </div>
</div>
@endsection
