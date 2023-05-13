@extends('adminlte::page')

@section('title', 'Lista de Usuarios')

@section('content_header')
  <h1>Lista de USUARIOS
    {{-- @can('users.create') --}}
      <a href="{{ route('users.create') }}" class="btn btn-info"><i class="fas fa-plus-circle"></i> Agregar</a>
    {{-- @endcan --}}
  </h1>
@stop

@section('content')

  <div class="card">
    <div class="card-body">
      <table id="tablaPrincipal" class="table table-striped table-responsive">
        <thead>
          <tr>
            <th scope="col">CODIGO</th>
            <th scope="col">NOMBRES Y APELLIDOS</th>
            <th scope="col">DIRECCION</th>
            <th scope="col">DNI</th>
            <th scope="col">SEXO</th>
            <th scope="col">ROL</th>
            <th scope="col">FECHA DE CONTRATACION</th>
            <th scope="col">FECHA DE NACIMIENTO</th>
            <th scope="col">CORREO</th>
            <th scope="col">ESTADO</th>
            <th scope="col">ACCIONES</th>
          </tr>
        </thead>
      </table>
      @include('usuarios.modal.desactivar')
      {{-- @include('usuarios.modal.activar')
      @include('usuarios.modal.reset') --}}
    </div>
  </div>
@stop

@section('css')
<link rel="stylesheet" media="only screen and (max-width: 768px)" href="../css/celulares.css">
@stop

@section('js')
  {{-- <script src="{{ asset('js/datatables.js') }}"></script> --}}
  <script> 
    if (screen.width >768) 
    $("#tablaPrincipal").removeClass("table-responsive");
  </script>  

  @if (session('info') == 'registrado' || session('info') == 'actualizado' || session('info') == 'eliminado')
    <script>
      Swal.fire(
        'Usuario {{ session('info') }} correctamente',
        '',
        'success'
      )
    </script>
  @endif

  <script>
    /* $.fn.dataTable.ext.errMode = 'throw'; */
    $(document).ready( function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $('#modal-delete').on('show.bs.modal', function (event) {
        //cuando abre el form de anular pedido
        var button = $(event.relatedTarget) 
        var idunico = button.data('delete')//id user
        //console.log(idunico);
        $("#hiddenIDdelete").val(idunico);
        if(idunico<10){
          idunico = 'USER0000'+idunico;
        }else if(idunico<100){
          idunico = 'USER000'+idunico;
        }else if(idunico<1000){
          idunico = 'USER00'+idunico;
        }else if(idunico<10000){
          idunico = 'USER0'+idunico;
        }else{
          idunico = 'USER'+idunico;
        }

        $(".textcode").html(idunico);
      });

      $('#tablaPrincipal').DataTable({
        responsive: true,//estilos responsive
        autoWidth: false,//ancho
        processing: true,//mensaje de cargando
        serverSide: true,
        searching: true,//buscar
        //bDestroy: true,//agregado para evitar adventencia de creacion          
        "order": [[ 0, "desc" ]],
        ajax: "{{ route('datatable.usuarios') }}",
        columns: [
            { data: 'id', name: 'id',//ID
                render: function ( data, type, row, meta ) {             
                  if(row.id<10){
                    return 'USER0000'+row.id;
                  }else if(row.id<100){
                    return 'USER000'+row.id;
                  }else if(row.id<1000){
                    return 'USER00'+row.id;
                  }else if(row.id<10000){
                    return 'USER0'+row.id;
                  }else{
                    return 'USER'+row.id;
                  } 
                }
            },
            { data: 'nombres', name: 'nombres' },//NOMBRE COMPLETO
            { data: 'direccion', name: 'direccion' },//DIRECCION         
            { data: 'dni', name: 'dni' },//DNI
            { data: 'sexo', name: 'sexo'},//SEXO
            { data: 'rol', name: 'rol' },//ROL   
            { data: 'fecha_contratacion', name: 'fecha_contratacion' },//FECHA DE CONTRATACION
            { data: 'fecha_nacimiento', name: 'fecha_nacimiento'},//FECHA DE NACIMIENTO
            { data: 'email', name: 'email'},//CORREO   
            { data: 'estado', name: 'estado',//ESTADO   
              render: function ( data, type, row, meta ) {
                if(row.estado==null){
                  return '';
                }else{
                  if(row.estado==1){
                    return '<span class="badge badge-success">Activo</span>'
                  }else{
                    return '<span class="badge badge-danger">Anulado</span>';
                  }
                }
              }
            },
            { data: 'action', name: 'action', orderable: false, searchable: false},//BOTONES
        ],
        language: {
          "decimal": "",
          "emptyTable": "No hay información",
          "info": "Mostrando del _START_ al _END_ de _TOTAL_ Registros",
          "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
          "infoFiltered": "(Filtrado de _MAX_ total entradas)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar " +
                        `<select class="custom-select custom-select-sm form-control form-control-sm">
                            <option value = '10'>10</option>
                            <option value = '25'>25</option>
                            <option value = '50'>50</option>
                            <option value = '100'>100</option>
                            <option value = '-1'>All</option>
                        </select>` +
                        " Registros",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar:",
          "zeroRecords": "Sin resultados encontrados",
          "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
          }
        }
      });

      $(document).on("submit", "#formdelete", function (evento) {
        evento.preventDefault();
        console.log("validar delete");
        clickformdelete();
      })

    });
  </script>

<script>
  function clickformdelete()
  {
    console.log("action delete action")
    var formData = $("#formdelete").serialize();
    console.log(formData);
    $.ajax({
      type:'POST',
      url:"{{ route('userdeleteRequest.post') }}",
      data:formData,
    }).done(function (data) {
      $("#modal-delete").modal("hide");
      //resetearcamposdelete();          
      $('#tablaPrincipal').DataTable().ajax.reload();      
    });
  }
</script>
  
@stop
