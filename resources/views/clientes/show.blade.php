@extends('adminlte::page')

@section('title', 'Detalle de Cliente')

@section('content_header')
  <h1>Ver detalle del Cliente</h1>
@stop

@section('content')

  <div class="card">
    {!! Form::model($cliente, ['route' => ['clientes.update', $cliente], 'method' => 'put', 'autocomplete' => 'off', 'enctype'=>'multipart/form-data', 'id'=>'formulario', 'files'=>true]) !!}
    <div class="card-body">
      @include('clientes.partials.form')
    </div>
    <div class="card-footer">
      <a href="{{ route('clientes.index') }}" class="btn btn-danger"><i class="fas fa-times-circle"></i> Cancelar</a>
    </div>
    {!! Form::close() !!}
  </div>

@stop

@section('js')
  <script>
  //DESHABILITAR EDICION DE CAMPOS    
    document.getElementById("tipo_documento").disabled=true;
    document.getElementById("numero_documento").disabled=true;
    document.getElementById("razon_social").disabled=true;
    document.getElementById("direccion").disabled=true;
    document.getElementById("contacto").disabled=true;
    document.getElementById("celular").disabled=true;
    document.getElementById("correo").disabled=true;
  </script>
@endsection
