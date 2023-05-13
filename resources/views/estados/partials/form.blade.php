<div class="row">                
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    {!! Form::label('nombre', 'Nombre de estado*') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Ingrese nombre de estado', 'required']) !!}                        
    @error('nombre')
      <small class="text-danger" style="font-size: 16px">{{ $message }}</small>
    @enderror
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    {!! Form::label('descripcion', 'Descripción de estado') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control', 'id' => 'descripcion', 'placeholder' => 'Ingrese descripcion de estado']) !!}    
    @error('descripcion')
      <small class="text-danger" style="font-size: 16px">{{ $message }}</small>
    @enderror
  </div>
</div>
