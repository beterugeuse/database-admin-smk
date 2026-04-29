@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Data Guru</h1>
        <a href="{{ route('guru.index') }}" class="btn btn-secondary btn-sm shadow-sm">
            <i class="fas fa-arrow-left fa-sm"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Guru: {{ $guru->nama_lengkap }}</h6>
                    <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit Data
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th width="200">NIP</th>
                            <td>: {{$guru->nip}} </td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>: {{ $guru->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>: {{ $guru->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>: {{ \Carbon\Carbon::parse($guru->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                        </tr>
                        <tr>
                            <th>Pendidikan Terakhir</th>
                            <td>: {{ $guru->pendidikan_terakhir }}</td>
                        </tr>
                        <tr>
                            <th>Jabatan</th>
                            <td>: {{ $guru->jabatan }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>: <a href="mailto:{{ $guru->email }}" class="text-primary">{{ $guru->email }}</a></td>
                        </tr>
                        <tr>
                            <th>No. Telepon</th>
                            <td>: {{ $guru->no_telp }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>: {{ $guru->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Status Kepegawaian</th>
                            <td>:
                                @php
                                    $statusColor = [
                                        'PNS' => 'success',
                                        'PPPK' => 'primary',
                                        'Honorer' => 'warning',
                                        'Tetap' => 'info'
                                    ][$guru->status_kepegawaian] ?? 'dark';
                                @endphp
                                <span class="badge badge-{{ $statusColor }} px-3 py-2">{{ $guru->status_kepegawaian }}</span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Foto Guru</h6>
                </div>
                <div class="card-body text-center">
                    @if($guru->image)
                        <img src="{{ $guru->image }}"
                            class="img-fluid rounded shadow-sm border"
                            style="max-height: 350px; width: 100%; object-fit: cover;"
                            alt="Foto {{ $guru->nama_lengkap }}">
                    @else
                        <div class="bg-light py-5 rounded border">
                            <i class="fas fa-user-tie fa-5x text-gray-300"></i>
                            <p class="mt-2 text-muted italic">Tidak ada foto profil</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Log Data</h6>
                </div>
                <div class="card-body">
                    <div class="small text-muted mb-2">
                        <i class="fas fa-calendar-plus mr-1"></i> Data ditambahkan: <br>
                        <span class="text-dark">{{ $guru->created_at->translatedFormat('d F Y, H:i') }}</span>
                    </div>
                    <hr>
                    <div class="small text-muted">
                        <i class="fas fa-history mr-1"></i> Perubahan terakhir: <br>
                        <span class="text-dark">{{ $guru->updated_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
