<div class="form-row">   
  <div class="form-group col-lg-6">
    {!! Form::label('tipo_documento', 'Tipo de documento') !!}
    {{-- {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Ingrese nombres completos']) !!} --}}
    {!! Form::select('tipo_documento', $tipos, null, ['class' => 'form-control', 'id' => 'tipo_documento', 'placeholder' => '---- SELECCIONE ----']) !!}
    @error('tipo_documento')
      <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>   
  <div class="form-group col-lg-6">
    {!! Form::label('numero_documento', 'Número de documento ') !!}
    {{-- {!! Form::text('numero_documento', null, ['class' => 'form-control', 'id' => 'numero_documento', 'placeholder' => 'Ingrese número de documento']) !!} --}}
    {!! Form::number('numero_documento', null, ['class' => 'form-control', 'id' => 'numero_documento', 'min' =>'0', 'max' => '99999999999', 'maxlength' => '11', 'oninput' => 'maxLengthCheck(this)', 'placeholder' => 'Ingrese número de documento']) !!}
    @error('numero_documento')
      <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group col-lg-6">
    {!! Form::label('razon_social', 'Razón social') !!}
    {!! Form::text('razon_social', null, ['class' => 'form-control', 'id' => 'razon_social', 'placeholder' => 'Ingrese razón social']) !!}
    @error('razon_social')
      <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group col-lg-6">
    {!! Form::label('direccion', 'Dirección') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control', 'id' => 'direccion', 'placeholder' => 'Ingrese dirección']) !!}
    @error('direccion')
      <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group col-lg-6">
    {!! Form::label('contacto', 'Contacto') !!}
    {!! Form::text('contacto', null, ['class' => 'form-control', 'id' => 'contacto', 'placeholder' => 'Ingrese nombre de la persona de contacto']) !!}
    @error('contacto')
      <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group col-lg-6">
    {!! Form::label('celular', 'Celular') !!}
    {!! Form::number('celular', null, ['class' => 'form-control', 'id' => 'celular', 'min' =>'0', 'max' => '999999999', 'maxlength' => '9', 'oninput' => 'maxLengthCheck(this)', 'placeholder' => 'Ingrese número celular']) !!}
    @error('celular')
      <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group col-lg-6">
    {!! Form::label('correo', 'Correo') !!}
    {!! Form::text('correo', null, ['class' => 'form-control', 'id' => 'correo', 'placeholder' => 'Ingrese el correo de contacto']) !!}
    @error('correo')
      <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
</div>
