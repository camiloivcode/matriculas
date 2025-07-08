<!-- Modal -->
<div class="modal fade" id="registrarAprendizModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Aprendiz en una Ficha</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('crearAprendiz') }}" method="POST" class="needs-validation" novalidate>
        <div class="modal-body row">
        @csrf
            <div class="col-12 mt-2">
                <label for="tipo_documento" class="form-label fw-semibold"><i class="bi bi-key"></i> Tipo de Documento:</label>
                <select class="form-select border-3 select-documento" name="tipo_documento" required>
                    <option selected disabled value="">Seleccione Tipo de Documento</option>
                    <option value="TI">Tarjeta de Identidad</option>
                    <option value="CC">Cédula de Ciudadania</option>
                    <option value="CE">Cédula de Extranjería</option>
                    <option value="PP">Permiso Especial de Permanincia</option>
                </select>
                <div class="invalid-feedback">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    Requerido: Ingrese el tipo de documento!
                </div>
            </div>

            <div class="col-12 mt-2">
                <label for="numeroDocumento" class="form-label fw-semibold"><i class="bi bi-book"></i> Número de Documento:</label>
                <input type="number" class="form-control shadow-sm" id="numeroDocumento" name="numeroDocumento" required>
                <div class="invalid-feedback">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    Requerido: Ingrese el número de documento!
                </div>
            </div>

            <div class="col-md-12 mt-2">
                <label for="nombre" class="form-label fw-semibold"><i class="bi bi-bar-chart"></i> Nombre del Aprendiz:</label>
                <input type="text" class="form-control shadow-sm" id="nombre" name="nombre" required>
                <div class="invalid-feedback">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    Requerido: Ingrese el nombre del aprendiz!
                </div>
            </div>

            <div class="col-md-12 mt-2">
                <label for="estado" class="form-label fw-semibold"><i class="bi bi-bar-chart"></i> Estado:</label>
                <input type="text" class="form-control shadow-sm" id="estado" name="estado" required>
                <div class="invalid-feedback">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    Requerido: Ingrese el estado del aprendiz!
                </div>
            </div>

            <div class="col-12 mt-2">
                <label for="ficha" class="form-label fw-semibold"><i class="bi bi-book"></i>Número de Ficha:</label>
                <input type="number" class="form-control shadow-sm" id="ficha" name="ficha" required>
                <div class="invalid-feedback">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    Requerido: Ingrese la ficha del programa!
                </div>
            </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary fw-semibold shadow-sm" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-success fw-semibold shadow-sm border-2">Registrar Aprendiz <i class="bi bi-send-check-fill"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>