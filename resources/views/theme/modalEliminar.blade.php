<div class="modal fade" id="eliminar{{$aprendiz->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmar la Eliminación del Aprendiz</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="/aprendiz/{{$aprendiz->id}}" method="POST" class="needs-validation" novalidate>
        @csrf
        @method('DELETE')

        <div class="modal-body">
            <p class="fw-semibold fs-5">Querido administrador estás seguro de querer eliminar a esté aprendiz de la ficha?</p>
            <h5 class="text-danger">{{$aprendiz->nombre_completo}} - {{$aprendiz->numero_documento}}</h5>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary fw-semibold shadow-sm" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-danger fw-semibold shadow-sm border-2">Eliminar Aprendiz <i class="bi bi-trash3-fill"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>