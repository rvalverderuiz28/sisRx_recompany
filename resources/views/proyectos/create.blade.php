@extends('adminlte::page')

@section('title', 'Registro de Estados')

@section('content_header')  
  <h1>Registrar Proyecto</h1>
@stop

@section('content')

  <div class="card">
    {!! Form::open(['route' => 'proyectos.store', 'autocomplete' => 'off','enctype'=>'multipart/form-data', 'id'=>'formulario','files'=>true]) !!}
    <div class="card-body">
      @include('proyectos.partials.form')
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
      <a href="{{ route('proyectos.index') }}" class="btn btn-danger"><i class="fas fa-times-circle"></i> Cancelar</a>
    </div>
    {!! Form::close() !!}
  </div>

@stop

@section('js')
  <script>
  //DESHABILITAR COMBO ESTADO AL CREAR LOS PROYECTOS    
    document.getElementById("estado_id").disabled=true;
  </script>

  <script>
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
