@extends('adminlte::page')

@section('title', 'Lista de Roles')

@section('content_header')
  <h1>Lista de CARGOS y PERMISOS
    {{-- @can('roles.create') --}}
      <a href="{{ route('roles.create') }}" class="btn btn-info"><i class="fas fa-plus-circle"></i> Agregar</a>
    {{-- @endcan --}}
  </h1>
@stop

@section('content')

  <div class="card">
    <div class="card-body">
      <table id="tabla" class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">CARGO</th>
            <th scope="col">ACCIONES</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($roles as $role)
            <tr>
              <td>ROL00{{ $role->id }}</td>
              <td>{{ $role->name }}</td>
              <td>
                {{-- @can('roles.edit') --}}
                  <a href="{{ route('roles.edit', $role) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a>
                {{-- @endcan
                @can('roles.destroy') --}}
                  <a href="" data-target="#modal-delete-{{ $role->id }}" data-toggle="modal"><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Eliminar</button></a>
                {{-- @endcan --}}
              </td>
            </tr>
            @include('roles.modal.delete')
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@stop

@section('js')

  {{-- <script src="{{ asset('js/datatables.js') }}"></script> --}}

  @if (session('info') == 'registrado' || session('info') == 'actualizado' || session('info') == 'eliminado')
    <script>
      Swal.fire(
        'Cargo {{ session('info') }} correctamente',
        '',
        'success'
      )
    </script>
  @endif

@stop
