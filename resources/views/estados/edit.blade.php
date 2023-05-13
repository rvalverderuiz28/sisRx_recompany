@extends('adminlte::page')

@section('title', 'Editar Estado')

@section('content_header')
  <h1>Actualizar Estado</h1>
@stop

@section('content')

  <div class="card">
    {!! Form::model($estado, ['route' => ['estados.update', $estado], 'method' => 'put', 'autocomplete' => 'off', 'enctype'=>'multipart/form-data', 'id'=>'formulario', 'files'=>true]) !!}
    <div class="card-body">
      @include('estados.partials.form')
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
      <a href="{{ route('estados.index') }}" class="btn btn-danger"><i class="fas fa-times-circle"></i> Cancelar</a>
    </div>
    {!! Form::close() !!}
  </div>

@stop

@section('js')
  
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
  //VALIDAR CAMPOS ANTES DE ENVIAR
    document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formulario").addEventListener('submit', validarFormulario); 
    });

    function validarFormulario(evento) {
      evento.preventDefault();
      var nombre = document.getElementById('nombre').value;
      var descripcion = document.getElementById('descripcion').value;
      if (nombre == '' || nombre == ' ') {
          Swal.fire(
            'Error',
            'Ingrese nombre del estado',
            'warning'
          )
        }
        else if (descripcion == '' || descripcion == ' ') {
          Swal.fire({
                icon: 'warning',
                title: 'No estás registrando descripción ¿Estás seguro?',
                text: "Campo vacío",            
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, guardar!'
              }).then((result) => {
                if (result.isConfirmed) {
                  this.submit();
                }
              })
        }
        else {
          this.submit();
        }      
    }
  </script>
@endsection
