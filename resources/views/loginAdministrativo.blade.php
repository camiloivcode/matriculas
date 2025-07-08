<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrículas Programas CNCA</title>
    <!-- Fav Icon -->
    <link rel="shortcut icon" href="{{ asset('img/logo_sena.svg') }}"  type="image/x-icon">
    <!-- Start Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="{{ asset('font/bootstrap-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header id="navbar">
        <div class="container-md py-3">
            <div class="row">
                <div class="col-md-9 d-flex">
                    <img src="{{ asset('img/logo_sena_blanco.svg') }}" alt="" class="logo_nav mt-1 me-4" >
                    <h1 class="text_nav mt-2 h4">
                        Plataforma Administrativa de Descarga de Documentos -<br>Matruclación de Nuevos Aprendices CNCA
                    </h1>
                </div>
            </div>
        </div>
    </header>

    <main class="container-fluid my-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-7 col-lg-5 col-xl-4 ">

                <section class="login shadow">

                    <img src="{{ asset('img/logo_sena.svg') }}" alt="Logo Sena">
                    <h1 class="fw-normal fs-2 mb-3 mt-1" style="color: #39a900">Administrativos CNCA</h1>

                    <form action="{{route('iniciar_session')}}" method="POST">
                        @csrf
                        <div class="div_usuario">
                            <div class="fromulario__grupo mb-3" id="div-documento">
                                <div class="inputContainer">
                                    <input type="number" class="input" placeholder=" " name="documento" id="i_documento" value="{{ old('documento') }}" >
                                    <label for="" class="label">Documento</label>
                                </div>
                                @error('documento')
                                    <p class="text-danger fw-semibold text-start">
                                        <i class="bi bi-exclamation-circle-fill"></i>
                                        Ingrese su número de documento
                                    </p>
                                @enderror
                        </div>

                        <div class="fromulario__grupo mb-3" id="div-password">
                            <div class="inputContainer">
                                <input type="password" class="input" placeholder=" " id="elpassword" name="password" value="{{ old('password') }}" >
                                <label for="" class="label">Contraseña</label>
                            </div>
                            @error('password')
                                <p class="text-danger fw-semibold text-start">
                                    <i class="bi bi-exclamation-circle-fill"></i>
                                    Ingrese su contraseña
                                </p>
                            @enderror
                        </div>

                        <div class="form-check recor mb-4">
                            <input class="form-check-input" type="checkbox" value="" id=clickme>
                            <label class="form-check-label labelingre" for="clickme">
                                Mostrar contraseña
                            </label>
                        </div>

                        <div class="row">
                            <div class="col-md-4 ">
                                <button type="submit" class="btn btn-success botonIngresar" name="ingreso" id="ingreso">Ingresar</button>
                            </div>
                        </div>

                    </form>

                    @if(session('error'))
                        <div class="alert alert-danger fw-semibold mb-0 mt-3 p-2" role="alert">
                            Usuario no encontrado, su documento o Contaseña son incorrectos!
                        </div>
                    @endif

                </section>
            </div>
        </div>
    </main>

    <!-- Start Bootstrap -->
    <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
    <!-- Jquery -->
    <script src="{{ asset('js/jquery.js')}}"></script>
    <script src="{{ asset('js/show_password.js')}}"></script>
    <script src="{{ asset ('js/script.js')}}"></script>
</body>
</html>
