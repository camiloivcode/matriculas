<!-- Modal -->
<div class="modal fade" id="editarAprendiz{{$aprendiz->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Aprendiz en una Ficha</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="/aprendizEditar/{{$aprendiz->id}}" method="POST" class="needs-validation" novalidate>
        <div class="modal-body">
        @csrf
        @method('PUT')
            <div class="mb-3">
                <label for="editarTipo_documento" class="form-label fw-semibold"><i class="bi bi-key"></i> Tipo de Documento:</label>
                <select class="form-select border-3 select-documento" id="editarTipo_documento" name="editarTipo_documento" required>
                    <option selected value="{{$aprendiz->tipo_documento}}">{{$aprendiz->tipo_documento}}</option>
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

            <div class="mb-3">
                <label for="editarNumeroDocumento" class="form-label fw-semibold"><i class="bi bi-book"></i> Número de Documento:</label>
                <input type="number" class="form-control shadow-sm" id="editarNumeroDocumento" name="editarNumeroDocumento" value="{{$aprendiz->numero_documento}}" required>
                <div class="invalid-feedback">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    Requerido: Ingrese el número de documento!
                </div>
            </div>

            <div class="mb-3">
                <label for="editarNombre" class="form-label fw-semibold"><i class="bi bi-bar-chart"></i> Nombre del Aprendiz:</label>
                <input type="text" class="form-control shadow-sm" id="editarNombre" name="editarNombre" value="{{$aprendiz->nombre_completo}}" required>
                <div class="invalid-feedback">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    Requerido: Ingrese el nombre del aprendiz!
                </div>
            </div>

            <div class="mb-3">
                <label for="editarEstado" class="form-label fw-semibold"><i class="bi bi-bar-chart"></i> Estado:</label>
                <input type="text" class="form-control shadow-sm" id="editarEstado" name="editarEstado" value="{{$aprendiz->estado}}" required>
                <div class="invalid-feedback">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    Requerido: Ingrese el estado del aprendiz!
                </div>
            </div>

            <div class="mb-3">
                <label for="editarFicha" class="form-label fw-semibold"><i class="bi bi-book"></i>Número de Ficha:</label>
                <input type="number" class="form-control shadow-sm" id="editarFicha" name="editarFicha" value="{{$aprendiz->ficha->ficha}}" required>
                <div class="invalid-feedback">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    Requerido: Ingrese la ficha del programa!
                </div>
            </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary fw-semibold shadow-sm" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-warning fw-semibold shadow-sm border-2">Editar Aprendiz <i class="bi bi-pencil-square"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>