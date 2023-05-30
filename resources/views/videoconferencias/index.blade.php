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
                                <input type="hidden" value="{{ Auth()->user()->id }}" id="hiddenID" name="hiddenID" class="form-control">
                                <input type="hidden" value="{{ session()->getId() }}" id="sessionID" name="sessionID" class="form-control">
                                <span class="font-medium select-none">{{ Auth()->user()->nombre }}</span>
                            </div>
                            <div class="col-lg-1" id="div-status">
                                <span class="select-none"><i class="fas fa-circle text-success"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-row">
                            <table id="tablaPrincipal" class="table table-striped">{{-- table-responsive --}}
                                <thead id="llamadas">
                                    <tr>
                                        <th scope="col">ITEM</th>
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
                                                <button id="btn-show" class="btn btn-info btn-sm" onclick="showUser('{{$user->id}}')"><i class="fas fa-eye"></i></button>
                                            </td>
                                        </tr>
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
                <!-- SHOW USER -->
                <div class="form-group col-lg-8 col-md-8 col-sm-12 col-xs-12 border rounded card-body border-secondary" style="text-align: center">
                        <div class="card-header">
                            <div class="form-row">
                                <div class="col-lg-12">
                                    <span class="nombre">¿A quién deseas llamar?</span>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-lg-12 rounded-full" id="div-img">
                                    <!-- <span class="profile_photo_path"></span> -->
                                    <img id="foto_user" class="img-fluid img-circle select-none" src="{{ asset('storage/users/'. Auth()->user()->profile_photo_path ) }}" alt="FOTO_USER">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button id="btn-call" data-user="" class="d-none btn btn-info btn-lm rounded-circle" onclick="callUser()"><i class="fa fa-video"></i></button>
                            <div>Sala de reuniones</div>
                        </div>
                </div>
                <!-- SECCION VIDEO - INICIALMENTE OCULTA -->
                <div class="d-none form-group col-lg-8 border rounded card-body border-secondary" style="text-align: center">
                        <div class="card-header">
                            <div class="form-row">
                                <div class="col-lg-12">
                                    <span class="sendTo"></span>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-lg-12 rounded-full" id="div-img">
                                    <video id="remoteVideo" class="h-full object-cover" style="" src="">
                                    </video>
                                    <video id="localVideo" class="vid-2 z-1 right-0" style="" src="">                                        
                                    </video>
                                </div>
                                <div class="order-1 mt-4 absolute self-center">
                                    <div class="time rounded-xl text-white font-bold"></div>
                                </div>                                    
                                <div class="order-3 shadow-md flex justify-center btn-call">
                                    <button id="hangupBtn" class="relative -top-8 shadow-lg"></button>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button id="btn-call" data-user="0" class="btn btn-info btn-lm rounded-circle"><i class="fa fa-video"></i></button>
                            <div>Sala de reuniones</div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- <script src="https://webrtc.github.io/adapter/adapter-latest.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/6.1.4/adapter.js" integrity="sha512-r8cn1OoZ21KHc0zmav3+MtQS24AJLAaDdNNWYkOborAznLETtfBKMb6xkpqXnjcH1GmKG9BqPOW9tU/Jzy98kQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script> 
        if (screen.width >768) 
        $("#tablaPrincipal").removeClass("table-responsive");
    
        if (screen.width <768) 
        {
            $("#btn-llamar").removeClass("btn-sm");
            $("#btn-llamar").addClass("btn-xs");
        }
    </script>
    <script>
    //let conn; // Declarar la variable conn fuera del alcance del evento $(document).ready

    $(document).ready( function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });      
    })
    </script>  
    <script>
    function showUser(id){
        var idunico = id//button.data('opcion')//ID
        console.log(idunico);
        var hiddenID = document.getElementById('hiddenID').value;
        var sessionID = document.getElementById('sessionID').value;

        $.ajax({
            url: "{{ route('videoconferencias.showId') }}?user_id=" + idunico,
            method: 'GET',
            dataType:'JSON',
            success: function(data) {
                let result=JSON.parse(JSON.stringify(data.html[0]));
                let codigo='';
                let foto='';
                if(result['id']<10)
                {
                    codigo='USER000'+result['id'];
                }else if(result['id']<100)
                {
                    codigo='USER00'+result['id'];
                }else if(result['id']<1000)
                {
                    codigo='USER0'+result['id'];
                }else if(result['id']<10000)
                {
                    codigo='USER'+result['id'];
                }
                $(".textcode").html(codigo);
                $(".nombre").html("Llamar a: <b>"+result['nombre']+"</b>");
                $(".profile_photo_path").html(result['profile_photo_path']);
                foto=result['profile_photo_path'];
                changeImage(foto);

                var boton = $('#btn-call');
                boton.attr('data-user', idunico);//LO SOBRE-ESCRIBE
                console.log(boton.data('user')); 
            }
        });

        $("#btn-call").removeClass("d-none");
        let conn;
        conn = new WebSocket('ws://rxtecompany.test:8001/laravel-websockets/?token='+sessionID);//wss://sisrxtecompany.ojoverdeperu.com/laravel-websockets
        
        conn.onopen = function (e) {
            console.log('Conexión WebSocket establecida.');
            customSend('is-client-is-ready', null, sendTo);
        };
        
        //Buttons
        let callBtn = $('#btn-call');
    
        let pc;
        let sendTo = callBtn.data('user');
        let localStream;
    
        //Video elements
        const localVideo  = document.querySelector("#localVideo");
        const remoteVideo = document.querySelector("#remoteVideo");
        
        //MediaInfo
        const mediaConst = {
            video:true
        }
    
        function getConn(){
            if(!pc){
                pc = new RTCPeerConnection();
            }
        }
    
        //ASK FOR MEDIA INPUT
        async function getCam(){
            let mediaStream;
            try {
                if(!pc){
                    await getConn();
                }
    
                mediaStream = await navigator.mediaDevices.getUserMedia(mediaConst);
                localVideo.srcObject = mediaStream;
                localStream = mediaStream;
                localStream.getTracks().forEach( track => pc.addTrack(track, localStream) );
    
            } catch (error) {
                console.log(error);
            }
        }
        
        function callUser(){
            getCam();
            console.log("boton cam");
            // Envía el mensaje de llamada al usuario seleccionado
            conn.send('call', null, sendTo.toString());
        }
    
        conn.onmessage = e =>{

        }
    
        function customSend(type, data, sendTo) {
            if(conn.readyState === WebSocket.OPEN) { 
                conn.send(JSON.stringify({
                    sendTo: sendTo,
                    type: type,
                    data: data
                }));
            } else {
              console.log('La conexión WebSocket no está abierta todavía.');
            }
        }

        customSend('is-client-is-ready', null, sendTo);
        
        // Asignar el evento click al botón 'btn-call'
        callBtn.on('click', callUser);
    };
    </script>
   
    <script>
    function changeImage(foto) {
        var image = document.getElementById('foto_user');
        image.src = "storage/users/"+foto; 
        console.log("storage/users/"+foto);       
    }
    </script>