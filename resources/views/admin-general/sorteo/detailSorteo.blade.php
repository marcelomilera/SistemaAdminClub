<!DOCTYPE html>
<html>
<head>
	<title>DETALLE DE SORTEO</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('/css/jquery.bxslider.css')!!}
	{!!Html::style('/css/font-awesome.css')!!}
	{!!Html::style('/css/bootstrap.css')!!}
	{!!Html::style('/css/MisEstilos.css')!!}
	
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
					<strong>DETALLE DE SORTEO</strong>
			</div>		
		</div>

		<div class="container">
			<form class="form-horizontal form-border">
				<br/><br/>

				<div class="form-group">
		    		<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
		    		<div class="col-sm-5">
		      			<input type="text" class="form-control" id="nombreInput" name="nombre" value="{{$sorteo->nombre_sorteo}}" readonly>
		    		</div>
		  		</div>

			  	<div class="form-group">
			    	<label for="telefonoInput" class="col-sm-4 control-label">Descripcion</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="telefonoInput" name="telefono" value="{{$sorteo->descripcion}}" readonly>
			    	</div>
			  	</div>

			  	<div class="form-group">
			    	<label for="contactoInput" class="col-sm-4 control-label">Fecha Abierto Sorteo</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="contactoInput" name="nombre_contacto" value="{{$sorteo->fecha_abierto}}" readonly>
			    	</div>
			  	</div>	  	

			  	<div class="form-group">
			    	<label for="capacidadInput" class="col-sm-4 control-label">Fecha Cerrado Sorteo</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="capacidadInput" name="capacidad_maxima" value="{{$sorteo->fecha_cerrado}}" readonly>
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="capacidadInput" class="col-sm-4 control-label">Sede</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="capacidadInput" name="capacidad_maxima" value="{{$sede->nombre}}" readonly>
			    	</div>
			  	</div>
			  	


				<br/><br/>
				
				<div class="form-group">
					<div class="col-sm-8"> </div>
					<a href="/sorteo/index" class="btn btn-info">Regresar</a>				
				</div>

			</form>
		</div>
		<div class="table-responsive">
					<div class="container">
						<table class="table table-bordered table-hover text-center display" id="example">
							<thead class="active" data-sortable="true">								
								<th><div align=center>NOMBRE</div></th>	
								<th><div align=center>CAPACIDAD</div></th>	
								<th><div align=center>UBICACION</div></th>	

							</thead>	
							<tbody>													
								@foreach($ambientes as $ambientess)
									@foreach($ambientess as $ambiente)
										@if($ambiente)
										<tr>																			
											<td>{{$ambiente->nombre}}</td>
											<td>{{$ambiente->capacidad_actual}}</td>
											<td>{{$ambiente->ubicacion}}</td>
										</tr>
										@endif
									@endforeach
								@endforeach
								
							</tbody>			
						</table>						
					</div>	
				</div>
	</div>		
@stop
<!-- JQuery -->
	{!!Html::script('/js/jquery-1.11.3.min.js')!!}
	{!!Html::script('/js/bootstrap.js')!!}
	{!!Html::script('/js/jquery.bxslider.min.js')!!}
	{!!Html::script('/js/MisScripts.js')!!}


</body>
</html>