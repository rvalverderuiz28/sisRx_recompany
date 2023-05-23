@extends('adminlte::page')

@section('title', 'Registro de Cliente')

@section('content_header')
  <h1>Registrar nuevo cliente</h1>
@stop

@section('content')

  <div class="card">
    {!! Form::open(['route' => 'clientes.store', 'autocomplete' => 'off','enctype'=>'multipart/form-data', 'id'=>'formulario','files'=>true]) !!}
    <div class="card-body">
      @include('clientes.partials.form')
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
    function maxLengthCheck(object)
    {
      if (object.value.length > object.maxLength)
        object.value = object.value.slice(0, object.maxLength)
    }

  //VALIDAR CAMPOS ANTES DE ENVIAR
    document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formulario").addEventListener('submit', validarFormulario); 
    });

    function validarFormulario(evento) {
      evento.preventDefault();
      var tipo_documento = document.getElementById('tipo_documento').value;
      var numero_documento = document.getElementById('numero_documento').value;
      var razon_social = document.getElementById('razon_social').value;
      var direccion = document.getElementById('direccion').value;
      var contacto = document.getElementById('contacto').value;
      var celular = document.getElementById('celular').value;
      var correo = document.getElementById('correo').value;

      if (tipo_documento == '' || tipo_documento == ' ') {
          Swal.fire(
            'Error',
            'Seleccione un tipo de documento',
            'warning'
          )
        }
        else if (numero_documento == '' || numero_documento == ' ') {
          Swal.fire(
            'Error',
            'Ingrese número de documento del nuevo cliente',
            'warning'
          )
        }
        else if (tipo_documento == 'DNI' && numero_documento.length != 8 ) {
          Swal.fire(
            'Error',
            'Los DNI´s deben tener 8 dígitos',
            'warning'
          )
        }
        else if (tipo_documento == 'RUC' && numero_documento.length != 11 ) {
          Swal.fire(
            'Error',
            'Los RUC´s deben tener 11 dígitos',
            'warning'
          )
        }
        else if (razon_social == '' || razon_social == ' ') {
          Swal.fire(
            'Error',
            'Ingrese razón social del cliente a registrar',
            'warning'
          )
        }
        else if (direccion == '' || direccion == ' ') {
          Swal.fire(
            'Error',
            'Ingrese la dirección del cliente a registrar',
            'warning'
          )
        }
        else if (contacto == '' || contacto == ' ') {
          Swal.fire(
            'Error',
            'Ingrese el contacto del cliente a registrar',
            'warning'
          )
        }
        else if (celular.length != 9){
          Swal.fire(
            'Error',
            'Número celular del cliente debe tener 9 dígitos',
            'warning'
          )
        }
        
        else if (correo == '' || correo == ' '){
          Swal.fire(
            'Error',
            'Registre el email del cliente a registrar',
            'warning'
          )
        }
        else {
          this.submit();
        }      
    }
  </script>
@endsection
