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
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
    <!-- Personal styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background: #39A900">
        <div class="container-fluid">
            <a class="navbar-brand text-white fw-semibold fs-4" href="{{route('inicioAdmin')}}">Matrículas Sena</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item me-3">
                <a class="nav-link text-white fw-semibold fs-5" href="{{route('inicioAdmin')}}">Inicio <i class="bi bi-house-door"></i></a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link text-white fw-semibold fs-5" href="{{route('homeAdmin')}}">Fichas <i class="bi bi-book-fill"></i></a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link text-white fw-semibold fs-5" href="{{route('aprendices')}}">Aprendices <i class="bi bi-people-fill"></i></a>
                </li>
            </ul>
            <span class="navbar-text">
                <a class="nav-link text-white fw-semibold fs-5" href="{{route('logout')}}">Cerrar Sesión <i class="bi bi-box-arrow-right"></i></a>
            </span>
            </div>
        </div>
    </nav>
    
    @yield('contenido')

    <footer class="container-fluid p-3 bg-light" >
      <div class="w-100 text-center mt-1">
        <span class="d-block text-center fw-semibold" style="color: #39A900">FABRICA TIC</span>
      </div>
      <div class="w-100 text-center text-secondary fw-semibold">
        Copyright &copy; Sena CNCA 2023
      </div>
    </footer>
    
    <!-- Start Bootstrap -->
    <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/formValidate.js')}}"></script>
    
</body>
</html>