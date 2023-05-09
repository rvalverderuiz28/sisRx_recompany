  <!-- Modal -->
  {{-- <div class="modal fade" id="modal-delete-{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {{ Form::Open(['route' => ['users.destroy', $user], 'method' => 'delete']) }}
        <div class="modal-body">
          <p style="text-align: center; font-size:20px;">Confirme si desea <strong>DESACTIVAR</strong> usuario: <br> <strong>USER00{{ $user->id }} - {{ $user->name }}</strong></p>
          {!! Form::hidden('estado', '0') !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-danger">Confirmar</button>
        </div>
        {{ Form::Close() }}
      </div>
    </div>
  </div> --}}
  <!-- Modal -->
<div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">{{-- style="max-width: 600px!important;" --}}
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLabel">DESACTIVAR USUARIO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <form id="formdelete" name="formdelete">
        <input type="hidden" id="hiddenIDdelete" name="hiddenID" class="form-control"> 
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group col-lg-12">
            <p style="text-align: justify;">Confirme si desea <strong>DESACTIVAR</strong> el usuario: <strong class="textcode"></strong></p>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cerrar</button>
        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Confirmar</button>
      </div>
      </form>
    </div>
  </div>
</div>