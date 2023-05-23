@extends('adminlte::page')

@section('title', 'Video Chat')

@section('content_header')
  <h1>VIDEOCONFERENCIA</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="form-row" style="min-height: 700px;">
                <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12 border rounded card-body border-secondary" style="text-align: center">

                    <div class="card-header">
                        <div class="form-row">                               
                            <div class="col-lg-2 col-xs-2 rounded-full" id="div-img">
                                <img id="foto_perfil" class="img-fluid rounded select-none" src="{{ asset('storage/users/'. Auth()->user()->profile_photo_path ) }}" alt="FOTO_PERFIL">
                            </div>
                            <div class="col-lg-9" id="div-user">
                                <span class="font-medium select-none">{{ Auth()->user()->nombre }}</span>
                            </div>
                            <div class="col-lg-1" id="div-status">
                                <span class="select-none"><i class="fas fa-circle text-success"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-row">
                            <table id="tablaPrincipal" class="table table-striped table-responsive">{{-- table-responsive --}}
                                <thead id="llamadas">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">FOTO</th>
                                        <th scope="col">USUARIOS</th>
                                        <th scope="col"><i class="fa fa-phone" aria-hidden="true"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $cont = 1;
                                    ?>
                                    @foreach ($users as $user)
                                        <tr>
                                        <td>{{ $cont }}</td>
                                        <td><img id="picture" class="img-circle" src="{{ asset('storage/users/'.$user->profile_photo_path) }}" alt="Imagen de perfil" height="30px" width="30px"></td>
                                        <td>{{ $user->nombre }}</td>
                                        <td>
                                            <a href="#" class="btn btn-warning btn-sm" id="btn-llamar"><i class="fas fa-edit"></i> Editar</a>                                            
                                        </td>
                                        </tr>
                                        {{-- @include('roles.modal.delete') --}}
                                        <?php
                                            $cont++;
                                        ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>                         
                    </div>
                    
                    <div class="card-footer">
                        <div>Sala de reuniones</div>
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

  <style>
    #llamadas{
        width: 100%;
        
    }
  </style>
@stop

@section('js')
  <script> 
    if (screen.width >768) 
    {
        $("#tablaPrincipal").removeClass("table-responsive");
    }

    if (screen.width <768) 
    {
        $("#btn-llamar").removeClass("btn-sm");
        $("#btn-llamar").addClass("btn-xs");
    }
  </script>
@stop
{{-- $("#foto_perfil").removeClass("img-fluid"); --}}