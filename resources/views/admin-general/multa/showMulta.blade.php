<!DOCTYPE html>
<html>
<head>
	<title>DETALLE DE MULTA</title>
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
					<strong>DETALLE DE MULTA</strong>
			</div>		
		</div>

		<div class="container">
			<form class="form-horizontal form-border">
				<br/><br/>
							
	    		
			    <br>
				<div class="form-group">
			    	<label for="descripcionInput" class="col-sm-4 control-label">Descripción</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="descripcionInput" name="descripcion" placeholder="Descripción" value="{{$multa->descripcion}}" readonly>
			    	</div>
			  	</div>  	

			  	<div class="form-group required">
			    	<label for="montoPenalidadInput" class="col-sm-4 control-label">Monto de la Penalidad (S/.)</label>
			    	<div class="col-sm-5">
			      		<input type="number" min ="0" step = "any" class="form-control" id="montoPenalidadInput" name="montoPenalidad" placeholder="Monto de la Penalidad" value="{{$multa->montoPenalidad}}" readonly required>
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="estadoInput" class="col-sm-4 control-label">Estado</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="estadoInput" name="estado" placeholder="Estado" value="{{$multa->estado}}" readonly required>
			    	</div>
			  	</div> 

			  	<div class="form-group required">
			  		<label for="fechaRegistroInput" class="col-sm-4 control-label">Fecha de Registro</label>
			  		<div class="col-sm-5">
			  			<input type="text" class="form-control" id="fechaRegistroInput" name="fechaRegistro"  placeholder="Fecha de Registro" value = "{{ $multa->fecha_registro}}" readonly required>
			  		</div>
			  	</div> 	

			  	</br>
			  	</br>
				<div class="form-group">
					<div class="col-sm-6"> </div>
						<a class="btn btn-info" href="/multa/" title="Editar" >Regresar <i class="glyphicon glyphicon-arrow-left"></i></a>			
				</div>
				</br>
				</br>

			</form>
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