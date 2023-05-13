<!-- Modal -->
<div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">{{-- style="max-width: 600px!important;" --}}
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLabel">ELIMINAR CLIENTE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <form id="formdelete" name="formdelete">
        <input type="hidden" id="hiddenIDdelete" name="hiddenID" class="form-control"> 
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group col-lg-12">
            <p style="text-align: justify;">Confirme si desea <strong>ELIMINAR</strong> el cliente: <strong class="textcode"></strong></p>
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