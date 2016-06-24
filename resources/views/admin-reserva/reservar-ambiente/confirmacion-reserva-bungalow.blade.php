<!DOCTYPE html>
<html>
<head>
	<title> DETALLE/Editar</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	{!!Html::style('css/datepicker.css')!!}
	{!!Html::style('css/bootstrap-datepicker3.css')!!}
	{!!Html::style('/css/DataTable.css')!!}	
	
</head>
<body>
@extends('layouts.headerandfooter-al-admin-reserva')
@section('content')

<!---Cuerpo -->
<main class="main">
	<div class="content" style="max-width: 100%;">
		<!-- Utilizando Bootstrap -->
		<br/><br/>
		<div class="container">
			<div class="col-sm-12 text-left lead">
					<strong>DETALLE DE LA RESERVA </strong>
			</div>		
		</div>
		<div class="container">
			<!--@include('errors.503')-->		
			<form method="POST" action="/reservar-ambiente/{{ $ambiente->id }}/confirmacion-reserva-bungalow-adminR" class="form-horizontal form-border"> 
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<br/><br/>

			<!-- INICIO INICIO INICIO INICIO -->
			<!-- SE DEBE LEER DATA DE LA BD E INGRESARLOS -->

			<div class="form-group ">
		    	<label for="nombreInput" class="col-sm-4 control-label">NOMBRE</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="nombreInput" name="nombre" value="{{$ambiente->nombre}}" readonly >
		    	</div>
		  	</div>
		  	<div class="form-group ">
		    	<label for="tipoAmbienteInput" class="col-sm-4 control-label">TIPO AMBIENTE</label>	
		    	<div class="col-sm-5">
		    		<input type="text" class="form-control" id="tipoAmbienteInput" name="tipoAmbiente" value="{{$ambiente->tipo_ambiente}}" readonly >
				</div>
		  	</div>

		  	<div class="form-group ">
		    	<label for="capacidadInput" class="col-sm-4 control-label">CAPACIDAD MAXIMA</label>
		    	<div class="col-sm-5">
		      		<input type="number" class="form-control" id="capacidadInput" name="capacidadMax" value="{{$ambiente->capacidad_actual}}" readonly>
		    	</div>
		  	</div>	  	
		  	
		  	<div class="form-group ">
		    	<label for="ubicacionInput" class="col-sm-4 control-label">UBICACIÓN</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="ubicacionInput" name="ubicacion" value="{{$ambiente->ubicacion}}" readonly>
		    	</div>
		  	</div>
		  	<div class="form-group">
			 	<label for="fechaInput" class="col-sm-4 control-label">FECHA (dd/mm/aaaa) </label>
			    <div class="col-sm-5">
				  	<div class="input-group">
			   		<input class="datepicker form-control"  type="text"  id="fecha_inicio_reserva" name="fecha_inicio_reserva" placeholder="Fecha Inicio" value="{{old('fecha_inicio')}}" style="max-width: 250px" >
			   		<span class="input-group-addon">-</span>
			   		<input class="datepicker form-control" type="text" id="fecha_fin_reserva" name="fecha_fin_reserva" placeholder="Fecha Fin" value="{{old('fecha_fin')}}" style="max-width: 250px">

			   	 	</div>
		    	</div>	
			</div>
		  	
			<div class="form-group required">
			    	<label for="persona_id" class="col-sm-4 control-label">Socio</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="persona_id" name="id_persona" placeholder="ID de la Persona" value="{{old('id_persona')}}">
			    	</div>
			    	<a class="btn btn-info" name="buscarPersona" href="#"  title="Buscar Persona" data-toggle="modal" data-target="#modalBuscar"><i name="buscarPersona" class="glyphicon glyphicon-search"></i></a>
			</div>

		  	<div class="form-group ">
		    	<label for="precioInput" class="col-sm-4 control-label">Precio</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="precioInput" onkeypress="return inputLimiter(event,'Numbers')" name="ubicacion" value="FALTA CALCULAR EL PRECIO" readonly>
		    	</div>
		  	</div>
		  	
		  	<div class="form-group required">
			   	<label for="tipoComprobanteInput" class="col-sm-4 control-label">Tipo de Comprobante</label>
			   	<div class="col-sm-5">
			    	<select class="form-control" id="tipo_comprobante" name="tipo_comprobante">
						<option value="-1" selected >Seleccionar tipo...</option>
						@foreach($tipo_comprobantes as $tipo_comprobante)
						<option value="{{$tipo_comprobante->valor}}" >{{$tipo_comprobante->valor}}</option>
						@endforeach						
					</select>						
			    </div>
			</div>	
			
		  	</br>
		  	</br>
		  	
		  	
	  	<!-- FIN FIN FIN -->

			  	<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					
					<div class="btn-group ">
						<input class="btn btn-primary" type="submit" value="Confirmar">
					</div>
					<div class="btn-group">
						<a href="/reservar-ambiente/reservar-bungalow-adminR" class="btn btn-info">Cancelar</a> <!-- Regresa a la pantalla inicial de la reserva -->
					</div>
				</div>

				</br>
				</br>
			</form>
		</div>
	</div>		
