@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Data User</h1>
        <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm shadow-sm">
            <i class="fas fa-arrow-left fa-sm"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Akun: {{ $user->name }}</h6>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit User
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th width="200">User ID</th>
                            <td>: #{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>: {{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Alamat Email</th>
                            <td>: <a href="mailto:{{ $user->email }}" class="text-primary">{{ $user->email }}</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            {{-- Log Sistem --}}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Log Akun</h6>
                </div>
                <div class="card-body">
                    <div class="small text-muted mb-2">
                        <i class="fas fa-calendar-plus mr-1"></i> Akun dibuat pada: <br>
                        <span class="text-dark">{{ $user->created_at->translatedFormat('d F Y, H:i') }}</span>
                    </div>
                    <hr>
                    <div class="small text-muted">
                        <i class="fas fa-history mr-1"></i> Perubahan Terakhir: <br>
                        <span class="text-dark">{{ $user->updated_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
