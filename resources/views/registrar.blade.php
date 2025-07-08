<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <!-- Start Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <main class="container-fluid vh-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-6 col-lg-5 bg-light shadow p-4">
                <form method="POST" action="{{ route('validar_registro') }}">
                    @csrf
                    <h1 class="fs-4 fw-normal text-success">Registrar Usuarios Administrativos</h1>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos">
                    </div>

                    <div class="mb-3">
                        <label for="documento" class="form-label">Documento</label>
                        <input type="number" class="form-control" id="documento" name="documento">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
 
                    <button type="submit" class="btn btn-success">Registrar</button>

                </form>
            </div>
        </div>
    </main>

    <!-- Start Bootstrap -->
    <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>