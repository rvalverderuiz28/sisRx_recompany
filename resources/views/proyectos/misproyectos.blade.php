@extends('adminlte::page')

@section('title', 'Lista de Mis Proyectos')

@section('content_header')
  <h1>Lista de MIS PROYECTOS
    @can('proyecto.create') @endcan
      <!-- <a href="" data-target="#modal-add" data-toggle="modal" class="btn btn-info"><i class="fas fa-plus-circle"></i> Agregar</a> -->
      <a href="{{ route('proyectos.create') }}" class="btn btn-info"><i class="fas fa-plus-circle"></i> Agregar</a>
  </h1>
@stop

@section('content')
  <div class="card">
    <div class="card-body">
      <table id="tablaPrincipal" class="table table-striped table-responsive">
        <thead>
          <tr>
            <th scope="col">CODIGO</th>
            <th scope="col">PROYECTO</th>
            <th scope="col">CLIENTE</th>
            <th scope="col">ENCARGADO</th>
            <th scope="col">PRESUPUESTO</th>
            <th scope="col">FECHA DE INICIO</th>
            <th scope="col">FECHA DE FIN</th>
            <!-- <th scope="col">CONDICION</th> -->
            <th scope="col">ESTADO</th>
            <th scope="col">ACCIONES</th>
          </tr>
        </thead>
      </table>
      @include('proyectos.modal.desactivar')
      @include('proyectos.modal.add')
      @include('proyectos.modal.show')
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
          idunico = 'PROY0000'+idunico;
        }else if(idunico<100){
          idunico = 'PROY000'+idunico;
        }else if(idunico<1000){
          idunico = 'PROY00'+idunico;
        }else if(idunico<10000){
          idunico = 'PROY0'+idunico;
        }else{
          idunico = 'PROY'+idunico;
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
        ajax: "{{ route('datatable.proyectos') }}",
        columns: [
            { data: 'id', name: 'id',//ID
                render: function ( data, type, row, meta ) {             
                  if(row.id<10){
                    return 'PROY0000'+row.id;
                  }else if(row.id<100){
                    return 'PROY000'+row.id;
                  }else if(row.id<1000){
                    return 'PROY00'+row.id;
                  }else if(row.id<10000){
                    return 'PROY0'+row.id;
                  }else{
                    return 'PROY'+row.id;
                  } 
                }
            },
            { data: 'nombre', name: 'nombre' },//NOMBRE DE PROYECTO
            { data: 'clientes', name: 'clientes' },//CLIENTES
            { data: 'users', name: 'users' },//USUARIO ASIGNADO
            { data: 'presupuesto', name: 'presupuesto' },//PRESUPUESTO 
            { data: 'fecha_inicio', name: 'fecha_inicio' },//FECHA DE INICIO 
            { data: 'fecha_fin', name: 'fecha_fin' },//FECHA DE FIN
            { data: 'condicion', name: 'condicion' },//CONDICION - IDENTIDAD ESTADO
            // { data: 'estado', name: 'estado',//ESTADO   
            //   render: function ( data, type, row, meta ) {
            //     if(row.estado==null){
            //       return '';
            //     }else{
            //       if(row.estado==1){
            //         return '<span class="badge badge-success">Activo</span>'
            //       }else{
            //         return '<span class="badge badge-danger">Anulado</span>';
            //       }
            //     }
            //   }
            // },
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

      $('#modal-show').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var idunico = button.data('opcion')//ID
      console.log(idunico);

        $.ajax({
          url: "{{ route('proyectos.showId') }}?proyecto_id=" + idunico,
          method: 'GET',
          dataType:'JSON',
          success: function(data) {
            let result=JSON.parse(JSON.stringify(data.html[0]));
            let codigo='';
            if(result['id']<10)
            {
              codigo='PROY000'+result['id'];
            }else if(result['id']<100)
            {
              codigo='PROY00'+result['id'];
            }else if(result['id']<1000)
            {
              codigo='PROY0'+result['id'];
            }else if(result['id']<10000)
            {
              codigo='PROY'+result['id'];
            }
            $(".textcode").html(codigo);
            $(".nombre").html(result['nombre']);
            $(".cliente").html(result['clientes']);
            $(".user").html(result['users']);
            $(".presupuesto").html("S/"+result['presupuesto']);
            $(".fecha_inicio").html(result['fecha_inicio']);
            $(".fecha_fin").html(result['fecha_fin']);
            $(".condicion").html(result['condicion']);
          }
        });
      });
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
      url:"{{ route('proyectoDeleteRequest.post') }}",
      data:formData,
    }).done(function (data) {
      $("#modal-delete").modal("hide");
      //resetearcamposdelete();
      alertaEstadoDelete();       
      $('#tablaPrincipal').DataTable().ajax.reload();      
    });
  }
</script>

<script>
  function alertaEstadoDelete(){
    Swal.fire(
        'Proyecto ELIMINADO correctamente',
        '',
        'success'
    )
  }
</script>
  
@stop
