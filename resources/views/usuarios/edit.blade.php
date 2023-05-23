@extends('adminlte::page')

@section('title', 'Actualizar Usuario')

@section('content_header')
  <h1>Actualización de Usuario</h1>
@stop

@section('content')

  <div class="card">
    {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'put', 'autocomplete' => 'off', 'enctype'=>'multipart/form-data', 'id'=>'formulario', 'files'=>true]) !!}
    <div class="card-body">
      <div class="form-row">
        <div class="form-group col-lg-4">
          {!! Form::label('nombre', 'Nombres') !!}
          {!! Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Ingrese nombres completos']) !!}
          @error('nombre')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group col-lg-3">
          {!! Form::label('apellido_paterno', 'Apellido paterno') !!}
          {!! Form::text('apellido_paterno', null, ['class' => 'form-control', 'id' => 'apellido_paterno', 'placeholder' => 'Ingrese apellido paterno']) !!}
          @error('apellido_paterno')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group col-lg-3">
          {!! Form::label('apellido_materno', 'Apellido materno') !!}
          {!! Form::text('apellido_materno', null, ['class' => 'form-control', 'id' => 'apellido_materno', 'placeholder' => 'Ingrese apellido materno']) !!}
          @error('apellido_materno')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group col-lg-2">
          {!! Form::label('role_id', 'Rol - cargo') !!}
          {!! Form::select('role_id', $roles, $user->rol_id, ['class' => 'border form-control border-secondary selectpicker', 'data-live-search' => 'true', 'id' => 'role_id', 'placeholder' => '---- SELECCIONE ----']) !!}
          @error('role_id')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group col-lg-6">
          <div class="form-row"> 
            <div class="form-group col-lg-12">
              {!! Form::label('direccion', 'Dirección') !!}
              {!! Form::text('direccion', null, ['class' => 'form-control', 'id' => 'direccion', 'placeholder' => 'Ingrese dirección']) !!}
              @error('direccion')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group col-lg-12">
              {!! Form::label('dni', 'DNI') !!}
              {!! Form::number('dni', null, ['class' => 'form-control', 'id' => 'dni', 'min' =>'0', 'max' => '99999999', 'maxlength' => '8', 'oninput' => 'maxLengthCheck(this)', 'placeholder' => 'Ingrese número de DNI']) !!}
              @error('dni')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group col-lg-12">
              {!! Form::label('sexo', 'Sexo') !!}
              {!! Form::select('sexo', $sexos, $user->sexo, ['class' => 'form-control', 'id' => 'sexo', 'placeholder' => '---- SELECCIONE ----']) !!}
              @error('sexo')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>            
            <div class="form-group col-lg-12">
              {!! Form::label('celular', 'Celular personal') !!}
              {!! Form::number('celular', null, ['class' => 'form-control', 'id' => 'celular', 'min' =>'0', 'max' => '999999999', 'maxlength' => '9', 'oninput' => 'maxLengthCheck(this)', 'placeholder' => 'Ingrese número celular']) !!}
              @error('celular')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group col-lg-12">
              {!! Form::label('fecha_contratacion', 'Fecha de contratación') !!}
              {!! Form::date('fecha_contratacion', null, ['class' => 'form-control', 'id' => 'fecha_contratacion', 'placeholder' => 'Ingrese fecha de contratación']) !!}
              @error('fecha_contratacion')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group col-lg-12">
              {!! Form::label('fecha_nacimiento', 'Fecha de nacimiento') !!}
              {!! Form::date('fecha_nacimiento', null, ['class' => 'form-control', 'id' => 'fecha_nacimiento', 'placeholder' => 'Ingrese fecha de nacimiento']) !!}
              @error('fecha_nacimiento')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
          </div>
        </div>

        <div class="form-group col-lg-6 border rounded card-body border-secondary" style="text-align: center">
          <h4 style="text-align: center;" class="mb-3"><b>FOTO DE PERFIL</b></h4><br>
          <div class="form-row">            
            <div class="form-group col-lg-12">
              <div class="image-wrapper">
                <img id="picture" src="{{ asset('storage/users/'. $user->profile_photo_path) }}" alt="Imagen de perfil" height="300px" width="300px">
              </div>
            </div>
            <div class="form-group col-lg-12" style="margin-top: 5%">
              {!! Form::label('imagen', 'Seleccione') !!}
              @csrf
              {!! Form::file('imagen', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
            </div><br>
          </div>
        </div>

      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
      <a href="{{ route('users.index') }}" class="btn btn-danger"><i class="fas fa-times-circle"></i> Cancelar</a>
    </div>
    {!! Form::close() !!}
  </div>

@stop

@section('js')

  <script>
    //VALIDAR LARGO DE CAMPO NUMERICO
    function maxLengthCheck(object)
    {
      if (object.value.length > object.maxLength)
        object.value = object.value.slice(0, object.maxLength)
    }

    //CAMBIAR IMAGEN
    document.getElementById("imagen").addEventListener('change', cambiarImagen);

    function cambiarImagen(event){
        var file = event.target.files[0];

        var reader = new FileReader();
        reader.onload = (event) => {
            document.getElementById("picture").setAttribute('src', event.target.result);
        };

        reader.readAsDataURL(file);
    }

    //VALIDAR CAMPOS ANTES DE ENVIAR
    document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formulario").addEventListener('submit', validarFormulario); 
    });

    function validarFormulario(evento) {
      evento.preventDefault();
      var nombre = document.getElementById('nombre').value;
      var apellido_paterno = document.getElementById('apellido_paterno').value;
      var apellido_materno = document.getElementById('apellido_materno').value;
      var role_id = document.getElementById('role_id').value;
      var direccion = document.getElementById('direccion').value;
      var dni = document.getElementById('dni').value;
      var celular = document.getElementById('celular').value;
      var sexo = document.getElementById('sexo').value;      
      var fecha_contratacion = document.getElementById('fecha_contratacion').value;
      var fecha_nacimiento = document.getElementById('fecha_nacimiento').value;
      if (nombre == '' || nombre == ' ') {
          Swal.fire(
            'Error',
            'Ingrese nombre del usuario a actualizar',
            'warning'
          )
        }
        else if (apellido_paterno == '' || apellido_paterno == ' ') {
          Swal.fire(
            'Error',
            'Ingrese el apellido paterno del usuario a actualizar',
            'warning'
          )
        }
        else if (apellido_materno == '' || apellido_materno == ' ') {
          Swal.fire(
            'Error',
            'Ingrese el apellido materno del usuario a actualizar',
            'warning'
          )
        }
        else if (role_id == '' || role_id == ' ') {
          Swal.fire(
            'Error',
            'Seleccione un rol-cargo para el usuario',
            'warning'
          )
        }
        else if (direccion == '' || direccion == ' ') {
          Swal.fire(
            'Error',
            'Ingrese la direccion del usuario a actualizar',
            'warning'
          )
        }        
        else if (dni.length != 8) {
          Swal.fire(
            'Error',
            'El número de DNI del usuario debe tener 8 dígitos',
            'warning'
          )
        }
        else if (sexo == ''){
          Swal.fire(
            'Error',
            'Seleccione el sexo del usuario a registrar',
            'warning'
          )
        }
        else if (celular.length != 9){
          Swal.fire(
            'Error',
            'Número celular del usuario debe tener 9 dígitos',
            'warning'
          )
        }        
        else if (fecha_contratacion == ''){
          Swal.fire(
            'Error',
            'Ingrese la fecha de contratación del usuario a registrar',
            'warning'
          )
        }
        else if (fecha_nacimiento == ''){
          Swal.fire(
            'Error',
            'Ingrese la fecha de nacimiento del usuario a registrar',
            'warning'
          )
        }
        else {
          this.submit();
        }    
    }
  </script>
@endsection
