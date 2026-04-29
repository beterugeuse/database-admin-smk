@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Data Jurusan</h1>
        <a href="{{ route('jurusan.index') }}" class="btn btn-secondary btn-sm shadow-sm">
            <i class="fas fa-arrow-left fa-sm"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Jurusan: {{ $jurusan->kode_jurusan }}</h6>
                    <a href="{{ route('jurusan.edit', $jurusan->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit Jurusan
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tr>
                                <th style="width: 180px;">Kode Jurusan</th>
                                <td>: <span class="badge badge-primary px-3 py-1">{{ $jurusan->kode_jurusan }}</span></td>
                            </tr>
                            <tr>
                                <th>Nama Jurusan</th>
                                <td>: {{ $jurusan->nama_jurusan }}</td>
                            </tr>
                            <tr>
                                <th style="vertical-align: top;">Deskripsi</th>
                                <td style="vertical-align: top;">: {{ $jurusan->deskripsi ?? 'Tidak ada deskripsi untuk jurusan ini.' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
