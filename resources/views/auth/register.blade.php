<!DOCTYPE html>
<html lang="en">

<head>

    @include('includes.styles')
    @stack('after-styles')

</head>

<body style="background-color: #ff4d6d;">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru</h1>
                            </div>

                            {{-- Tampilkan error --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            <form class="user" action="{{ route('register.post') }}" method="POST">
                                @csrf

                                {{-- Nama --}}
                                <div class="form-group">
                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control form-control-user @error('name') is-invalid @enderror"
                                        placeholder="Nama Lengkap"
                                        value="{{ old('name') }}"
                                        required
                                        autofocus>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div class="form-group">
                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control form-control-user @error('email') is-invalid @enderror"
                                        placeholder="Email"
                                        value="{{ old('email') }}"
                                        required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Password --}}
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input
                                            type="password"
                                            name="password"
                                            class="form-control form-control-user @error('password') is-invalid @enderror"
                                            placeholder="Password"
                                            required>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Konfirmasi password --}}
                                    <div class="col-sm-6">
                                        <input
                                            type="password"
                                            name="password_confirmation"
                                            class="form-control form-control-user"
                                            placeholder="Konfirmasi Password"
                                            required>
                                    </div>
                                </div>

                                {{-- Ubah dari <a> ke button type submit --}}
                                <button type="submit" class="btn btn-user btn-block text-white" style="background-color: #ff4d6d;">
                                    Daftar Akun
                                </button>

                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Sudah Punya Akun? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('includes.script')
    @stack('after-script')

</body>

</html>
