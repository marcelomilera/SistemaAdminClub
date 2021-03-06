<!DOCTYPE html>
<html>
<head>
	<title>ACTIVIDAD</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('../css/jquery.bxslider.css')!!}
	{!!Html::style('../css/font-awesome.css')!!}
	{!!Html::style('../css/bootstrap.css')!!}
	{!!Html::style('../css/MisEstilos.css')!!}
	
	
</head>
<body>
@extends('layouts.headerandfooter-al-admin')
@section('content')

<!---Cuerpo -->
<main class="main">
	<div class="content" style="max-width: 100%;">
		<!-- Utilizando Bootstrap -->
		<br/><br/>
		<div class="container">
			<div class="col-sm-12 text-left lead">
					<strong>ACTIVIDAD</strong>
			</div>		
		</div>
		<div class="container">
			<!--@include('errors.503')-->		
			<form method="POST" action="/sedes/new/sede" class="form-horizontal form-border">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<br/><br/>

			<!-- INICIO INICIO INICIO INICIO -->

			<!-- <div class="form-group required">
		    	<label for="buscarInput" class="col-sm-4 control-label">BUSCAR AMBIENTE</label>
		    	<div class="col-sm-5">
		      		<a class="btn btn-info" name="buscarAmbiente" href="{!!URL::to('/ambiente/search')!!}"  title="Buscar" ><i name="buscarAmbiente" class="glyphicon glyphicon-search"></i></a>
		    	</div>
		  	</div> -->
		  	<div class="form-group required">
		    	<label for="ambienteInput" class="col-sm-4 control-label">Ambiente</label>
		    	<div class="col-sm-5">
		    		<input type="text" class="form-control" id="ambienteInput" name="ambiente" value="{{$actividad->ambiente->nombre}}"   readonly>
		      	</div>
		      	
		  	</div>
		  	<div class="form-group required">
		    	<label for="tipoambienteInput" class="col-sm-4 control-label">Tipo de Ambiente</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="tipoambienteInput" name="tipoambiente" value="{{$actividad->ambiente->tipo_ambiente}}"   readonly>
		    	</div>
		  	</div>
		  	<div class="form-group required">
		    	<label for="sedeInput" class="col-sm-4 control-label">Sede</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="sedeInput" name="sede" value="{{$actividad->ambiente->sede->nombre}}"   readonly>
		    	</div>
		  	</div>

			<div class="form-group required">
		    	<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="nombreInput" name="nombre" value="{{$actividad->nombre}}" readonly>
		    	</div>
		  	</div>
		  	<div class="form-group required">
		    	<label for="descripcionInput" class="col-sm-4 control-label">Descripción</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="descripcionInput" name="descripcion" value ="{{$actividad->descripcion}}" readonly>
		    	</div> 
		  	</div>
		  	<div class="form-group required">

			    	<label for="fechaInicioInput" class="col-sm-4 control-label">Fecha Inicio</label>
			    	<div class="col-sm-5">
			      		<input type="date" id="fechaInicioInput" value="{{$actividad->a_realizarse_en}}" readonly>
			    	</div>
			  	
			 </div>

			<div class="form-group required">
			    	<label for="horaInicioInput" class="col-sm-4 control-label">Hora Inicio</label>
			    	<div class="col-sm-5">
			      		<input type="time" id="horaInicioInput" value="{{$actividad->a_realizarse_en}}" readonly>
			    	</div>
			  	
			 </div>

		  	<div class="form-group required">
		    	<label for="tipoActividadInput" class="col-sm-4 control-label">Tipo de Actividad</label>	
		    	<div class="col-sm-5">
			    	<input type="text" class="form-control" id="tipoActividadInput" name="tipo_actividad" value="{{$actividad->tipo_actividad}}" readonly >
				</div>
		  	</div>

		  	<div class="form-group required">
		    	<label for="capacidadInput" class="col-sm-4 control-label">Capacidad Maxima</label>
		    	<div class="col-sm-5">
		      		<input type="number" class="form-control" id="capacidadInput" name="capacidad_maxima" value="{{$actividad->capacidad_maxima}}" readonly>
		    	</div>
		  	</div>	  	
		  	
				<!-- INICIO  PRECIO POR TIPO DE PERSONA -->
			<br/>
			<div class="form-group "> 
				<label for="precioTipo1" class="col-sm-4 control-label" width: 100px >Precios </label>
			</div>
			<div class="form-group required">
			   	<label for="precioTipo1" class="col-sm-4 control-label">Trabajador</label>
			   	<div class="col-sm-5">
			   		<input type="text" onkeypress="return inputLimiter(event,'Numbers')"   class="form-control" id="precioTipo1" name="precioTipo1" placeholder="Precio (S/.)" value="{{old('capacidad_actual')}}" readonly="" >
			   	</div>
			</div>	
			<div class="form-group required">
			   	<label for="precioTipo2" class="col-sm-4 control-label">Postulante</label>
			   	<div class="col-sm-5">
					<input type="text" onkeypress="return inputLimiter(event,'Numbers')"   class="form-control" id="precioTipo2" name="precioTipo2" placeholder="Precio (S/.)" value="{{old('capacidad_actual')}}" readonly="">
			   	</div>
			</div>	
			<div class="form-group required">
			   	<label for="precioTipo3" class="col-sm-4 control-label">Socio</label>
			   	<div class="col-sm-5">
			   		<input type="text" onkeypress="return inputLimiter(event,'Numbers')"   class="form-control" id="precioTipo3" name="precioTipo3" placeholder="Precio (S/.)" value="{{old('capacidad_actual')}}" readonly="">
			   	</div>
			</div>	
			  	
			  	<!-- FIN     PRECIO POR TIPO DE PERSONA -->

			</br></br>
			  	<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					<div class="btn-group">
						<a href="/actividad/index" class="btn btn-info">Regresar</a>
					</div>
				</div>
			
			</form>
		</div>
	</div>		
@stop
<!-- JQuery -->
	<script src="../js/jquery-1.11.3.min.js"></script>
	<!-- Bootstrap -->
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<!-- BXSlider -->
	<script src="../js/jquery.bxslider.min.js"></script>
	<!-- Mis Scripts -->
	<script src="../js/MisScripts.js"></script>


</body>
</html>