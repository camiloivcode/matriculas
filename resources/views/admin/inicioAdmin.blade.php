@extends('theme.plantillaAdmin')
@section('contenido')

<!-- ======= Welcome Section ======= -->
<section id="welcome" class="d-flex align-items-center">

    <div class="container">
    <div class="row">
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
        <h1>Bienvenido Administrador Sena CNCA!</h1>
        <h2 class="text-secondary">Te damos una calida bienvenida al aplicativo de Matrículas, donde podras registrar y descargar los documentos de los nuevos aprendices Sena CNCA.</h2>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img p-lg-5">
            <img src="{{ asset('img/logo_sena.svg') }}" class="img-fluid" alt="Logo Sena">
        </div>
    </div>
    </div>

</section><!-- End Welcome -->

<main id="mainAdmin">

    <!-- ======= About Administrativo Section ======= -->
    <section class="aboutAdmin">
        <div class="container">

            <div class="row">
                <div class="col-xl-5 col-lg-6 d-flex justify-content-center video-box align-items-stretch position-relative border rounded-4 shadow">
            </div>

            <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                <h3>Qué es Matrículas Sena CNCA?</h3>
                <p class="fw-semibold">Matrículas Sena es un aplicativo web del Centro Nacional Colombo Aleman, que tiene como finalidad
                    facilitar el envío, registro, importación y descarga de las nuevas fichas y aprendices matriculados a los distintos programas
                    que ofrece el Sena CNCA.
                </p>

                <div class="icon-box">
                <div class="icon"><i class="bi bi-send-check-fill"></i></div>
                <h4 class="title"><a class="fs-5" href="{{route('homeAdmin')}}">Registro Fichas</a></h4>
                <p class="description fw-semibold">
                    MatrÍculas Sena cuenta con un apartado de registro para las nuevas fichas donde podras crear y editar.
                </p>
                </div>

                <div class="icon-box">
                <div class="icon"><i class="bi bi-person-bounding-box"></i></div>
                <h4 class="title"><a class="fs-5" href="{{route('aprendices')}}">Registrar Aprendiz</a></h4>
                <p class="description fw-semibold">
                    Matrículas Sena tiene el propósito de hacerte más facil la creación
                    de los nuevos aprendices, aquí podras crear, editar, eliminar e importar.
                </p>
                </div>

                <div class="icon-box">
                <div class="icon"><i class="bi bi-cloud-download-fill"></i></div>
                <h4 class="title"><a class="fs-5" href="{{route('aprendices')}}">Descargar Documentos</a></h4>
                <p class="description fw-semibold">
                    Matrículas Sena te ofrece las opciones de decargar los documentos de forma individual por aprendiz o 
                    descargar toda la ficha una vez esta se haya completado.
                </p>
                </div>

            </div>
            </div>

        </div>
    </section><!-- End About Administrativo Section -->

    <!-- ======= Card Home Section ======= -->
    <section class="cardHome mb-5 section-bg">
        <div class="container">

            <div class="section-title">
                <h2>Servicios Matriculas Sena CNCA</h2>
                <p class="fw-semibold text-white fs-5">
                    Administrador conoce más y utiliza los servicios que te ofrecemos para el registro y descarga de los documentos!
                </p>
            </div>

            <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="icon-box">
                <div class="icon"><i class="bi bi-book-fill"></i></div>
                    <a class="text-decoration-none" href="{{route('homeAdmin')}}"><h3 class="title">Fichas y Programas</h3></a>
                    <p class="description fw-semibold fs-5 text-secondary">
                        Regitra las nuevas fichas y programas que ofrece el Sena CNCA o descarga las fichas que ya se han completado.
                    </p>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="icon-box">
                <div class="icon"><i class="bi bi-people-fill"></i></div>
                    <a class="text-decoration-none" href="{{route('aprendices')}}"><h3 class="title">Aprendices</h3></a>
                    <p class="description fw-semibold fs-5 text-secondary">
                        Regitra e importa el listado de aprendices a los nuevos programas también, descarga los documentos de cada aprendiz.
                    </p>
                </div>
            </div>
            
            </div>

        </div>
    </section><!-- End Card Home Section -->


</main><!-- End #main -->
@endsection