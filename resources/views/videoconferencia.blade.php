@extends('adminlte::page')

@section('title', 'Video Chat')

@section('content_header')
  <h1>VIDEOCONFERENCIA</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="form-row" style="height:480px">
                <div class="form-group col-lg-4 border rounded card-body border-secondary" style="text-align: center">
                    <div class="form-row">

                        <div class="card-header">
                            <div class="form-group col-lg-12 align-middle justify-center">    
                                <div class="form-row">
                                    <div class="form-group col-lg-2 flex-shrink-0 rounded-full overflow-hidden h-12">
                                        <img class="img-fluid rounded select-none" src="{{ asset('storage/users/'. Auth()->user()->profile_photo_path ) }}" alt="FOTO_PERFIL">
                                    </div>
                                    <div class="form-group col-lg-9">
                                        <span class="font-medium select-none">{{ Auth()->user()->nombre }}</span>
                                    </div>
                                    <div class="form-group col-lg-1">
                                        <span class="select-none"><i class="fas fa-circle text-success"></i></span>
                                    </div>
                                </div>
                            </div> 
                        </div>

                        <div class="card-body">
                            <div class="form-group col-lg-12 align-middle justify-center">
                                <div class="form-row">
                                    <table id="tablaPrincipal" class="table table-striped table-responsive">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Usuarios</th>
                                                <th scope="col"><i class="fa fa-phone" aria-hidden="true"></i></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="card-footer">
                            <div>FIN</div>
                        </div> -->
                    </div>
                </div>
                <div class="form-group col-lg-8 border rounded card-body border-secondary" style="text-align: center">
                    <div class="form-row">
                    </div>
                </div>
            </div>                         
        </div>

    </div>

@stop

@section('css')
  <link rel="stylesheet" media="only screen and (max-width: 768px)" href="../css/celulares.css">
@stop

@section('js')
  <script> 
    if (screen.width >768) 
    $("#tablaPrincipal").removeClass("table-responsive");
  </script>
@stop
