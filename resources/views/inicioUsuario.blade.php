<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Matrículas Programas CNCA</title>
    <!-- Fav Icon -->
    <link rel="shortcut icon" href="{{ asset('img/logo_sena.svg') }}"  type="image/x-icon">
    <!-- Start Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="{{ asset('font/bootstrap-icons.css') }}">
    <!-- Personal styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>

  <header id="header" class="header d-flex align-items-center sticked">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <h1>Matrículas Sena</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#comoInscribirse">Cómo Matricularse?</a></li>
          <li><a href="#documentos">Cargar Documentos</a></li>
          <li><a href="{{ route('indexAprendiz') }}">Salir <i class="bi bi-arrow-bar-right"></i></a></li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <small>(<a href="{{ asset('GFPI-F-129_formato_tratamiento_de_datos_menor_de_edad.docx') }}" download >Descargar Tratamiento de Datos Click Aquí</a>)</small></label>

    <!-- Modal -->
    @if ($tipo == 'CC')
    <div class="modal modal_inicio_usuario fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Recuerda <i class="bi bi-exclamation-circle ms-2"></i></h4>
            </div>
            <div class="modal-body">
                <p class="text_modal">Para poder realizar el envió de los archivos correspondientes,
                    debes descargar y llenar el Compromiso del Aprendiz.</p>
                <div class="btns_descargas">
                    <a class="btn btn-warning btn_descargar" href="{{ asset('GFPI-F-015_Formato_Compromiso_del_Aprendiz_V2.docx') }}" download >Descargar compromiso del aprendiz  <i class="bi bi-download ms-2"></i></a>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger btn_cerrar_modal" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
        </div>
    </div>
    @elseif ($tipo == 'TI')
    <div class="modal modal_inicio_usuario fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Recuerda<i class="bi bi-exclamation-circle ms-2"></i></h4>
            </div>
            <div class="modal-body">
                <p class="text_modal">Para poder realizar el envió de los archivos correspondientes,
                    debes descargar y llenar los siguientes archivos:</p>
                <div class="btns_descargas">
                    <a href="{{ asset('GFPI-F-015_Formato_Compromiso_del_Aprendiz_V2.docx') }}" download  class="btn btn-warning btn_descargar">Descargar compromiso del aprendiz  <i class="bi bi-download ms-2"></i></a>
                    <a class="btn btn-warning mt-1 btn_descargar" href="{{ asset('GFPI-F-129_formato_tratamiento_de_datos_menor_de_edad.docx') }}" download >Descargar tratamiento de datos <i class="bi bi-download ms-2"></i></a>
                </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger btn_cerrar_modal" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
        </div>
    </div>
    @elseif ($tipo == 'CE')
    <div class="modal modal_inicio_usuario fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Recuerda <i class="bi bi-exclamation-circle ms-2"></i></h4>
            </div>
            <div class="modal-body">
                <p class="text_modal">Para poder realizar el envió de los archivos correspondientes,
                    debes descargar y llenar el Compromiso del Aprendiz.</p>
                <div class="btns_descargas">
                    <a class="btn btn-warning btn_descargar" href="{{ asset('GFPI-F-015_Formato_Compromiso_del_Aprendiz_V2.docx') }}" download >Descargar compromiso del aprendiz  <i class="bi bi-download ms-2"></i></a>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger btn_cerrar_modal" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
        </div>
    </div>
    @elseif ($tipo == 'PP')
    <div class="modal modal_inicio_usuario fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Recuerda <i class="bi bi-exclamation-circle ms-2"></i></h4>
            </div>
            <div class="modal-body">
                <p class="text_modal">Para poder realizar el envió de los archivos correspondientes,
                    debes descargar y llenar el Compromiso del Aprendiz.</p>
                <div class="btns_descargas">
                    <a class="btn btn-warning btn_descargar" href="{{ asset('GFPI-F-015_Formato_Compromiso_del_Aprendiz_V2.docx') }}" download >Descargar compromiso del aprendiz  <i class="bi bi-download ms-2"></i></a>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger btn_cerrar_modal" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
        </div>
    </div>
    @endif
    <!-- END - Modal -->


    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">
      <div class="container position-relative">
        <div class="row gy-5 pt-5" data-aos="fade-in">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
            <h2>Bienvenido a la Plataforma de <span>Envío de Documentos</span></h2>
            <p class="fs-5">Aquí podras relizar el envío de los documentos necesarios para matricularte de forma correcta a nuestros programas Sena CNCA.</p>
            <div class="d-flex justify-content-center justify-content-lg-start">
              <a href="#documentos" class="btn-get-started">Cargar Documentos <i class="bi bi-arrow-right-circle"></i></a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 img_hero ">
            <img src="{{ asset('img/logo_sena_blanco.svg') }}" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
          </div>
        </div>
      </div>

      <div class="icon-boxes position-relative">
        <div class="container position-relative">
          <div class="row gy-4 mt-5">

            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="icon-box">
                <div class="icon"><i class="bi bi-easel"></i></div>
                <h4 class="title"><a class="stretched-link">Programa</a></h4>
                <p>{{$ficha->nombre_programa}}</p>
              </div>
            </div>
            <!--End Icon Box -->

            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
              <div class="icon-box">
                <div class="icon"><i class="bi bi-card-list"></i></i></div>
                <h4 class="title"><a class="stretched-link">Número de Ficha</a></h4>
                <p>{{$ficha->ficha}}</p>
              </div>
            </div>
            <!--End Icon Box -->

            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
              <div class="icon-box">
                <div class="icon"><i class="bi bi-calendar-week"></i></div>
                <h4 class="title"><a class="stretched-link">Fecha de Inico</a></h4>
                <p>{{$ficha->fecha_inicio}}</p>
              </div>
            </div>
            <!--End Icon Box -->

            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
              <div class="icon-box">
                <div class="icon"><i class="bi bi-command"></i></div>
                <h4 class="title"><a class="stretched-link">Tipo de Formación</a></h4>
                <p>{{$ficha->nivel_formacion}}</p>
              </div>
            </div>
            <!--End Icon Box -->
            <span id="comoInscribirse"></span>
          </div>
        </div>
      </div>
      </div>

    </section>

  <!-- ======= documentos Section ======= -->
  <section class="documentos">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Conoce más sobre cómo envíar tus documentos</h2>
        <p class="fs-5">Para matricularte de forma correcta a nuestros programas de formación
          nivel técnico o tecnólogo debes envíar el siguiente formulario con los documentos
          requeridos, todos en formato <strong>PDF</strong>, no olvides diligenciar el <strong>Compromiso al Aprendiz</strong>
          y el <strong>Formato de Tratamiento de Datos al Menor de Edad</strong> si eres menor de edad con el documento de identidad
          del adulto responsable; éstos formatos los podras encontrar anexados en el formulario.
        </p>

      </div>
    </div>
  </section><!-- End documentos Section -->

  <main class="container mb-5" id="documentos">
    <section class="card border-0 shadow" data-aos="fade-up">

      <article class="card-header header-card-ocument">
        <h4 class="mb-0 text-center fw-bold">
          Formulario de Matrículas y Envío de Documentos <i class="bi bi-filetype-pdf"></i>
        </h4>
      </article>

      <article class="card-body bg-white p-4">
        <form action="{{route('guardar')}}" method="post" enctype="multipart/form-data" class="row needs-validation" novalidate>

            @csrf

            @if (@isset($tipo))
            <div class="mb-3 col-12 col-md-6 col-lg-3 ">
                <label for="tipoDocumento" class="form-label fw-semibold">Tipo de Documento:</label>
                <input type="text" disabled class="form-control border-2 shadow-sm" value="{{$tipo}}"  id="tipoDocumento" required>
                <div class="invalid-feedback">
                  <i class="bi bi-exclamation-circle"></i>
                  Seleccione su tipo de documento!
                </div>
              </div>
            @endif


          @if (@isset($documento))
          <div class="mb-3 col-12 col-md-6 col-lg-3 ">
            <label for="numeroDocumento" class="form-label fw-semibold">Número de Documento:</label>
            <input type="number" class="form-control border-2 shadow-sm" id="resultado_documento" name="numero_documento" value="{{$documento}}" required>
            <div class="invalid-feedback">
              <i class="bi bi-exclamation-circle"></i>
              Ingrese su número de documento!
            </div>
          </div>

          @endif

          <div class="mb-3 col-12 col-lg-6">
            <label for="documentoIdentidad" class="form-label fw-semibold">Copia de Documento de Identidad: <small>(Ampliada al 150% por ambas caras)</small></label>
            <input type="file" accept=".pdf" class="form-control border-2 shadow-sm" id="documentoIdentidad" name="documento_identidad" required>
            <div class="invalid-feedback">
              <i class="bi bi-exclamation-circle"></i>
              Éste documento es requerido!
            </div>
          </div>

          <div class="mb-3 col-12 col-lg-6 mt-2">
            <label for="diplomaActaBachiller" class="form-label fw-semibold">Diploma o Acta de Grado Bachiller:</label>
            <input type="file" accept=".pdf" class="form-control border-2 shadow-sm" id="diplomaActaBachiller" name="diploma_acta_bachiller" required>
            <div class="invalid-feedback">
              <i class="bi bi-exclamation-circle"></i>
              Éste documento es requerido!
            </div>
          </div>

          @if ($ficha->nivel_formacion == "TÉCNOLOGO")
            <div class="mb-3 col-12 col-lg-6 mt-2">
                <label for="icfes" class="form-label fw-semibold">Resultado de Pruebas ICFES: <small>(Pruebas saber 11)</small></label>
                <input type="file" accept=".pdf" class="form-control border-2 shadow-sm" id="icfes" name="icfes" required>
                <div class="invalid-feedback">
                <i class="bi bi-exclamation-circle"></i>
                Éste documento es requerido!
                </div>
            </div>
          @endif

          <div class="mb-3 col-12 col-lg-6 mt-2">
            <label for="certificadoEPS" class="form-label fw-semibold">Certificado de Afiliación EPS:
              <small>(Descargar certificado <a href="https://www.adres.gov.co/consulte-su-eps" target="_blank">ADRES AQUÍ</a>)</small></label>
            <input type="file" accept=".pdf" class="form-control border-2 shadow-sm" id="certificadoEPS" name="certificado_eps" required>
            <div class="invalid-feedback">
              <i class="bi bi-exclamation-circle"></i>
              Éste documento es requerido!
            </div>
          </div>

          <div class="mb-3 col-12 col-lg-6 mt-2">
            <label for="compromisoAprendiz" class="form-label fw-semibold">Compromiso del Aprendiz:
              <small>(<a href="{{ asset('GFPI-F-015_Formato_Compromiso_del_Aprendiz_V2.docx') }}" download >Descargar Compromiso del Aprendiz Click Aquí</a>)</small></label>
            <input type="file" accept=".pdf" class="form-control border-2 shadow-sm" id="compromisoAprendiz" name="compromiso_aprendiz" required>
            <div class="invalid-feedback">
              <i class="bi bi-exclamation-circle"></i>
              Éste documento es requerido!
            </div>
          </div>

          @if ($tipo == 'TI')
            <p class="col-12 mb-3 fs-5 fw-semibold text-center mt-3">Tratamiento de Datos al Aprendiz Menor de Edad:</p>

            <div class="mb-3 col-12 col-lg-6">
                <label for="tratamientoDatos" class="form-label fw-semibold">Tratamiento de Datos:
                <small>(<a href="{{ asset('GFPI-F-129_formato_tratamiento_de_datos_menor_de_edad.docx') }}" download >Descargar Tratamiento de Datos Click Aquí</a>)</small></label>
                <input type="file" accept=".pdf" class="form-control border-2 shadow-sm" id="tratamientoDatos" name="tratamientos_datos" required>
                <div class="invalid-feedback">
                <i class="bi bi-exclamation-circle"></i>
                Éste documento es requerido!
                </div>
            </div>

            <div class="mb-3 col-12 col-lg-6">
                <label for="documentoAcudiente" class="form-label fw-semibold">Documento de Identidad Acudiente: <small>(Ampliada al 50% por ambas caras)</small></label>
                <input type="file" accept=".pdf" class="form-control border-2 shadow-sm" id="documentoIdentidad" name="documento_acudiente" required>
                <div class="invalid-feedback">
                <i class="bi bi-exclamation-circle"></i>
                Éste documento es requerido!
                </div>
            </div>


          @endif

          <div class="col-12 py-2 text-center mt-2">
            <button type="submit" class="btn btn-success fw-semibold fs-5 shadow-sm">Enviar Documentos <i class="bi bi-send-check"></i></button>
          </div>
        </form>
      </article>

    </section>
  </main>

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
    <!-- Jquery -->
    <script src="{{ asset('js/jquery.js')}}"></script>
    <script src="{{ asset('js/script.js')}}"></script>
    <script src="{{ asset('js/formValidate.js')}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
