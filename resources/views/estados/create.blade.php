@extends('adminlte::page')

@section('title', 'Registro de Estados')

@section('content_header')  
  <h1>Registrar Estado</h1>
@stop

@section('content')

  <div class="card">
    {!! Form::open(['route' => 'users.store', 'autocomplete' => 'off','enctype'=>'multipart/form-data', 'id'=>'formulario','files'=>true]) !!}
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
          {!! Form::label('role_id', 'Rol') !!}
          {{-- {!! Form::select('role_id', $roles, null, ['class' => 'form-control']) !!} --}}
          <select name="prole_id" id="prole_id" class="form-control">
            <option value=" ">----SELECCIONE----</option>
            @foreach ($roles as $role)
              <option value="{{ $role->id }}_{{ $role->name }}">{{ $role->name }}</option>
            @endforeach
          </select>
          @error('prole_id')
            <small class="text-danger">{{ $message }}</small>
          @enderror
          {!! Form::hidden('role_id', null, ['id' => 'role_id']) !!}
          {!! Form::hidden('role_name', null, ['id' => 'role_name']) !!}
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
              {!! Form::text('dni', null, ['class' => 'form-control', 'id' => 'dni', 'placeholder' => 'Ingrese número de DNI']) !!}
              @error('dni')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group col-lg-12">
              {!! Form::label('sexo', 'Sexo') !!}
              {{-- {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Ingrese nombres completos']) !!} --}}
              {!! Form::select('sexo', ['MASCULINO', 'FEMENINO'], null, ['class' => 'form-control', 'id' => 'sexo', 'placeholder' => '---- SELECCIONE ----']) !!}
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
                <img id="picture" src="{{ asset('img/logo.jpeg') }}" alt="Imagen de perfil" height="200px" width="200px">{{--storage/users/logo_facturas.png--}}
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
    <div class="border rounded card-body border-secondary">
      <h4 style="text-align: center;" class="mb-3"><b>ACCESO AL SISTEMA</b></h4>
      <div class="form-row">
        <div class="form-group col-lg-4">
          {!! Form::label('email', 'Correo Electrónico') !!}
          {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Ingrese correo electrónico']) !!}
          @error('email')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group col-lg-4">
          {!! Form::label('password', 'Contraseña') !!}
          {!! Form::password('password', ['class' => 'form-control', 'id' =>'password', 'placeholder' => 'Ingrese contraseña']) !!}
          @error('password')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group col-lg-4">
          {!! Form::label('confirm_password', 'Confirme contraseña') !!}
          {!! Form::password('confirm_password', ['class' => 'form-control', 'id' =>'confirm_password', 'placeholder' => 'Ingrese nuevamente contraseña']) !!}
          @error('confirm_password')
            <small class="text-danger">{{ $message }}</small>
          @enderror
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
    $("#prole_id").change(mostrarValoresRol);

    function mostrarValoresRol() {
      datosRol = document.getElementById('prole_id').value.split('_');
      $("#role_id").val(datosRol[0]);
      $("#role_name").val(datosRol[1]);
    }

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
