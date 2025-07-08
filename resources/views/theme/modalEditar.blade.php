<div class="modal fade" id="editarModal{{$ficha->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edición de Ficha y Programa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="/fichas/{{$ficha->id}}" method="POST" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        <div class="modal-body">
        
            <div class="mb-3">
                <label for="ficha" class="form-label fw-semibold"><i class="bi bi-key"></i> Número de Ficha:</label>
                <input type="number" class="form-control shadow-sm" id="ficha" name="editarFicha" value="{{ $ficha->ficha }}"> 
                @error('editarFicha')
                    <p class="fw-semibold text-danger mt-2">
                        <i class="bi bi-exclamation-circle"></i>
                        {{'Ingrese el número de la ficha'}}
                    </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="programa" class="form-label fw-semibold"><i class="bi bi-book"></i> Programa de Formación:</label>
                <input type="text" class="form-control shadow-sm" id="programa" name="editarPrograma" value="{{ $ficha->nombre_programa }}">
                @error('editarPrograma')
                    <p class="fw-semibold text-danger mt-2">
                        <i class="bi bi-exclamation-circle"></i>
                        {{'Ingrese el nombre del programa'}}
                    </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nivelFormacion" class="form-label fw-semibold"><i class="bi bi-bar-chart"></i> Nivel de Formación:</label>
                <select class="form-select shadow-sm" id="nivelFormacion" name="editarNivelFormacion">
                    <option selected value="{{$ficha->nivel_formacion}}">{{$ficha->nivel_formacion}}</option>
                    @if($ficha->nivel_formacion == "TÉCNOLOGO")
                        <option value="TÉCNICO">TÉCNICO</option>
                    @else
                        <option value="TÉCNOLOGO">TÉCNOLOGO</option>
                    @endif
                </select>
                @error('editarNivelFormacion')
                    <p class="fw-semibold text-danger mt-2">
                        <i class="bi bi-exclamation-circle"></i>
                        {{'Seleccione el nivel de formación'}}
                    </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="fachaInicio" class="form-label fw-semibold"><i class="bi bi-calendar-date"></i> Fecha Inicio:</label>
                <input type="date" class="form-control shadow-sm" id="fachaInicio" name="editarFechaInicio" value="{{$ficha->fecha_inicio}}">
                @error('editarFechaInicio')
                    <p class="fw-semibold text-danger mt-2">
                        <i class="bi bi-exclamation-circle"></i>
                        {{'Ingrese la fecha de inicio de la ficha'}}
                    </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="fachaFin" class="form-label fw-semibold"><i class="bi bi-calendar-date"></i> Fecha Fin:</label>
                <input type="date" class="form-control shadow-sm" id="fachaFin" name="editarFechaFin" value="{{$ficha->fecha_fin}}">
                @error('editarFechaFin')
                    <p class="fw-semibold text-danger mt-2">
                        <i class="bi bi-exclamation-circle"></i>
                        {{'Ingrese la fecha de fin de la ficha'}}
                    </p>
                @enderror
            </div>
            
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary fw-semibold shadow-sm" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-warning fw-semibold shadow-sm border-2">Editar Ficha <i class="bi bi-pencil-square"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>