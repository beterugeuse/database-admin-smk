@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Mata Pelajaran</h1>
        <a href="{{ route('mata-pelajaran.index') }}" class="btn btn-secondary btn-sm shadow-sm">
            <i class="fas fa-arrow-left fa-sm"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Mata Pelajaran: {{ $mapel->nama_mapel }}</h6>
                    <a href="{{ route('mata-pelajaran.edit', $mapel->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit Mata Pelajaran
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tr>
                                <th style="width: 250px;">Kode Mata Pelajaran</th>
                                <td>
                                    <span class="badge badge-primary px-3 py-2" style="letter-spacing: 1px;">{{ $mapel->kode_mapel }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Nama Mata Pelajaran</th>
                                <td>: {{ $mapel->nama_mapel }}</td>
                            </tr>
                            <tr>
                                <th>Jam Pelajaran / Minggu</th>
                                <td>:
                                    {{ $mapel->jam_pelajaran }} JP
                                </td>
                            </tr>
                            <tr>
                                <th>Guru Pengampu</th>
                                <td>: {{ $mapel->guru->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <th>Jurusan</th>
                                <td>: {{ $mapel->jurusan->nama_jurusan }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
