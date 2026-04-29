@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Data Users</h1>
        <a href="{{ route('users.create') }}" class="btn btn-sm shadow-sm text-white" style="background-color: #ff4d6d;">
            <i class="fas fa-user-plus fa-sm text-white-50"></i> Tambah User Baru
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="userTable" width="100%" cellspacing="0" style="white-space: nowrap;">
                    <thead class="bg-light text-center">
                        <tr>
                            <th width="50px">No</th>
                            <th width="120px">Aksi</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td class="text-center">{{ $loop->iteration + ($users->firstItem() - 1) }}</td>

                                <td class="text-center">
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus user ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>

                                <td>
                                    {{ $user->name }}
                                </td>

                                <td>
                                    <span class="badge badge-light border px-3 py-2 text-primary">
                                        <i class="fas fa-envelope fa-sm mr-1"></i> {{ $user->email }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    <small class="text-muted">
                                        <i class="far fa-calendar-alt mr-1"></i>
                                        {{ $user->created_at->translatedFormat('d M Y') }}
                                    </small>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="fas fa-users-slash fa-3x mb-3"></i><br>
                                    Belum ada data User yang diinputkan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end mt-3">
        {{ $users->links() }}
    </div>
</div>
@endsection
