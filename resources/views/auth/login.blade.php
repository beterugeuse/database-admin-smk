<!DOCTYPE html>
<html lang="en">

<head>

    @include('includes.styles')
    @stack('after-styles')

</head>

<body style="background-color: #ff4d6d";>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Database SMK</h1>
                                    </div>

                                    {{-- Tampilkan error jika login gagal --}}
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            {{ $errors->first() }}
                                        </div>
                                    @endif

                                    @if (session('registered'))
                                        <div class="alert alert-success text-center">
                                            <i class="fas fa-check-circle mr-1"></i>
                                            {{ session('registered') }}
                                        </div>
                                    @endif

                                    <form class="user" action="{{ route('login.post')}}" method="POST">

                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                                placeholder="Masukkan Email..." value="{{ old('email') }}" required autofocus>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                                placeholder="Password" required>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-user btn-block text-white" style="background-color: #ff4d6d",>
                                            Login
                                        </button>
                                    </form>

                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">Belum Punya Akun? Buat Akun!</a>
                                    </div>
                                </div>
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
