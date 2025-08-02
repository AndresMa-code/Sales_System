@extends('auth.body.main')

@section('container')
<div class="row align-items-center justify-content-center height-self-center">
    <div class="col-lg-8">
        <div class="card auth-card">
            <div class="card-body p-0">
                <div class="d-flex align-items-center auth-content">
                    <div class="col-lg-7 align-self-center">
                        <div class="p-3">

                            <h2 class="mb-2">
                                <center>¡Bienvenido al sistema:</br>
                                    <center>Sales System
                            </h2>
                            <p>Ingresa tu usuario o correo y contraseña para comenzar:</p>

                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <!-- User/email field -->
                                    <div class="col-lg-12">
                                        <div class="floating-label form-group">
                                            <input
                                                class="floating-input form-control @error('email') is-invalid @enderror @error('username') is-invalid @enderror"
                                                type="text" name="input_type" placeholder=" "
                                                value="{{ old('input_type') }}" autocomplete="off" required autofocus
                                                style="border-color: #007BFF;">
                                            <label style="color: #007BFF;"> Correo electrónico/Nombre de usuario</label>
                                        </div>
                                        @error('username')
                                        <div class="mb-4" style="margin-top: -20px">
                                            <div class="text-danger small">Nombre de usuario o contraseña incorrectos.
                                            </div>
                                        </div>
                                        @enderror
                                        @error('email')
                                        <div class="mb-4" style="margin-top: -20px">
                                            <div class="text-danger small">Nombre de usuario o contraseña incorrectos.
                                            </div>
                                        </div>
                                        @enderror
                                    </div>

                                    <!-- Password field -->
                                    <div class="col-lg-12">
                                        <div class="floating-label form-group">
                                            <input
                                                class="floating-input form-control @error('password') is-invalid @enderror"
                                                type="password" name="password" placeholder=" " required
                                                style="border-color: #007BFF;">
                                            <label style="color: #007BFF;">Contraseña</label>
                                        </div>
                                    </div>

                                    <!-- Create Account and Forgot Password Buttons -->
                                    ¿Aun no tienes una cuenta?
                                    <div class="col-lg-12 d-flex justify-content-between align-items-center mt-3">
                                        <a href="{{ route('register') }}" class="btn btn-sm"
                                            style="background-color: #007BFF; color: white;">
                                            Crear una cuenta
                                        </a>

                                        <a href="#" onclick="showMessage()" class="btn btn-sm"
                                            style="color: #007BFF; font-weight: bold;">
                                            ¿Olvidaste tu contraseña?
                                        </a>
                                    </div>

                                    <script>
                                        function showMessage() {
                                            alert("¡Por favor, contacta al administrador para restablecer tu contraseña!");
                                        }
                                    </script>

                                    <!-- Login button -->
                                    <div class="col-12 text-center mt-4">
                                        <button type="submit" class="btn btn-lg"
                                            style="background-color: #007BFF; color: white;">
                                            Iniciar sesión
                                        </button>
                                    </div>
                                </div>
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
@endsection