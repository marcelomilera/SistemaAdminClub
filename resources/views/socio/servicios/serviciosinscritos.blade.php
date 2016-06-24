<!--p>
	@foreach($servicios as $serv)
		{{$serv->id}}
		<p>==============</p>
		{{$serv->nombre}}
		<p>==============</p>
		{{$serv->descripcion}}
		<br/>		
	@endforeach
</p-->
<!--?php 
$msj = "baia";
$arr = array(1,2,3,4,5,6,7,8,9); 
foreach($arr as $a) 
{ 
echo $msj;
} 
?-->

<!DOCTYPE html>
<html>
<head>
	<title>Servicios Papus Club Baia Baia</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	{!!Html::style('css/datepicker.css')!!}
	{!!Html::style('css/bootstrap-datepicker3.css')!!}
	{!!Html::style('css/jquery.dataTables.css')!!}
	<style>
		.table > caption + thead > tr:first-child > th, .table > colgroup + thead > tr:first-child > th, .table > thead:first-child > tr:first-child > th, .table > caption + thead > tr:first-child > td, .table > colgroup + thead > tr:first-child > td, .table > thead:first-child > tr:first-child> td{
			vertical-align: middle;
		}
	</style>
</head>

<body>
@extends('layouts.headerandfooter-al-socio')
@section('content')

	<div class="content" style="max-width: 100%;">
		<div class="container">
			<div class="row" style="max-width: 920px">
				<div class="col-sm-3">
					<ol class="breadcrumb" style="background:none;">
						<li><a href="/socio"><span class="glyphicon glyphicon-home"></span></a></li>
						<li class="active">Consultar Servicios</li>
					</ol>
				</div>				
			</div>
		</div>
		<div class="container">
			<div class="col-sm-12 text-left lead">
				<strong>MIS SERVICIOS INSCRITOS</strong>
			</div>		
		</div>
		<div class="container">
			@if ($mensaje)
				<script>$("#modalSuccess").modal("show");</script>
		
				<div class="alert alert-success fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>¡Éxito!</strong> {{$mensaje}}
				</div>
			@endif
			<form method="POST" action="/servicios/mis-inscripciones" class="form-horizontal form-border"> <!-- FALTA CAMBIAR LA ACTION =D -->
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<br/><br/>
				<div class="form-group ">
				   	<label for="sedeInput" class="col-sm-4 control-label">SEDE</label>	
					<div class="col-sm-5">
					  	<select class="form-control" name="sedeSelec" style="max-width: 170px">
					  		<option value="-1" default>Todas las sedes</option>
					        @foreach ($sedes as $sede)      
					      	<option value="{{$sede->id}}">{{$sede->nombre}}</option>
					        @endforeach
						</select>
					</div>
				</div>
				
				<!-- Boton Buscar INICIO -->
				<div class="btn-inline">
					<div class="btn-group col-sm-8"></div>
					<div class="btn-group ">
						<input class="btn btn-primary" type="submit" value="Filtrar">
					</div>
				</div>
				<!-- Boton Buscar FIN -->
				</br>
				</br>
			</form>
		</div>
		<br/><br/>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<p class="lead"><strong>M I S &nbsp;&nbsp; S E R V I C I O S &nbsp;&nbsp; I N S C R I T O S  &nbsp;&nbsp;  </strong></p>
				</div>
			</div>
		</div>
		<div class="container">
			@include('alerts.success')
		</div>
		<div class="table-responsive" >
			<div class="container">
				<table id="talleresTable" class="table text-center table-bordered table-hover  display">
					<thead class="active">
						<tr class="active">
							<th><div align=center>NOMBRE</div></th>	
							<th><div align=center>DESCRIPCIÓN</div></th>				
							<th style="max-width:100px;"><div align=center>TIPO DE SERVICIO</div></th>
							
							<th style="max-width:100px;"><div align=center>PRECIO SOCIO S/</div></th>
							
							
							
							<th><div align=center>SEDE</div></th>					
							
						</tr>
					</thead>
					<tbody>
				
					@foreach($sedexservicio as $sxs)	
									

						@foreach($servicios as $servicio)
							@if($sxs->idservicio == $servicio->id)
							<tr>
								<td>{{$servicio->nombre}}</td>
								<td>{{$servicio->descripcion}}</td>
								
								<td>
	 								@foreach($tiposServicio as $tserv)	
	 									@if ($tserv->id == $servicio->tipo_servicio)
	 										{{$tserv->valor	}}
	 									@endif
	 								@endforeach
	 							</td>					

							
								@foreach($tarifarioservicios as $tser)
								  @if( $tser->idservicio ==  $servicio->id)
								      <td>{{$tser->precio}}</td>
								  @endif
								@endforeach 		
								<!--p>{{url('/sedes/'.$sede->id.'/agregarservicios')}}</p-->
								<td>
									@foreach($sedes as $sede)	
										@if($sede->id == $sxs->idsede)
											{{$sede->nombre}}
										@endif
									@endforeach
								</td>
							@endif
						@endforeach 

							
						
		
						</tr>
					@endforeach 
				
					</tbody>
				</table>
			</div>	
		</div>
		<br/>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 text-right">					
						<a href="{!!URL::to('/servicios/mis-inscripciones')!!}" title="Ver mis inscripciones" class="btn btn-lg btn-primary">Mis Inscripciones</a>		
					</div>
				<div class="col-sm-6 text-left">
					
					<a href="{{url('/socio')}}" class="btn btn-lg btn-primary" title="Regresar a página de inicio">Regresar</a>			
				</div>
			</div>
		</div>	
	</div>
@stop
	<!-- JQuery -->
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	<!-- Bootstrap -->
	{!!Html::script('js/bootstrap.js')!!}

	{!!Html::script('js/bootstrap-datepicker.js')!!}
	 <!-- Languaje -->
    {!!Html::script('js/bootstrap-datepicker.es.min.js')!!}
	<!-- Data Table -->
    {!!Html::script('js/jquery.dataTables.js')!!}
	<script>
		$(document).ready(function() {
		   $('#talleresTable').DataTable( {
		       "language": {
		           "url": "{!!URL::to('/locales/Spanish.json')!!}"
		       }
		  	});
  		});
		
	</script>
	<script>
		var nowDate = new Date();
		var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
	</script>
	<script>
		$(function(){
			$('.datepicker').datepicker({
				format: "dd/mm/yyyy",
		        language: "es",
		        autoclose: true,
		        startDate: today,
			});
		});
	</script>

</body>
</html>