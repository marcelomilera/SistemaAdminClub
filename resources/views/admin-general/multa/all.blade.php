<!DOCTYPE html>
<html>
<head>
	<title>MULTA</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> 
</head>
<body>
@extends('layouts.headerandfooter-al-admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-left">
				<br/><br/>
				<p class="lead"><strong>MULTAS</strong></p>
				<br/>
			</div>
			
		</div>
	</div>
	</br>
		</br>
		@if (session('stored'))
			<script>$("#modalSuccess").modal("show");</script>
			
			<div class="alert alert-success fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>¡Éxito!</strong> {{session('stored')}}
			</div>
		@endif
		@if (session('eliminated'))			
			<div class="alert alert-warning fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Aviso</strong> {{session('eliminated')}}
			</div>
		@endif
		<div class="container">
			<div class="form-group">
				<div class="col-sm-1 text-right">
					<a class="btn btn-primary" href="{{url('/multa/')}}" title="Registrar Multa" >Ocultar Inhabilitados</a>	
				</div>
			</div>
			<br/>
		</div>
		</br>
		</br>


		<div class="table-responsive">
			<div class="container">
				<table class="table table-bordered table-hover text-center display" id="example">
						<thead class="active">
							
							<th><div align=center>DESCRIPCIÓN</div> </th>
							<th><div align=center>MONEDA</div></th>
							<th><div align=center>MONTO PENALIDAD</div></th>
							<th><div align=center>DETALLE</div></th>
							<th><div align=center>EDITAR</div></th>
							<th><div align=center>ELIMINAR</div></th>
	
						</thead>
						<tbody>
							@foreach($multas as $multa)						
								<tr>
									
									<td>{{$multa->descripcion}}</td>
									<td>S/.</td>
									<td>{{$multa->montoPenalidad}}</td>
									@if($multa->trashed())
									<td>
					              	<a class="btn btn-info" href="{{url('/multa/'.$multa->id)}}/"  title="Detalle" ><i class="glyphicon glyphicon-list-alt"></i></a>
					            	</td>
					            	<td>
							        	<a class="btn btn-info" href="{{url('/multa/'.$multa->id)}}/editar" title="Editar" ><i class="glyphicon glyphicon-pencil"></i></a>
							        </td>
							        <td>
										<a class="btn btn-info"  title="Activar" data-href="{{url('/multa/'.$multa->id.'/activate')}}" data-toggle="modal" data-target="#modalActivar"><i class="glyphicon glyphicon-ok"></i></a>
					            	</td>
					            	@else
					            	<td>
					              		<a class="btn btn-info" href="{{url('/multa/'.$multa->id)}}/"  title="Detalle" ><i class="glyphicon glyphicon-list-alt"></i></a>
					            	</td>
					            	<td>
							        	<a class="btn btn-info" href="{{url('/multa/'.$multa->id)}}/editar" title="Editar" ><i class="glyphicon glyphicon-pencil"></i></a>
							        </td>
					            	<td>
					              	<a class="btn btn-info" href="#" title="Eliminar" ><i class="glyphicon glyphicon-remove"></i></a>
					            	</td>
					            	@endif
					            </tr>				            
						
							@endforeach
						</tbody>
				</table>			
			</div>		
		</div>
	

	<div class="container">
		<div class="form-group"><br>
			<div class="col-sm-7 text-right">
				<a class="btn btn-info" href="{{url('/multa/new')}}" title="Registrar Multa"><i>Registrar Multa</i> </a>	
			</div>
		</div>
		<br/>
	</div>




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
	        <p>¿Está seguro que desea eliminar la multa?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-danger btn-ok">Confirmar</a>
	      </div>
	    </div>

	  </div>
	</div>

	<!-- Modal Event-->
	<script>
		$('#modalEliminar').on('show.bs.modal', function(e) {
   			$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
		});
	</script>
	
		<!-- Modal -->
	<div id="modalActivar" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Confirmar</h4>
	      </div>
	      <div class="modal-body">
	        <p>¿Desea reactivarlo?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-info btn-ok">Confirmar</a>
	      </div>
	    </div>

	  </div>
	</div>

	<!-- Modal Event-->
	<!-- Modal Event-->
	<script>
		$('#modalActivar').on('show.bs.modal', function(e) {
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

</body>
</html>