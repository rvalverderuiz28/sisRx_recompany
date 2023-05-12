@extends('adminlte::page')

@section('title', 'Lista de Estados')

@section('content_header')
  <h1>Lista de CLIENTES
    {{-- @can('users.create') --}}
      <a href="" data-target="#modal-add" data-toggle="modal" class="btn btn-info"><i class="fas fa-plus-circle"></i> Agregar</a>
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
            <th scope="col">DOCUMENTO</th>
            <th scope="col">RAZON SOCIAL</th>
            <th scope="col">DIRECCION</th>
            <th scope="col">CONTACTO</th>
            <th scope="col">CELULAR</th>
            <th scope="col">CORREO</th>
            <th scope="col">ESTADO</th>
            <th scope="col">ACCIONES</th>
          </tr>
        </thead>
      </table>
      @include('estados.modal.desactivar')
      @include('estados.modal.add')
    </div>
  </div>
@stop

@section('css')
  <link rel="stylesheet" media="only screen and (max-width: 768px)" href="../css/celulares.css">
  {{-- <link rel="stylesheet" media="only screen and (min-width: 768px)" href="../css/computadoras.css"> --}}
@stop

@section('js')
  <script> 
    if (screen.width >768) 
    $("#tablaPrincipal").removeClass("table-responsive");
  </script>  

  @if (session('info') == 'registrado' || session('info') == 'actualizado' || session('info') == 'eliminado')
    <script>
      Swal.fire(
        'Estado {{ session('info') }} correctamente',
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
          idunico = 'CLI0000'+idunico;
        }else if(idunico<100){
          idunico = 'CLI000'+idunico;
        }else if(idunico<1000){
          idunico = 'CLI00'+idunico;
        }else if(idunico<10000){
          idunico = 'CLI0'+idunico;
        }else{
          idunico = 'CLI'+idunico;
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
        ajax: "{{ route('datatable.clientes') }}",
        columns: [
            { data: 'id', name: 'id',//ID
                render: function ( data, type, row, meta ) {             
                  if(row.id<10){
                    return 'CLI0000'+row.id;
                  }else if(row.id<100){
                    return 'CLI000'+row.id;
                  }else if(row.id<1000){
                    return 'CLI00'+row.id;
                  }else if(row.id<10000){
                    return 'CLI0'+row.id;
                  }else{
                    return 'CLI'+row.id;
                  } 
                }
            },
            { data: 'documento', name: 'documento' },//TIPO Y NUMERO DE DOCUMENTO
            { data: 'razon_social', name: 'razon_social' },//RAZON SOCIAL         
            { data: 'direccion', name: 'direccion' },//TIPO Y NUMERO DE DOCUMENTO
            { data: 'contacto', name: 'contacto' },//RAZON SOCIAL  
            { data: 'celular', name: 'celular' },//TIPO Y NUMERO DE DOCUMENTO
            { data: 'correo', name: 'correo' },//RAZON SOCIAL  
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
      url:"{{ route('clienteDeleteRequest.post') }}",
      data:formData,
    }).done(function (data) {
      $("#modal-delete").modal("hide");
      //resetearcamposdelete();          
      $('#tablaPrincipal').DataTable().ajax.reload();      
    });
  }
</script>
  
@stop
