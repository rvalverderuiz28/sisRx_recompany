  <!-- Modal -->
  <div class="modal fade" id="modal-add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 800px!important;">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h5 class="modal-title" id="exampleModalLabel">Agregar estado</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {{ Form::Open(['route' => ['estados.store'], 'id'=>'formulario2']) }}
        <div class="modal-body">
          <p style="text-align: center">Ingrese el <strong>ESTADO</strong> a agregar</p>
        </div>
        <div style="margin: 10px">
          <div class="card">
            <div class="border rounded card-body border-secondary">
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-lg-12">
                    <div class="row">                
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::label('nombre', 'Nombre de estado') !!}
                        {!! Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Ingrese nombre de estado']) !!}                        
                        @error('nombre')
                          <small class="text-danger" style="font-size: 16px">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::label('descripcion', 'Descripción de estado') !!}
                        {!! Form::text('descripcion', null, ['class' => 'form-control', 'id' => 'descripcion', 'placeholder' => 'Ingrese descripcion de estado']) !!}    
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
          <button type="submit" class="btn btn-info" id="atender">Confirmar</button>
        </div>
        {{ Form::Close() }}
      </div>
    </div>
  </div>
