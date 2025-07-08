@extends('theme.plantillaAdmin')
@section('contenido')
@php
    $indice = 0;
@endphp

    <main class="container section_card mt-5">
        <section class="text-center text-secundary">
            <div class="">
                <h3 style="color: #39A900">Querido Administrador Registra las Nuevas Fichas Aquí!</h3>
                <p class="fs-5 px-4">Aquí podras registrar las nuevas fichas del Sena CNCA con sus respetivos 
                    programas de formación y también, podras descargar los documentos de los aprendices matriculados 
                    una vez la ficha éste completa.
                </p>
            </div>
        </section><!-- End documentos Section -->

        <section class="row justify-content-center mt-5">
            <div class="col-lg-8">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show fw-semibold mb-0 mb-4" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

                <article class="card border-0 shadow">

                    <div class="card-header">
                        <h4 class="mb-0">
                            Registro de Nuevas Fichas CNCA
                        </h4>
                    </div>

                    <div class="card-body bg-light">
                        <form class="row g-3" action="{{route('crearFicha')}}" method="POST">
                            @csrf
                            <div class="col-md-6">
                                <label for="ficha" class="form-label fw-semibold"><i class="bi bi-key"></i> Número de Ficha:</label>
                                <input type="number" class="form-control shadow-sm" id="ficha" name="ficha" value="{{ old('ficha') }}"> 
                                @error('ficha')
                                    <p class="fw-semibold text-danger mt-2">
                                        <i class="bi bi-exclamation-circle"></i>
                                        {{'Ingrese el número de la ficha'}}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="programa" class="form-label fw-semibold"><i class="bi bi-book"></i> Programa de Formación:</label>
                                <input type="text" class="form-control shadow-sm" id="programa" name="programa" value="{{ old('programa') }}">
                                @error('programa')
                                    <p class="fw-semibold text-danger mt-2">
                                        <i class="bi bi-exclamation-circle"></i>
                                        {{'Ingrese el nombre del programa'}}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-md-4 col-lg-6">
                                <label for="nivelFormacion" class="form-label fw-semibold"><i class="bi bi-bar-chart"></i> Nivel de Formación:</label>
                                <select class="form-select shadow-sm" id="nivelFormacion" name="nivelFormacion">
                                    <option selected disabled>Seleccione...</option>
                                    <option value="TÉCNICO">TÉCNICO</option>
                                    <option value="TÉCNOLOGO">TÉCNOLOGO</option>
                                </select>
                                @error('nivelFormacion')
                                    <p class="fw-semibold text-danger mt-2">
                                        <i class="bi bi-exclamation-circle"></i>
                                        {{'Seleccione el nivel de formación'}}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-md-4 col-lg-3">
                                <label for="fechaInicio" class="form-label fw-semibold"><i class="bi bi-calendar-date"></i> Fecha Inicio:</label>
                                <input type="date" class="form-control shadow-sm" id="fechaInicio" name="fechaInicio">
                                @error('fechaInicio')
                                    <p class="fw-semibold text-danger mt-2">
                                        <i class="bi bi-exclamation-circle"></i>
                                        {{'Ingrese la fecha de inicio de la ficha'}}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-md-4 col-lg-3">
                                <label for="fechaFin" class="form-label fw-semibold"><i class="bi bi-calendar-date"></i> Fecha Fin:</label>
                                <input type="date" class="form-control shadow-sm" id="fechaFin" name="fechaFin">
                                @error('fechaFin')
                                    <p class="fw-semibold text-danger mt-2">
                                        <i class="bi bi-exclamation-circle"></i>
                                        {{'Ingrese la fecha de fin de la ficha'}}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button class="btn btn-success fw-semibold shadow-sm" type="submit">Crear nueva ficha <i class="bi bi-send-check"></i></button>
                            </div>
                        </form>
                    </div>

                </article>
            </div>
        </section>

        <section class="card border-0 shadow m-lg-5 mt-5">

            <div class="card-header">
                <h4 class="mb-0 text-center">
                    <i class="bi bi-list-check"></i>
                    Listado de Fichas Registradas CNCA
                </h4>
            </div>

            <div class="card-body bg-light p-4">
                <table id="fichas" class="table table-striped dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Ficha</th>
                            <th scope="col">Programa</th>
                            <th scope="col">Aprendices</th>
                            <th scope="col">Enviados</th>
                            <th scope="col">Nivel</th>
                            <th scope="col">Fecha Inicio</th>
                            <th scope="col">Fecha Fin</th>
                            <th scope="col">Funciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fichas as $ficha)
                            <tr class="fw-semibold">
                                <td>{{$ficha->ficha}}</td>
                                <td>{{$ficha->nombre_programa}}</td>
                                <td>{{$listaTotalAprendices[$indice]}}</td>
                                <td>{{$listaTotalArchivos[$indice]}}</td>
                                <td>{{$ficha->nivel_formacion}}</td>
                                <td>{{$ficha->fecha_inicio}}</td>
                                <td>{{$ficha->fecha_fin}}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-warning shadow-sm fw-semibold" data-bs-toggle="modal" data-bs-target="#editarModal{{$ficha->id}}">Editar <i class="bi bi-pencil-square"></i></button>
                                    @if ($listaTotalAprendices[$indice] == $listaTotalArchivos[$indice])
                                    <a href="/descargarFicha/{{$ficha->ficha}}" class="btn btn-sm btn-primary shadow-sm fw-semibold">
                                        Descargar <i class="bi bi-cloud-download"></i>
                                    </a>
                                    @else
                                        <button class="btn btn-sm btn-secondary shadow-sm fw-semibold" disabled>
                                            Descargar <i class="bi bi-cloud-download"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr> 
                            @php
                                $indice++
                            @endphp
                            @include('theme.modalEditar')
                        @endforeach
                    </tbody> 
                </table>
            </div>

        </section>

    </main>
    <!-- Jquery -->
    <script src="{{ asset('js/jquery.js')}}"></script>
    <script>
       $(document).ready(function() {
            $('#fichas').DataTable();
        } );
    </script>
@endsection