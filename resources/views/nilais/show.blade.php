@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Nilai Siswa</h1>
        <a href="{{ route('nilai.index') }}" class="btn btn-secondary btn-sm shadow-sm">
            <i class="fas fa-arrow-left fa-sm"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Nilai: {{ $nilai->siswa->nama_lengkap }}</h6>
                    <a href="{{ route('nilai.edit', $nilai->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit Nilai
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">

                            {{-- Identitas Siswa --}}
                            <tr>
                                <th style="width: 250px;">Nama Siswa</th>
                                <td>: {{ $nilai->siswa->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <th>NIS</th>
                                <td>: {{ $nilai->siswa->nis }}
                                </td>
                            </tr>
                            <tr>
                                <th>Kelas</th>
                                <td>: {{ $nilai->siswa->kelas->nama_kelas }}</td>
                            </tr>
                            <tr>
                                <th>Mata Pelajaran</th>
                                <td>: {{ $nilai->mapel->kode_mapel }} - {{ $nilai->mapel->nama_mapel }}
                                </td>
                            </tr>
                            <tr>
                                <th>Guru Pengampu</th>
                                <td>: {{ $nilai->mapel->guru->nama_lengkap ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th>Nilai UTS</th>
                                <td>: {{ $nilai->nilai_uts }}</td>
                            </tr>
                            <tr>
                                <th>Nilai UAS</th>
                                <td>: {{ $nilai->nilai_uas }}</td>
                            </tr>
                            <tr>
                                <th>Nilai Akhir</th>
                                <td>:
                                    @php
                                        $badgeColor = $nilai->nilai_akhir >= 75 ? 'badge-success' : 'badge-danger';
                                    @endphp
                                    <span class="badge {{ $badgeColor }} px-3 py-2" style="min-width: 50px;">
                                        {{ number_format($nilai->nilai_akhir, 1) }}
                                    </span>
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
