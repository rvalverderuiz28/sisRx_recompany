  <!-- Modal -->
  <div class="modal fade" id="modal-reset-{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h5 class="modal-title" id="exampleModalLabel">Resetear Contraseña</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {{ Form::Open(['route' => ['user.reset', $user]]) }}
        <div class="modal-body">
          <p>Confirme si desea <strong>REESTABLECER CONTRASEÑA</strong> del usuario: <br> <strong>USER00{{ $user->id }} - {{ $user->name }}</strong></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-info">Confirmar</button>
        </div>
        {{ Form::Close() }}
      </div>
    </div>
  </div>
