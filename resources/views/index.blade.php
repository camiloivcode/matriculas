
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Matrículas Sena</title>
    <!-- Fav Icon -->
    <link rel="shortcut icon" href="{{ asset('img/logo_sena.svg') }}"  type="image/x-icon">
    <!-- Start Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="{{ asset('font/bootstrap-icons.css') }}">
    <!-- Personal styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header id="navbar" class="nav_login_usuarios">
        <div class="container-md py-3">
            <div class="row">
                <div class="col-md-7 d-flex">
                    <img src="{{ asset('img/logo_sena_blanco.svg') }}" alt="" class="logo_nav mt-1 me-4" >
                    <h1 class="text_nav mt-2 h4">
                        Plataforma de Envío de Documentos - Matruclación de Nuevos Aprendices CNCA
                    </h1>
                </div>
            </div>
        </div>
    </header>


    <main class="container-fluid my-5">
        <div class="row h-100 justify-content-center align-items-center d-flex">
            <div class="col-md-7 col-lg-5 col-xl-4 ">
                <section class="login shadow">

                    <img src="{{ asset('img/logo_sena.svg') }}" alt="Logo Sena">
                    <h1 class="fw-normal fs-2 mb-3 mt-1" style="color: #39a900">Iniciar Sesión</h1>

                    <form action="{{ route('inicio') }}" method="POST">
                        @csrf
                        <div class="div_usuario">
                            <div class="fromulario__grupo mb-3" id="div-documento">
                                <div class="inputContainer">


                                    <select class="form-select border-3 select-documento" name="tipo_documento">
                                        <option selected disabled>Seleccione Tipo de Documento</option>
                                        <option value="TI">Tarjeta de Identidad</option>
                                        <option value="CC">Cédula de Ciudadania</option>
                                        <option value="CE">Cédula de Extranjería</option>
                                        <option value="PP">Permiso Especial de Permanincia</option>
                                    </select>

                                </div>
                            </div>
                            @error('tipo_documento')
                                <div class="text-danger fw-semibold mb-3">
                                    <i class="bi bi-exclamation-circle-fill"></i>
                                    Requerido: Ingrese su tipo de documento!
                                </div>
                            @enderror

                        <div class="fromulario__grupo mb-3" id="div-password">
                            <div class="inputContainer">
                                <input type="number" class="input" placeholder=" " onkeyup="mostrar(this.valuex)" id="elpassword" name="numero_documento">
                                <label for="" class="label">Documento</label>
                            </div>
                        </div>

                        @error('numero_documento')
                            <div class="text-danger fw-semibold mb-3">
                                    <i class="bi bi-exclamation-circle-fill"></i>
                                    Requerido: Ingrese su número de documento!
                            </div>
                        @enderror

                        <div class="row">
                            <div class="col-md-4 ">
                                <button type="submit" class="btn btn-success botonIngresar" name="ingreso" id="ingreso">Ingresar</button>
                            </div>
                        </div>

                    </form>

                    @if (session('error'))
                        <div class="alert alert-danger fw-semibold mb-0 mt-3 p-2" role="alert">
                            {{session('error')}}
                        </div>
                    @elseif ($flash = Session::get('exito'))
                            <div class="alert alert-success alert-dismissible fade show fw-semibold mb-0 mt-3" role="alert">
                                <strong>Feliciataciones!</strong> {{ $flash }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    @endif

                </section>
            </div>
        </div>
    </main>

</body>

    <!-- Start Bootstrap -->
    <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
    <!-- Jquery -->
    <script src="{{ asset('js/jquery.js')}}"></script>
    <script src="{{ asset('js/formValidate.js')}}"></script>
</html>
