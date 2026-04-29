@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Data Siswa</h1>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary btn-sm shadow-sm">
            <i class="fas fa-arrow-left fa-sm"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Biodata Siswa: {{ $siswa->nama_lengkap }}</h6>
                    <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit Data
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th width="200">NIS</th>
                            <td>: {{ $siswa->nis }}</td>
                        </tr>
                        <tr>
                            <th>NISN</th>
                            <td>: {{ $siswa->nisn }}</td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>: {{ $siswa->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>: {{ $siswa->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>: {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                        </tr>
                        <tr>
                            <th>Agama</th>
                            <td>: {{ $siswa->agama }}</td>
                        </tr>
                        <tr>
                            <th>Alamat Lengkap</th>
                            <td>: {{ $siswa->alamat }}</td>
                        </tr>
                        <tr>
                            <th>No. Telepon</th>
                            <td>: {{ $siswa->no_telp }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>: <a href="mailto:{{ $siswa->email }}" class="text-primary">{{ $siswa->email }}</a></td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td>: <span class="badge badge-primary px-3">{{ $siswa->kelas->nama_kelas }}</span></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>:
                                @php
                                    $statusColor = [
                                        'Aktif' => 'success',
                                        'Alumni' => 'secondary',
                                        'Pindah' => 'warning',
                                        'Keluar' => 'danger'
                                    ]
                                    [$siswa->status] ?? 'dark';
                                @endphp
                                <span class="badge badge-{{ $statusColor }}">{{ $siswa->status }}</span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Foto Siswa</h6>
                </div>
                <div class="card-body text-center">
                    @if($siswa->image)
                        <img src="{{ $siswa->image }}" class="img-fluid rounded shadow-sm" style="max-height: 300px; width: 100%; object-fit: cover;" alt="Foto {{ $siswa->nama_lengkap }}">
                    @else
                        <div class="bg-light py-5 rounded">
                            <i class="fas fa-user fa-5x text-gray-300"></i>
                            <p class="mt-2 text-muted">Tidak ada foto</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Log Sistem</h6>
                </div>
                <div class="card-body">
                    <div class="small text-muted mb-2">
                        <i class="fas fa-calendar-plus mr-1"></i> Terdaftar pada: <br>
                        <span class="text-dark">{{ $siswa->created_at->translatedFormat('d F Y, H:i') }}</span>
                    </div>
                    <hr>
                    <div class="small text-muted">
                        <i class="fas fa-history mr-1"></i> Update Terakhir: <br>
                        <span class="text-dark">{{ $siswa->updated_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