@stop
	{!!Html::script('js/jquery.dataTables.js')!!}
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
 <!-- JQuery -->
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	<!-- Bootstrap -->
	{!!Html::script('js/bootstrap.js')!!}

	{!!Html::script('js/bootstrap-datepicker.js')!!}
	 <!-- Languaje -->
    {!!Html::script('js/bootstrap-datepicker.es.min.js')!!}
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
	<!-- DATA TABLE INICIO BUSCAR CONTACTO-->
	<script>		
		$(document).ready(function() {
		   $('#example').DataTable( {
		       "language": {
		           "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		       },		       
		       "dom": '<"pull-left"f><"pull-right"l>tip',
		       "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]]
		  	});
  		});		
  		
		function getPersona(){								
								document.getElementById('persona_id').value =  $('#example input:radio:checked').val();
								
							}
	</script>
	<!-- Modal -->
	<div id="modalBuscar" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">

	    <!-- Modal content-->	    
	    <div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">BUSCAR SOCIO</h4>
			</div>

			<div class="modal-body">	      	  
				<div class="container">					
					<div class="table-responsive">
						<div class="container" id="TableContainer">
							<div class="text-left">
					  			<font color="black"> 
					  				Ingresar alguno de los siguientes campos:
					  				<ul>
					  				<li>DNI</li>
					  				<li>Apellido Paterno</li>
					  				<li>Apellido Materno</li>
					  				<li>Nombre</li>
					  				</ul>
					  			</font>					  			
					  		</div>
					  		<br>
							<table class="table table-bordered table-hover text-center display" id="example" width="100%">
								<thead class="active" data-sortable="true">									
									<th><div align=center>DNI</div> </th>
									<th><div align=center>NOMBRES</div></th>
									<th><div align=center>APELLIDO PATERNO</div></th>
									<th><div align=center>APELLIDO MATERNO</div></th>
									<th><div align=center>SELECCIONAR</div></th>
								</thead>
								<tbody>
									
									@foreach($socios as $socio)						
										<tr>											
											<td>{{$socio->postulante->persona->doc_identidad}}</td>
											<td>{{$socio->postulante->persona->nombre}}</td>		
											<td>{{$socio->postulante->persona->ap_paterno}}</td>
											<td>{{$socio->postulante->persona->ap_materno}}</td>
											<td>
												<div class="radio">
  													<label><input type="radio" name="optradio" value="{{$socio->postulante->persona->id}}"></label>
												</div>
											</td>
							            </tr>				            		
									@endforeach
									
								</tbody>
							</table>																		
						</div>								
					</div>		
				</div>
			</div>								
			<div class="modal-footer">	                    
				<div class="btn-inline">
					<div class="btn-group col-sm-4"></div>														
					<div class="btn-group ">
						<input class="btn btn-primary" onclick="getPersona()" data-dismiss="modal" value="Confirmar">					
					</div>
					<div class="btn-group">
						<a  data-dismiss="modal" class="btn btn-info">Cancelar</a>
					</div>
				</div>
			</div>
		</div>
	  </div>
	</div>
	<style type="text/css">
    @media screen and (min-width: 992px) {
        #modalBuscar .modal-lg {
          width: 90%; /* New width for large modal */         
        }                       

		#TableContainer.container {
	        width: 80%;
	    }        
    }
	</style>
	<!-- DATA TABLE FIN BUSCAR CONTACTO -->
</body>
</html>