@extends('adminlte::page')

@section('title', 'Detalle de Usuario')

@section('content_header')
  <h1>Ver detalle del Usuario</h1>
@stop

@section('content')

  <div class="card">
    {!! Form::open(['route' => 'users.store', 'autocomplete' => 'off','enctype'=>'multipart/form-data', 'id'=>'formulario','files'=>true]) !!}
    <div class="card-body">
      <div class="form-row">   
        <div class="form-group col-lg-4">
          {!! Form::label('nombre', 'Nombres') !!}
          {!! Form::text('nombre', $user->nombre, ['class' => 'form-control', 'id' => 'nombre', 'disabled']) !!}
          @error('nombre')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group col-lg-3">
          {!! Form::label('apellido_paterno', 'Apellido paterno') !!}
          {!! Form::text('apellido_paterno', $user->apellido_paterno, ['class' => 'form-control', 'id' => 'apellido_paterno', 'disabled']) !!}
          @error('apellido_paterno')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group col-lg-3">
          {!! Form::label('apellido_materno', 'Apellido materno') !!}
          {!! Form::text('apellido_materno', $user->apellido_materno, ['class' => 'form-control', 'id' => 'apellido_materno', 'disabled']) !!}
          @error('apellido_materno')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group col-lg-2">
          {!! Form::label('role_id', 'Rol - Cargo') !!}
          {!! Form::text('role_name', $user->rol, ['class' => 'form-control', 'id' => 'role_name', 'disabled']) !!}
          @error('prole_id')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group col-lg-6">
          <div class="form-row">            
            <div class="form-group col-lg-12">
              {!! Form::label('direccion', 'Dirección') !!}
              {!! Form::text('direccion', $user->direccion, ['class' => 'form-control', 'id' => 'direccion', 'disabled']) !!}
              @error('direccion')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group col-lg-12">
              {!! Form::label('dni', 'DNI') !!}
              {!! Form::number('dni', $user->dni, ['class' => 'form-control', 'id' => 'dni', 'disabled']) !!}
              @error('dni')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group col-lg-12">
              {!! Form::label('sexo', 'Sexo') !!}
              {!! Form::text('sexo', $user->sexo, ['class' => 'form-control', 'id' => 'direccion', 'disabled']) !!}
              @error('sexo')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>            
            <div class="form-group col-lg-12">
              {!! Form::label('celular', 'Celular personal') !!}
              {!! Form::number('celular', $user->celular, ['class' => 'form-control', 'id' => 'celular', 'disabled']) !!}
              @error('celular')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group col-lg-12">
              {!! Form::label('fecha_contratacion', 'Fecha de contratación') !!}
              {!! Form::date('fecha_contratacion', $user->fecha_contratacion, ['class' => 'form-control', 'id' => 'fecha_contratacion', 'disabled']) !!}
              @error('fecha_contratacion')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group col-lg-12">
              {!! Form::label('fecha_nacimiento', 'Fecha de nacimiento') !!}
              {!! Form::date('fecha_nacimiento', $user->fecha_nacimiento, ['class' => 'form-control', 'id' => 'fecha_nacimiento', 'disabled']) !!}
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
                <img id="picture" src="{{ asset('storage/users/'.$user->profile_photo_path) }}" alt="Imagen de perfil" height="300px" width="300px">{{--storage/users/logo_facturas.png--}}
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="card-footer">
      <a href="{{ route('users.index') }}" class="btn btn-danger"><i class="fas fa-times-circle"></i> Cancelar</a>
    </div>
    {!! Form::close() !!}
  </div>

@stop

@section('js')
  <script>
    $("#prole_id").change(mostrarValoresRol);

  //MOSTRAR VALORES
    function mostrarValoresRol() {
      datosRol = document.getElementById('prole_id').value.split('_');
      $("#role_id").val(datosRol[0]);
      $("#role_name").val(datosRol[1]);
    }

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
      var direccion = document.getElementById('direccion').value;
      var dni = document.getElementById('dni').value;
      var celular = document.getElementById('celular').value;
      var sexo = document.getElementById('sexo').value;
      var prole_id = document.getElementById('prole_id').value;
      var role_id = document.getElementById('role_id').value;
      var role_name = document.getElementById('role_name').value;
      var fecha_contratacion = document.getElementById('fecha_contratacion').value;
      var fecha_nacimiento = document.getElementById('fecha_nacimiento').value;
      var email = document.getElementById('email').value;
      var password = document.getElementById('password').value;
      var confirm_password = document.getElementById('confirm_password').value;
      if (nombre == '' || nombre == ' ') {
          Swal.fire(
            'Error',
            'Ingrese nombre del usuario a registrar',
            'warning'
          )
        }
        else if (apellido_paterno == '' || apellido_paterno == ' ') {
          Swal.fire(
            'Error',
            'Ingrese el apellido paterno del usuario a registrar',
            'warning'
          )
        }
        else if (apellido_materno == '' || apellido_materno == ' ') {
          Swal.fire(
            'Error',
            'Ingrese el apellido materno del usuario a registrar',
            'warning'
          )
        }
        else if (prole_id == '' || role_id == '' || role_name == '') {
          Swal.fire(
            'Error',
            'Seleccione el cargo que se le asignará al usuario',
            'warning'
          )
        }
        else if (direccion == '' || direccion == ' ') {
          Swal.fire(
            'Error',
            'Ingrese la dirección del usuario a registrar',
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
        else if (celular.length != 9){
          Swal.fire(
            'Error',
            'Número celular del usuario debe tener 9 dígitos',
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
        else if (email == ''){
          Swal.fire(
            'Error',
            'Registre el email del usuario a registrar',
            'warning'
          )
        }
        else if (password == ''){
          Swal.fire(
            'Error',
            'Registre la contraseña del usuario a registrar',
            'warning'
          )
        }
        else if (confirm_password == ''){
          Swal.fire(
            'Error',
            'Confirme la contraseña del usuario a registrar',
            'warning'
          )
        }
        else {
          this.submit();
        }      
    }
  </script>
@endsection
