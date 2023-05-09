  <!-- Modal -->
  <div class="modal fade" id="modal-activar-{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h5 class="modal-title" id="exampleModalLabel">Activar Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {{ Form::Open(['route' => ['users.destroy', $user], 'method' => 'delete']) }}
        <div class="modal-body">
          <p style="text-align: center; font-size:20px;">Confirme si desea <strong>ACTIVAR</strong> usuario: <br> <strong>USER00{{ $user->id }} - {{ $user->name }}</strong></p>
          {!! Form::hidden('estado', '1') !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-success">Confirmar</button>
        </div>
        {{ Form::Close() }}
      </div>
    </div>
  </div>
