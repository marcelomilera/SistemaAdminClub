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
@extends('layouts.headerandfooter-al-socio')
@section('content')

<!---Cuerpo -->
<main class="main">
	<div class="content" style="max-width: 100%;">
		<!-- Utilizando Bootstrap -->
		<div class="container">
			@include('alerts.errors')
			@include('alerts.success')

		</div>
		<br/><br/>
		<div class="container">
			<div class="col-sm-12 text-left lead">
					<strong>CONFIRMACION DE INSCRIPCIÓN</strong>
			</div>		
		</div>
		<div class="container">
			<!--@include('errors.503')-->		
			<form method="POST" action="/inscripcion-actividad/{{ $actividad->id }}/confirmacion-inscripcion-actividades/confirm" class="form-horizontal form-border"><!-- accion que regresa a la incial de inscripciones -->
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<br/><br/>

		  	<div class="form-group">
		    	<label for="ambienteInput" class="col-sm-4 control-label">AMBIENTE:</label>
		    	<div class="col-sm-5">
		    		<input type="text" class="form-control" id="ambienteInput" name="ambiente" value="{{$actividad->ambiente->nombre}}"  required readonly>
		      	</div>		      	
		  	</div>

		  	<div class="form-group">
		    	<label for="tipoambienteInput" class="col-sm-4 control-label">TIPO DE AMBIENTE:</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="tipoambienteInput" name="tipoambiente" value="{{$actividad->ambiente->tipo_ambiente}}"  required readonly>
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="sedeInput" class="col-sm-4 control-label">SEDE:</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="sedeInput" name="sede" value="{{$actividad->ambiente->sede->nombre}}"  required readonly>
		    	</div>
		  	</div>
			<div class="form-group">
		    	<label for="nombreInput" class="col-sm-4 control-label">NOMBRE:</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="nombreInput" name="nombre" value="{{$actividad->nombre}}" readonly>
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="descripcionInput" class="col-sm-4 control-label">DESCRIPCIÓN:</label>
		    	<div class="col-sm-5">
		      		<textarea type="text" class="form-control" id="descripcionInput" name="descripcion" placeholder ="{{$actividad->descripcion}}" readonly></textarea>
		    	</div> 
		  	</div>
		  	<div class="form-group">
		    	<label for="tipoActividadInput" class="col-sm-4 control-label">TIPO DE ACTIVIDAD:</label>	
		    	<div class="col-sm-5">
			    	<input type="text" class="form-control" id="tipoActividadInput" name="tipo_actividad" value="{{$actividad->tipo_actividad}}" readonly >
				</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="capacidadInput" class="col-sm-4 control-label">CAPACIDAD MAXIMA:</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="capacidadInput" name="capacidad_maxima" value="{{$actividad->capacidad_maxima}}" readonly>
		    	</div>
		  	</div>	
		  	<div class="form-group">
		    	<label for="vacantesInput" class="col-sm-4 control-label">VACANTES DISPONIBLES:</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="vacantesInput" name="vacantes" value="{{$actividad->cupos_disponibles}}" readonly>
		      		<!-- <label for="vacantesInput" class=" control-label">{{$actividad->cupos_disponibles}}</label> -->
		    	</div>
		  	</div>
		  	<div class="form-group">
			 	<label for="fechaInput" class="col-sm-4 control-label">FECHA (dd/mm/aaaa): </label>
			    <div class="col-sm-5">
				  	<div class="input-group">
			   		<input type="text" class="form-control" id="dpd1" name="fecha_inicio" placeholder="Fecha Inicio" value="{{$actividad->a_realizarse_en}}" style="max-width: 180px" readonly>
			   	 	</div>
		    	</div>	
			</div> 
			<br/><br/>
			<div class="form-group">
	 			<div class="col-sm-12">
			    	<label for="password" class="col-sm-5 control-label">Ingrese su contraseña:</label>
		    		<div class="col-sm-7 text-center">
		    			<input type="password" name="password" class="form-control" id="contraseña" style="max-width: 220px">
		    			
		    		</div>	
		    		<div class="col-sm-offset-5 col-sm-7">
		    			<div class="text-danger">{!!$errors->first('password')!!}</div>
		    		</div>	  				
	 			</div>
			</div>
								
			<br/><br/>
			  <!-- Boton Buscar INICIO -->
			<div class="form-group">
				<div class="col-sm-12">
					<div class="col-sm-6 text-right">
						<button type="submit" class="btn btn-primary">Confirmar</button>
					</div>
					<div class="col-sm-6 text-left">
						<a href="/inscripcion-actividad/inscripcion-actividades" class="btn btn-info">Cancelar</a> <!-- Regresa a la pantalla inicial de la reserva -->
					</div>			
				</div>
			</div>
			<!-- Boton Buscar FIN -->
			<br><br>
			
			</form>
		</div>
	</div>		
@stop
	<!-- JQuery -->
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	<!-- Bootstrap -->
	{!!Html::script('js/bootstrap.js')!!}
	<!-- Mis Scripts -->
	{!!Html::script('js/MisScripts.js')!!}
	<!-- BXSlider -->
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	<!-- DataTable -->
	{!!Html::script('js/jquery.dataTables.js')!!}


</body>
</html>