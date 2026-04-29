@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-warning text-white shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white-50 text-uppercase mb-1">Total User</div>
                            <div class="h5 mb-0 font-weight-bold text-white">{{ $totalUser }} User</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users-cog fa-2x text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-warning text-white shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white-50 text-uppercase mb-1">Total Guru</div>
                            <div class="h5 mb-0 font-weight-bold text-white">{{ $totalGuru }} Guru</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users-cog fa-2x text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-warning text-white shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white-50 text-uppercase mb-1">Total Siswa</div>
                            <div class="h5 mb-0 font-weight-bold text-white">{{ $totalSiswa }} Siswa</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users-cog fa-2x text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
