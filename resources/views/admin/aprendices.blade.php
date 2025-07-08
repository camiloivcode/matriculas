@extends('theme.plantillaAdmin')
@section('contenido')
@php
    $indice = 0;
@endphp

    <main class="container section_card mt-5">
        <section class="text-center text-secundary">
            <div class="">
                <h3 style="color: #39A900">Bienvenido a la Lista de Nuestros Nuevos Aprendices Sena!</h3>
                <p class="fs-5 px-4">Aquí podras observar y registrar ya sea por medio de archivos excel o individualmente
                    los datos de los aprendices que se van ha matricular a las nuevas fichas, para  así descargar sus documentos.
                </p>
            </div>
        </section><!-- End documentos Section -->

        <section class="row mt-5 justify-content-center">
            <div class="col-lg-8">

                @if (isset($errors) && $errors->any())
                    <div class="alert alert-danger fw-semibold mb-4" role="alert">
                        Error en la importación del archivo las columnas o datos del excel no son validos!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger fw-semibold mb-4" role="alert">
                        {{session('error')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session('success'))
                    <div class="alert alert-success fw-semibold mb-4" role="alert">
                        {{session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <article class="card border-0 shadow">

                    <div class="card-header">
                        <h4 class="mb-0">
                            <i class="bi bi-people-fill"></i>
                            Importarción de Listado de Aprendices
                        </h4>
                    </div>

                    <div class="card-body bg-light">

                        <form action="{{route('aprendices.store')}}" method="POST" enctype="multipart/form-data" class="row needs-validation" novalidate>
                            @csrf
                            <div class="mb-3 col-md-5">
                                <label for="ficha" class="form-label fw-semibold">
                                    <i class="bi bi-key-fill"></i>
                                    Número de la Ficha a Importar:
                                </label>
                                <input class="form-control shadow-sm" type="number" id="ficha" name="ficha" placeholder="Ingresar el número de la ficha" required>
                                <div class="invalid-feedback fw-semibold"><i class="bi bi-exclamation-circle-fill"></i> Por favor ingresé el número de la ficha</div>
                            </div>

                            <div class="mb-3 col-md-7">
                                <label for="listaAprendices" class="form-label fw-semibold">
                                    <i class="bi bi-file-earmark-excel-fill"></i> 
                                    Ingresé el listado de aprendices de la ficha:
                                </label>
                                <input class="form-control shadow-sm" type="file" id="listaAprendices" name="listaAprendices" accept=".xlsx" required>
                                <div class="invalid-feedback fw-semibold"><i class="bi bi-exclamation-circle-fill"></i> Por favor ingresé un archivo de tipo excel(.xlsx)</div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success fw-semibold shadow-sm my-2">Importar Listado <i class="bi bi-cloud-arrow-up-fill"></i></button>
                                <button type="button" class="btn btn-primary fw-semibold shadow-sm ms-2" data-bs-toggle="modal" data-bs-target="#registrarAprendizModal">Registrar Aprendiz <i class="bi bi-person-fill"></i></button>
                            </div>

                        </form>
                    </div>

                </article>

            </div>
        </section>

        <section class="card border-0 shadow m-lg-5 mt-5">

            <div class="card-header">
                <h4 class="mb-0 text-center">
                    <i class="bi bi-people-fill"></i>
                    Listado de Aprendices Registrados
                </h4>
            </div>

            <div class="card-body bg-light p-4">
                <table id="aprendices" class="table table-striped dt-responsive nowrap" style="width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col">Descargar Documentos</th>
                            <th scope="col">Nombre del Aprendiz</th>
                            <th scope="col">Documento</th>
                            <th scope="col">Tipo Documento</th>
                            <th scope="col">Ficha</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Funciones</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach ($aprendices as $aprendiz )
                        <tr class="fw-semibold">
                            <td class="text-center">
                            @if ($estados[$indice])
                                <a href="/descargarAprendiz/{{$aprendiz->id}}/{{$aprendiz->numero_documento}}/{{$aprendiz->ficha->ficha}}" class="btn btn-sm btn-primary shadow-sm fw-semibold">
                                    Descargar <i class="bi bi-cloud-download"></i>
                                </a>
                            @else
                                <button class="btn btn-sm btn-secondary shadow-sm fw-semibold" disabled>
                                    Descargar <i class="bi bi-cloud-download"></i>
                                </button>
                            @endif
                            </td> 
                            
                            <td>{{$aprendiz->nombre_completo}}</td>
                            <td>{{$aprendiz->numero_documento}}</td>
                            <td>{{$aprendiz->tipo_documento}}</td>
                            <td>{{$aprendiz->ficha->ficha}}</td>
                            <td>{{$aprendiz->estado}}</td>
                            <td>
                                <button class="btn btn-sm btn-danger shadow-sm fw-semibold" data-bs-toggle="modal" data-bs-target="#eliminar{{$aprendiz->id}}">Eliminar <i class="bi bi-trash3-fill"></i></button>
                                <button class="btn btn-sm btn-warning shadow-sm fw-semibold" data-bs-toggle="modal" data-bs-target="#editarAprendiz{{$aprendiz->id}}">Editar <i class="bi bi-pencil-square"></i></button>
                            </td>
                        </tr>

                        @php
                            $indice++
                        @endphp

                        @include('theme.modalEliminar')
                        @include('theme.modalEditarAprendiz')
                    @endforeach
                    </tbody>
                </table>
            </div>

        </section>

        @include('theme.modalRegistrarAprendiz')

    </main>
    <!-- Jquery -->
    <script src="{{ asset('js/jquery.js')}}"></script>
    <script>
       $(document).ready(function() {
            $('#aprendices').DataTable();
        } );
    </script>

@endsection
