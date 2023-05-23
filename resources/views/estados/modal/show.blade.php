  <!-- Modal -->
  <div class="modal fade" id="modal-show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">{{--  style="max-width: 1000px!important;" --}}
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h5 class="modal-title" id="exampleModalLabel">Detalle de estado</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
                
        <form id="formconvertir" name="formconvertir">
        <input type="hidden" id="hiddenId" name="hiddenID" class="form-control"> {{-- ID OCULTO--}}
        <div class="modal-body">
          <p>Está viendo el detalle del <strong>ESTADO</strong>: <strong class="textcode"></strong></p>          
        </div>
        <div style="margin: 10px">
          <div class="card">
            <div class="border rounded card-body border-secondary">
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-lg-12">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h5 style="text-align: center"><b>Datos del ESTADO</b></h5>
                      </div>
                      <div class="form-group col-lg-12">
                        {!! Form::label('nombre', 'Nombre:') !!}
                        {{-- {!! Form::text('hiddenId', null, ['class' => 'form-control', 'id' => 'hiddenId', 'required']) !!} --}}
                        <p class="nombre"></p>
                      </div>               
                      <div class="form-group col-lg-12">
                        {!! Form::label('descripcion', 'Descripción:') !!}
                        {{-- {!! Form::text('descripcion', null, ['class' => 'form-control', 'id' => 'descripcion', 'required']) !!} --}}
                        <p class="descripcion"></p>
                      </div>          
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>

        </form>
        
      </div>
    </div>
  </div>
