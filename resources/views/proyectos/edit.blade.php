@extends('adminlte::page')

@section('title', 'Editar Proyecto')

@section('content_header')
  <h1>Actualizar Proyecto</h1>
@stop

@section('content')

{!! Form::hidden('pcliente_id', $proyecto->cliente_id, ['class' => 'form-control', 'id' => 'pcliente_id']) !!}

  <div class="card">
    {!! Form::model($proyecto, ['route' => ['proyectos.update', $proyecto], 'method' => 'put', 'autocomplete' => 'off', 'enctype'=>'multipart/form-data', 'id'=>'formulario', 'files'=>true]) !!}
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
  
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
  //ASIGNAR A COMBO CLIENTE ELEGIDO
    var pcliente_id = document.getElementById('pcliente_id').value;
    document.getElementById("cliente_id").value = pcliente_id;    
  </script>

  <script>
  //VALIDAR CAMPOS ANTES DE ENVIAR
    document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formulario").addEventListener('submit', validarFormulario); 
    });

    function validarFormulario(evento) {
      evento.preventDefault();
      var nombre = document.getElementById('nombre').value;
      var cliente_id = document.getElementById('cliente_id').value;
      if (nombre == '' || nombre == ' ') {
          Swal.fire(
            'Error',
            'Ingrese nombre del estado',
            'warning'
          )
        }
        else if (cliente_id == '' || cliente_id == ' ') {
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
