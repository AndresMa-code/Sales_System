@extends('auth.body.main')

@section('container')
<div class="container">
    <div class="row align-items-center justify-content-center height-self-center">
        <div class="col-lg-8">
            <div class="card auth-card">
                <div class="card-body p-0">
                    <div class="d-flex align-items-center auth-content">
                        <div class="col-lg-7 align-self-center">
                            <div class="p-3">

                                <h2 class="mb-2 text-center">Formulario de registro<br>de usuario</h2>
                                <p>Cree su cuenta de registro del sistema: Sales system</p>

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="floating-label form-group">
                                                <input
                                                    class="floating-input form-control @error('name') is-invalid @enderror"
                                                    type="text" placeholder=" " name="name" autocomplete="off"
                                                    value="{{ old('name') }}" required style="border-color: #007BFF;">
                                                <label style="color: #007BFF;">Nombre completo</label>
                                            </div>
                                            @error('name')
                                                <div class="mb-4" style="margin-top: -20px">
                                                    <div class="text-danger small">{{ $message }}</div>
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="floating-label form-group">
                                                <input
                                                    class="floating-input form-control @error('username') is-invalid @enderror"
                                                    type="text" placeholder=" " name="username" autocomplete="off"
                                                    value="{{ old('username') }}" required
                                                    style="border-color: #007BFF;">
                                                <label style="color: #007BFF;">Nombre de usuario</label>
                                            </div>
                                            @error('username')
                                                <div class="mb-4" style="margin-top: -20px">
                                                    <div class="text-danger small">{{ $message }}</div>
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="floating-label form-group">
                                                <input
                                                    class="floating-input form-control @error('email') is-invalid @enderror"
                                                    type="email" placeholder=" " name="email" autocomplete="off"
                                                    value="{{ old('email') }}" required style="border-color: #007BFF;">
                                                <label style="color: #007BFF;">Correo electrónico</label>
                                            </div>
                                            @error('email')
                                                <div class="mb-4" style="margin-top: -20px">
                                                    <div class="text-danger small">{{ $message }}</div>
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="floating-label form-group">
                                                <input
                                                    class="floating-input form-control @error('password') is-invalid @enderror"
                                                    type="password" placeholder=" " name="password" autocomplete="off"
                                                    required style="border-color: #007BFF;">
                                                <label style="color: #007BFF;">Contraseña</label>
                                            </div>
                                            @error('password')
                                                <div class="mb-4" style="margin-top: -20px">
                                                    <div class="text-danger small">{{ $message }}</div>
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="floating-label form-group">
                                                <input class="floating-input form-control" type="password"
                                                    placeholder=" " name="password_confirmation" autocomplete="off"
                                                    required style="border-color: #007BFF;">
                                                <label style="color: #007BFF;">Confirmar Contraseña</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Botón de registro -->
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-lg" style="background-color: #007BFF; color: white;">
                                            Registro
                                        </button>
                                    </div>

                                    <!-- Link a login -->
                                    <p class="mt-3 text-center">
                                        ¿Tienes una cuenta?
                                        <a href="{{ route('login') }}" style="color: #007BFF; font-weight: bold;">
                                            Iniciar sesión aquí
                                        </a>
                                    </p>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-5 content-right">
                            <img src="{{ asset('assets/images/login/01.png') }}" class="img-fluid image-right" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
