<!DOCTYPE html>
<html>
<head>
	<title>ACTIVIDAD</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	<!-- PARA DATA TABLE -->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> 
</head>
<body>
@extends('layouts.headerandfooter-al-admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<br/><br/>
				<p class="lead"><strong>ACTIVIDAD</strong></p>
				<br/>
			</div>
			
		</div>
		</br>
		</br>
	
		<!-- Mensaje de éxito luego de registrar -->
		@if (session('stored'))
			<script>$("#modalSuccess").modal("show");</script>
			
			<div class="alert alert-success fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>¡Éxito!</strong> {{session('stored')}}
			</div>
		@endif

		<div class="container">
			<table class="table table-bordered table-hover text-center display" id="example">
					<thead class="active">
						<tr>
								<th><DIV ALIGN=center>SEDE</th>
								<th><DIV ALIGN=center>AMBIENTE</th>
								<th><DIV ALIGN=center>NOMBRE</th>
								<th><DIV ALIGN=center>CAPACIDAD</th>
								<th><DIV ALIGN=center>DETALLE</th>
								<th><DIV ALIGN=center>EDITAR</th>
								<th><DIV ALIGN=center>ELIMINAR</th>
						</tr>
					</thead>
					<tbody>
							@foreach($actividades as $actividad)						
						    	<tr>
						    		<td>{{ $actividad->ambiente->sede->nombre }}</td>
						    		<td>{{ $actividad->ambiente->nombre }}</td>
									<td>{{ $actividad->nombre }}</td>
			 						<td>{{ $actividad->capacidad_maxima }}</td>
									<td>
							        <a class="btn btn-info" href="{{url('/actividad/'.$actividad->id.'/show')}}"  title="Detalle" ><i class="glyphicon glyphicon-list-alt"></i></a>
							        </td>
									<td>
							        <a class="btn btn-info" href="{{url('/actividad/'.$actividad->id.'')}}" title="Editar" ><i class="glyphicon glyphicon-pencil"></i></a>
							        </td>
							        <td>
							        <a class="btn btn-info"  title="Eliminar" data-href="{{url('/actividad/'.$actividad->id.'/delete')}}" data-toggle="modal" data-target="#modalEliminar"><i class="glyphicon glyphicon-remove"></i></a>
							        </td>
							            
								</tr>
							@endforeach
					</tbody>				
												
					
			</table>	
			</br>
				</br>
				</br>
				</br>
				
				<div class="btn-inline">
					<!-- <form method="POST" action="/sedes/new/sede" >
					<input type="hidden" name="_token" value="{{ csrf_token() }}"> -->

					<div class="btn-group col-sm-10"></div>
					
					<div class="btn-group ">
						<a href="/actividad/new" class="btn btn-info" type="submit">Registrar Actividad</a>

					</div>
					
				</div>	
			
		</div>
	</div>

		</br></br></br></br></br>


@stop
{!!Html::script('js/jquery-1.11.3.min.js')!!}
	{!!Html::script('js/bootstrap.js')!!}
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	{!!Html::script('js/MisScripts.js')!!}
	<!-- {!!Html::script('js/jquery.dataTables.min.js')!!} -->
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
		   $('#example').DataTable( {
		       "language": {
		           "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		       }
		  	});
  		});
	</script>

</body>
<!-- Modal -->
	<div id="modalEliminar" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Confirmar</h4>
	      </div>
	      <div class="modal-body">
	        <p>¿Está seguro que desea eliminar la actividad?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-danger btn-ok">Confirmar</a>
	      </div>
	    </div>

	  </div>
	</div>

	<!-- Modal Event-->
	<!-- Modal Event-->
	<script>
		$('#modalEliminar').on('show.bs.modal', function(e) {
   			$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
		});
	</script>

	
	<!-- Modal Success -->
	<div id="modalSuccess" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">¡Éxito!</h4>
	      </div>
	      <div class="modal-body">
	        <p>{{session('stored')}}</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>           
	      </div>
	    </div>

	  </div>
	</div>
</html>
