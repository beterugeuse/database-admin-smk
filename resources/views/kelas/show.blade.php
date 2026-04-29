@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Data Kelas</h1>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary btn-sm shadow-sm">
            <i class="fas fa-arrow-left fa-sm"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Kelas: {{ $kelas->nama_kelas }}</h6>
                    <a href="{{ route('kelas.edit', $kelas->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit Kelas
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tr>
                                <th style="width: 200px;">Nama Kelas</th>
                                <td>
                                    <span class="badge badge-primary px-3 py-2">{{ $kelas->nama_kelas }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Tingkat</th>
                                <td>: {{ $kelas->tingkat }}</td>
                            </tr>
                            <tr>
                                <th>Jurusan</th>
                                <td>: {{ $kelas->jurusan->nama_jurusan ?? 'Tidak ada data Jurusan' }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Ajaran</th>
                                <td>: {{ $kelas->tahun_ajaran }}</td>
                            </tr>
                            <tr>
                                <th>Wali Kelas</th>
                                <td>:
                                    @if($kelas->waliKelas)
                                        {{ $kelas->waliKelas->nama_lengkap }}
                                    @else
                                        <span class="text-danger font-italic">Belum ditentukan</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Kapasitas </th>
                                <td>: {{ $kelas->kapasitas }} Siswa</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
