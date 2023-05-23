@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  {{-- <h1>BIENVENID@ <b>{{ strtoupper(auth()->user()->name) }}</b> AL SISTEMA DE GESTION DE PROYECTOS DE RX TECOMPANY</h1> --}}
  <p>BIENVENID@ <b>{{ strtoupper(auth()->user()->name) }}</b> AL SISTEMA DE GESTION DE PROYECTOS DE RX TECOMPANY</p>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>    

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawVisualization);
  
        function drawVisualization() {
          // Some raw data (not necessarily accurate)
          var data = google.visualization.arrayToDataTable([
            ['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
            ['2004/05',  165,      938,         522,             998,           450,      614.6],
            ['2005/06',  135,      1120,        599,             1268,          288,      682],
            ['2006/07',  157,      1167,        587,             807,           397,      623],
            ['2007/08',  139,      1110,        615,             968,           215,      609.4],
            ['2008/09',  136,      691,         629,             1026,          366,      569.6]
          ]);
  
          var options = {
            title : 'Monthly Coffee Production by Country',
            vAxis: {title: 'Cups'},
            hAxis: {title: 'Month'},
            seriesType: 'bars',
            series: {5: {type: 'line'}}
          };
  
          var chart = new google.visualization.ComboChart(document.getElementById('indicador1-PRE-TEST'));
          chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'Porcentajes'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
@stop

@section('content')

  <div class="form-row">
    <div class="col-lg-2">
    </div>
    <div class="col-lg-4">
      <div class="small-box bg-gradient-success">
        <div class="inner">
          <h3>
            S/. 10,0000
          </h3>
          <p>FONDOS</p>
        </div>
        <div class="icon">
          <i class="fas fa-hand-holding-usd"></i>
        </div>
        <a href="#" class="small-box-footer">
          Más info <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>0011</h3>
          <p>TOTAL DE PROYECTOS</p>
        </div>
        <div class="icon">
          <i class="fas fa-file-invoice-dollar"></i>
        </div>
        <a href="#" class="small-box-footer">
          Más info <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <div class="col-lg-2">
    </div>

    {{-- INDICADORES --}}
    <h3>PORCENTAJE INDICADOR 1</h3>
    <div id="indicador1-PRE-TEST" style="width: 100%; height: 500px;"></div>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
    {{-- <div id="indicador1-PRE-POST" style="width: 100%; height: 500px;"></div> --}}
    {{-- <div id="indicador1-resultado" style="width: 100%; height: 500px;"></div> --}}
    
    {{--<div id="indicador2-PRE-TEST" style="width: 100%; height: 500px;"></div>
    <div id="indicador2-POST-TEST" style="width: 100%; height: 500px;"></div>     --}}

    {{-- <div class="col-lg-12">
      <h3>LISTA</h3>
      <div class="card">
        <div class="card-body">
          <table id="tabla" class="table table-striped">
            <thead>
              <tr>
                <th scope="col">OS</th>
                <th scope="col">CLIENTE</th>
                <th scope="col">XXX</th>
                <th scope="col">YYY</th>
                <th scope="col">FECHA DE EMISION</th>
                <th scope="col">FECHA DE VENCIMIENTO</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div> --}}
  </div>
  {{-- @include('orden_servicio.modal.alerta') --}}
@stop

@section('css')
<link rel="stylesheet" media="only screen and (max-width: 768px)" href="../css/celulares.css">
  {{-- <style>  
    table, th, td {
      border: 0px solid black;
      border-collapse: collapse;
        
    }
    /* setting the text-align property to center*/
    th, td {
      padding: 5px;
      text-align:center;
            
    }
  </style> --}}

    
@stop

@section('js')
  {{-- <script src="{{ asset('js/datatables.js') }}"></script> --}}

  {{-- @if (!$datos == '')
    <script>
      $('#staticBackdrop').modal('show')
    </script>
  @endif --}}
@stop
