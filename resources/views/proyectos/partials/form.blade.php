<div class="row">                
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    {!! Form::label('nombre', 'Nombre del proyecto*') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Ingrese nombre del proyecto', 'required']) !!}                        
    @error('nombre')
      <small class="text-danger" style="font-size: 16px">{{ $message }}</small>
    @enderror
  </div>
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    {!! Form::label('cliente_id', 'Cliente*') !!}
    <select name="cliente_id" id="cliente_id" class="border form-control  border-secondary selectpicker" data-live-search="true">
            <option disabled selected>----SELECCIONE CLIENTE----</option>
            @foreach ($clientes as $cliente)
              <option value="{{ $cliente->id }}">{{ $cliente->tipo_documento }}: {{ $cliente->numero_documento }} - {{ $cliente->razon_social }}</option>
            @endforeach
          </select>
    @error('cliente_id')
      <small class="text-danger" style="font-size: 16px">{{ $message }}</small>
    @enderror
  </div>
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    {!! Form::label('user_id', 'Asignar responsable*') !!}
    {!! Form::select('user_id', $users, null, ['class' => 'border form-control border-secondary selectpicker', 'data-live-search' => 'true', 'placeholder' => '----SELECCIONE RESPONSABLE----']) !!}                        
    @error('user_id')
      <small class="text-danger" style="font-size: 16px">{{ $message }}</small>
    @enderror
  </div>
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    {!! Form::label('presupuesto', 'Presupuesto (S/)*') !!}
    {!! Form::number('presupuesto', null, ['class' => 'form-control', 'id' => 'presupuesto', 'min' => '0', 'step' => '0.1' , 'placeholder' => 'Ingrese monro de presupuesto']) !!}
    @error('descripcion')
      <small class="text-danger" style="font-size: 16px">{{ $message }}</small>
    @enderror
  </div>
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    {!! Form::label('fecha_inicio', 'Fecha de inicio de proyecto*') !!}                      
    {!! Form::date('fecha_inicio', null, ['class' => 'form-control', 'id' => 'fecha_inicio', 'placeholder' => 'Ingrese fecha de inicio de proyecto']) !!}
    @error('fecha_inicio')
      <small class="text-danger" style="font-size: 16px">{{ $message }}</small>
    @enderror
  </div>
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    {!! Form::label('fecha_fin', 'Fecha de fin de proyecto*') !!}
    {!! Form::date('fecha_fin', null, ['class' => 'form-control', 'id' => 'fecha_fin', 'placeholder' => 'Ingrese fecha de fin de proyecto']) !!}
    @error('fecha_fin')
      <small class="text-danger" style="font-size: 16px">{{ $message }}</small>
    @enderror
  </div>
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    {!! Form::label('estado_id', 'Estado*') !!}
    {!! Form::select('estado_id', $estados, 1, ['class' => 'border form-control border-secondary selectpicker', 'data-live-search' => 'true', 'placeholder' => '----SELECCIONE RESPONSABLE----']) !!}                        
    @error('estado_id')
      <small class="text-danger" style="font-size: 16px">{{ $message }}</small>
    @enderror
  </div>
</div>
