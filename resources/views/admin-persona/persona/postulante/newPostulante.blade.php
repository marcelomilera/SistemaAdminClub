<!DOCTYPE html>
<html>
<head>
	<title>POSTULANTE</title>
	<meta charset="UTF-8">

	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/datepicker.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	{!!Html::style('css/jquery.bxslider.css')!!}
	<!-- <link rel="stylesheet" type="text/css" href="css/estilos.css"> -->
	<!-- PARA DATA TABLE -->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> 
	<style type="text/css" media="screen">
		#dpd1{
			width:300px;
		}
		#map {
			width: 600px;
        	height: 450px;
		}
	</style>

<!--Aqui viene la magia-->

<style>
	#map-canvas{
		height: 500px;
		width: 500px;
		margin: 0px;
		padding: 0px;
	}
</style>

<!-- <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> -->
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>  -->
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuOs_TsnqNatCMf__4y1fSoQi0-L-soHM&libraries=places"></script>  -->

</head>
<body>

@extends('layouts.headerandfooter-al-admin-persona')
@section('content')

		<br>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-left">
					<p class="lead"><strong>REGISTRAR POSTULANTE</strong></p>
				</div>
			</div>	
		</div>

		<div class="container">
			<form method="POST" action="/postulante/new/postulante" class="form-horizontal form-border">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="col-sm-4"></div>
				<div class="">
		  			@if ($errors->any())
		  				<ul class="alert alert-danger fade in">
		  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  					@foreach ($errors->all() as $error)
		  						<li>{{$error}}</li>
		  					@endforeach
		  				</ul>
		  			@endif
			  		
				</div>

				<div class="row">
					<div class="col-sm-12 text-center">
						<div role="tabpanel">
							<ul class="nav nav-pills nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#seccion1" aria-controls="seccion1" data-toggle="tab" role="tab">Paso 1: Datos Básicos</a></li>
								<li role="presentation"><a href="#seccion2" aria-controls="seccion2" data-toggle="tab" role="tab">Paso 2: Nacimiento</a></li>
								<li role="presentation"><a href="#seccion3" aria-controls="seccion3" data-toggle="tab" role="tab">Paso 3: Educacion</a></li>
								<li role="presentation"><a href="#seccion4" aria-controls="seccion4" data-toggle="tab" role="tab">Paso 4: Empleo</a></li>
								<li role="presentation"><a href="#seccion5" aria-controls="seccion5" data-toggle="tab" role="tab">Paso 5: Contacto</a></li>
								<li role="presentation"><a href="#seccion6" aria-controls="seccion6" data-toggle="tab" role="tab">Paso 6: Vivienda</a></li>
								<!--<li role="presentation"><a href="#seccion6" aria-controls="seccion7" data-toggle="tab" role="tab">Paso 7: Contactos</a></li> -->
							</ul>
						</div>

						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="seccion1">
								<form action="" class="form-horizontal form-border">
									<br>
										<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
									<br>
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Nombre:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" style="max-width: 250px" value="{{old('nombre')}}" >
											</div>	
										</div>
									</div>

									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Apellido Paterno:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="ap_paterno" name="ap_paterno" placeholder="Apellido Paterno" style="max-width: 250px" value="{{old('ap_paterno')}}">
											</div>	
										</div>
									</div>

									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Apellido Materno:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="ap_materno" name="ap_materno" placeholder="Apellido Materno" style="max-width: 250px" value="{{old('ap_materno')}}">
											</div>	
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Sexo:</label>
											</div>
											<div class="col-sm-6 text-left" style="float: right">											
													<div>
														{{ Form::radio('sexo', 'masculino','selected') }}Masculino
													</div>
													<div>
														{{ Form::radio('sexo', 'femenino'   ) }}Femenino
													</div>
											</div>	
										</div>
									</div>
									

									<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Nacionalidad:</label>
											</div>
											<div class="col-sm-6 text-left" >
													<input checked onchange="seleccionaPeruano()" type="radio" name="nacionalidad" value="peruano" {{ (old('nacionalidad') == "peruano") ? 'checked="true"' : '' }}/>Peruano&nbsp&nbsp&nbsp
													<input onchange="seleccionaExtranjero()" type="radio" name="nacionalidad" value="extranjero" {{ (old('nacionalidad') == "extranjero") ? 'checked="true"' : '' }}/>Extranjero

											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">DNI:</label>
											</div>
											<div class="col-sm-6">
											<!--Se hace validacion para que acepte solo numeros pero que sea un texto-->
												<input  type="text" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="doc_identidad" name="doc_identidad" placeholder="DNI" maxlength="8" style="max-width: 250px" value="{{old('doc_identidad')}}" {{ (old('nacionalidad') == "extranjero") ? 'disabled="true"' : '' }}  >
											</div>	
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Carnet de extranjeria:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="carnet_extranjeria" name="carnet_extranjeria" placeholder="Carnet de Extranjeria" maxlength="12" style="max-width: 250px" value="{{old('carnet_extranjeria')}}" {{ (old('nacionalidad') == "peruano") ? 'disabled="true"' : '' }}  {{ (old('nacionalidad') == "") ? 'disabled="true"' : '' }} >
											</div>	
										</div>
									</div>

								</form>

							</div>

							<div role="tabpanel" class="tab-pane" id="seccion2">
								<br>

										<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
								<br>


								<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">&nbspFecha de Nacimiento</label>
											</div>
											<div class="col-sm-6">
												<input style="width: 250px" class="datepicker" type="text" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha Nacimiento" readonly="true" value="{{old('fecha_nacimiento')}}" >
											</div>	
										</div>
								</div>

									<div class="text-left" style="margin-left: 1cm; color:red">
											<label for="" class="control-label">(*) Llenar los combos solo si es peruano</label>
									</div><br>

									<div class="form-group required">
											<div class="col-sm-6">
												<div class="col-sm-6 text-left">
													<label for="" class="control-label">Lugar de Nacimiento:</label>
												</div>
													<div class="col-sm-6">
														<select class="form-control" id="departamento" name="departamento" style="max-width: 250px " data-link="{{ url('/provincias') }}">
															<option value="-1" default>--Departamento--</option>
																@foreach ($departamentos as $depa)      
												                	<option value="{{$depa->id}}"   >{{$depa->nombre}}</option>
												                @endforeach
														</select>
														
														<br>
														<select class="form-control" id="provincia" name="provincia" style="max-width: 250px " data-link="{{ url('/distritos') }}" disabled="true">
															<option  value="-1" default disab>--Provincia--</option>
														</select>
														<br>
														<select class="form-control" id="distrito" name="distrito" style="max-width: 250px " disabled="true">
															<option  value="-1" default>--Distrito--</option>
														</select>

														

														<!--<a href="#" id="try" data-link="{{ url('/test') }}">Try</a>-->

													</div>	
											</div>
									</div>
									
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Direccion de Nacimiento:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="direccion_nacimiento" name="direccion_nacimiento" placeholder="direccion Nacimiento" style="max-width: 250px" value="{{old('direccion_nacimiento')}}">
											</div>		
										</div>
									</div>

									<div class="text-left" style="margin-left: 1cm; color:red">
											<label for="" class="control-label">(*) Llenar los combos solo si es extranjero</label>
									</div><br>

									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Pais de Nacimiento:</label>
											</div>
											<div class="col-sm-6">
												<input  disabled="true" type="text" class="form-control" id="pais_nacimiento" name="pais_nacimiento" placeholder="Pais de Nacimiento" style="max-width: 250px" value="{{old('pais_nacimiento')}}">
											</div>		
										</div>
									</div>
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Ciudad de Nacimiento:</label>
											</div>
											<div class="col-sm-6">
												<input disabled="true" type="text" class="form-control" id="lugar_nacimiento" name="lugar_nacimiento" placeholder="Ciudad de Nacimiento" style="max-width: 250px" value="{{old('lugar_nacimiento')}}">
											</div>		
										</div>
									</div>

							</div>

							<div role="tabpanel" class="tab-pane" id="seccion3">

							<br>
								
										<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
							<br>
								<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Educacion Primaria:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="colegio_primario" name="colegio_primario" placeholder="Educacion Primaria" style="max-width: 250px" value="{{old('colegio_primario')}}">
											</div>		
										</div>
								</div>
								<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Educacion secundaria:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="colegio_secundario" name="colegio_secundario" placeholder="Educacion Secundaria" style="max-width: 250px" value="{{old('colegio_secundario')}}">
											</div>		
										</div>
								</div>
								<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Universidad:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="universidad" name="universidad" placeholder="Universidad" style="max-width: 250px" value="{{old('universidad')}}">
											</div>		
										</div>
								</div>

								<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Profesion:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="profesion" name="profesion" placeholder="Profesion" style="max-width: 250px" value="{{old('profesion')}}">
											</div>		
										</div>
								</div>
							</div>

							<div role="tabpanel" class="tab-pane" id="seccion4">
								<br>
										<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
								<br>
								

								<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Centro de Trabajo:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="centro_trabajo" name="centro_trabajo" placeholder="Centro de Trabajo" style="max-width: 250px" value="{{old('centro_trabajo')}}">
											</div>		
										</div>
								</div>

								<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Cargo de Trabajo:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="cargo_trabajo" name="cargo_trabajo" placeholder="Cargo de Trabajo" style="max-width: 250px" value="{{old('cargo_trabajo')}}">
											</div>		
										</div>
								</div>

								<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Direccion Laboral</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="direccion_laboral" name="direccion_laboral" placeholder="Direccion Laboral" style="max-width: 250px" value="{{old('direccion_laboral')}}">
											</div>		
										</div>
								</div>
								
							
							</div>

							<div role="tabpanel" class="tab-pane" id="seccion5">
								<br>
										<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
								<br>
								

								<div class="form-group ">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Telefono Fijo:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" onkeypress="return inputLimiter(event,'Numbers')" maxlength="7" id="telefono_domicilio" name="telefono_domicilio" placeholder="Telefono fijo" style="max-width: 250px" value="{{old('telefono_domicilio')}}">
											</div>		
										</div>
								</div>

								<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Telefono Celular:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" onkeypress="return inputLimiter(event,'Numbers')" maxlength="9" id="telefono_celular" name="telefono_celular" placeholder="Telefono celular" style="max-width: 250px" value="{{old('telefono_celular')}}">
											</div>		
										</div>
								</div>

								<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Correo:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="correo" name="correo" placeholder="Correo" style="max-width: 250px" value="{{old('correo')}}">
											</div>		
										</div>
								</div>
								
								<br><br>
								<div class="form-group required" >
										<div class="btn-group col-sm-5" ></div>
										
										<div class="btn-group">
											<input class="btn btn-primary "  type="submit" value="Confirmar">
										</div>
										<div class="btn-group">
											<a href="/postulante/index" class="btn btn-info">Cancelar</a>
										</div>
								</div>
							</div>

							<div role="tabpanel" class="tab-pane" id="seccion6">
								<br>
										<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
								<br>

								<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Lugar de vivienda</label>
											</div>
											<div class="col-sm-6">
													<select class="form-control" id="departamento_vivienda" name="departamento_vivienda" style="max-width: 250px " data-link="{{ url('/provincias_vivienda') }}">
														<option value="-1" default>--Departamento--</option>
															@foreach ($departamentos as $depavivienda)      
											                	<option value="{{$depavivienda->id}}"   >{{$depavivienda->nombre}}</option>
											                @endforeach
													</select>
													
													<br>
													<select class="form-control" id="provincia_vivienda" name="provincia_vivienda" style="max-width: 250px " data-link="{{ url('/distritos_vivienda') }}" disabled="true">
														<option  value="-1" default disab>--Provincia--</option>
													</select>
													<br>
													<select class="form-control" id="distrito_vivienda" name="distrito_vivienda" style="max-width: 250px " disabled="true">
														<option  value="-1" default>--Distrito--</option>
													</select>
											</div>

										</div>
								</div>

								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Direccion Laboral</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="searchmap" name="direccion_vivienda" placeholder="Direccion Laboral" style="max-width: 250px" value="{{old('direccion_laboral')}}">
										</div>		
									</div>
								</div>

								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Mapa: </label>
										</div>
										<div class="col-sm-6">
											<div id="map" width="600" height="450" frameborder="0" style="border:0"  allowfullscreen></div>
<!-- 											<iframe width="600" height="450" frameborder="0" style="border:0"  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAuOs_TsnqNatCMf__4y1fSoQi0-L-soHM&q=Space+Needle,Seattle+WA" allowfullscreen></iframe> -->
										</div>		
									</div>
								</div>								

								<div class="container">
									

										<div class="form-group">
											<label for="">Lat</label>
											<input type="text" class="form-control input-sm" name="lat" id="lat">
										</div>

										<div class="form-group">
											<label for="">Lng</label>
											<input type="text" class="form-control input-sm" name="lng" id="lng">
										</div>

										<button class="btn btn-sm btn-danger">Save</button>

								</div>      
							</div> 


						</div>
					</div>
					
				</div>
			</form>
		</div>


@stop
<!-- JQuery -->
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
<!--  	 <script src="../js/jquery-3.0.0.js"></script>  -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
	<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->

 	{!!Html::script('js/bootstrap.js')!!}
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	{!!Html::script('js/MisScripts.js')!!}
	<script>$.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} })</script>
	{!!Html::script('js/bootstrap-datepicker.js')!!}
<!-- 	<script type="text/javascript" src="../js/bootstrap-datepicker-sirve.js"></script> -->


<!-- 	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuOs_TsnqNatCMf__4y1fSoQi0-L-soHM&signed_in=true&callback=initMap" async defer> </script>
	 -->
	 
	<script>
    var script = document.createElement('script');
    script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyAuOs_TsnqNatCMf__4y1fSoQi0-L-soHM&signed_in=true&callback=initMap";
    document.getElementsByTagName('head')[0].appendChild(script);
	</script>

	<script>

			function initMap() {
			  var mapDiv = document.getElementById("map");
			  var map = new google.maps.Map(mapDiv, {
			    zoom: 8,
			    center: new google.maps.LatLng(-34.397, 150.644)
			  });

			  // We add a DOM event here to show an alert if the DIV containing the
			  // map is clicked.
			  google.maps.event.addDomListener(window, 'load', initMap);
			  google.maps.event.addDomListener(mapDiv, 'click', function() {
			    window.alert('Map was clicked!');
			  });
			}
	</script>


<!-- 	<script>

	function initialize(){
		
		
		var map= new google.maps.Map(document.getElementById('map-canvas'), {
			center:{ 
				lat:-12.089279446409028,
				lng:-77.02249328165635
			},
			zoom:15,
			mapTypeId: google.maps.MapTypeId.TERRAIN
		});

		var marker= new google.maps.Marker({
			position:{
				lat:-12.089279446409028,
				lng:-77.02249328165635
			},
			map: map,
			draggable:true
		});

		var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));

		google.maps.event.addListener(searchBox,'places_changed', function(){

			var places = searchBox.getPlaces();
			var bounds = new google.maps.LatLngBounds();

			for(i=0;place=places[i];i++){
				bounds.extend(place.geometry.location);
				marker.setPosition(place.geometry.location); //set marker position new
			}

			map.fitBounds(bounds);
			map.setZoom(30);
		});

		google.maps.event.addListener(marker,'position_changed',function(){

			var lat=marker.getPosition().lat();
			var lng=marker.getPosition()-lng();

			$('#lat').val(lat);
			$('#lat').val(lng);


		});

	}
	google.maps.event.addDomListener(window,"load",initialize);	
	</script> -->


	<script>
		$(document).ready(function(){
			$(function(){
				$('.datepicker').datepicker({
					format: "dd/mm/yyyy",
			        language: "es",
			        autoclose: true,
			        //beforeShowDay:function (date){return false}
				});

			});

		});
		$('.datepicker').on('changeDate', function(ev){
			    $(this).datepicker('hide');
		});
			
	</script>	


    <script type="text/javascript">

	    
		$(document).ready(function(){

			$("#departamento").change(function(event){
				document.getElementById("provincia").disabled = false;
				document.getElementById("distrito").disabled = true;
			    $("#distrito").empty();
			    $("#distrito").append("<option  value='-1' default>--Distrito--</option>");
				var url = $(this).attr("data-link");
				$departamento_id=event.target.value;
							//alert($departamento_id);
				//alert(url);
				$.ajax({
			        url: "provincias",
			        type:"POST",
			        beforeSend: function (xhr) {
			            var token = $('meta[name="csrf_token"]').attr('content');

			            if (token) {
			                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
			            }
			        },
			        data: { id: $departamento_id},
			        success:function(data){
			        	$("#provincia").empty();
			        	$("#provincia").append("<option  value='-1' default>--Provincia--</option>");
			        	$.each(data,function(index,elememt){
			        		
			        		$("#provincia").append("<option value='"+elememt.id+"'>"+elememt.nombre+"</option>");
			           		 console.log("mensaje que quieras");

			        	});
			        },error:function(){ 
			            alert("error!!!!");
			        }
			    }); //end of ajax
			});


			$("#provincia").change(function(event){
				document.getElementById("distrito").disabled = false;
				var url = $(this).attr("data-link");
				$provincia_id=event.target.value;
							//alert($provincia_id);
				//alert(url);
				//alert($provincia_id);
				$.ajax({
			        url: "distritos",
			        type:"POST",
			        beforeSend: function (xhr) {
			            var token = $('meta[name="csrf_token"]').attr('content');

			            if (token) {
			                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
			            }
			        },
			        data: { id: $provincia_id},
			        success:function(data){
			        	$("#distrito").empty();
			        	$("#distrito").append("<option  value='-1' default>--Distrito--</option>");
			        	$.each(data,function(index,elememt){

							//alert(elememt.id);
			        		//alert(element.nombre);
			        		$("#distrito").append("<option value='"+elememt.id+"'>"+elememt.nombre+"</option>");
			        	});
			            //alert(data);
			        },error:function(){ 
			            alert("error!!!!");
			        }
			    }); //end of ajax
			});


			$("#try").click(function(){
			    var url = $(this).attr("data-link");
			    //alert(url);
			    $.ajax({
			        url: "test",
			        type:"POST",
			        beforeSend: function (xhr) {
			            var token = $('meta[name="csrf_token"]').attr('content');

			            if (token) {
			                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
			            }
			        },
			        data: { testdata : 'testdatacontent' },
			        success:function(data){
			            alert(data);
			        },error:function(){ 
			            alert("error!!!!");
			        }
			    }); //end of ajax
			});

		});


	</script>

	    <script type="text/javascript">

	    /*listas para obtener la vivienda*/
		$(document).ready(function(){

			$("#departamento_vivienda").change(function(event){
				document.getElementById("provincia_vivienda").disabled = false;
				document.getElementById("distrito_vivienda").disabled = true;
			    $("#distrito_vivienda").empty();
			    $("#distrito_vivienda").append("<option  value='-1' default>--Distrito--</option>");
				var url = $(this).attr("data-link");
				$departamento_id=event.target.value;
				//alert($departamento_id);
				//alert(url);
				$.ajax({
			        url: "provincias_vivienda",
			        type:"POST",
			        beforeSend: function (xhr) {
			            var token = $('meta[name="csrf_token"]').attr('content');

			            if (token) {
			                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
			            }
			        },
			        data: { id: $departamento_id},
			        success:function(data){
			        	$("#provincia_vivienda").empty();
			        	$("#provincia_vivienda").append("<option  value='-1' default>--Provincia--</option>");
			        	$.each(data,function(index,elememt){
			        		
			        		$("#provincia_vivienda").append("<option value='"+elememt.id+"'>"+elememt.nombre+"</option>");
			           		 console.log("mensaje que quieras");

			        	});
			        },error:function(){ 
			            alert("error!!!!");
			        }
			    }); //end of ajax
			});


			$("#provincia_vivienda").change(function(event){
				document.getElementById("distrito_vivienda").disabled = false;
				var url = $(this).attr("data-link");
				$provincia_id=event.target.value;
				//alert($provincia_id);
				//alert(url);
				//alert($provincia_id);
				$.ajax({
			        url: "distritos_vivienda",//esta es la cadena que debe ir en el route /postulante/distritos_vivienda
			        type:"POST",
			        beforeSend: function (xhr) {
			            var token = $('meta[name="csrf_token"]').attr('content');

			            if (token) {
			                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
			            }
			        },
			        data: { id: $provincia_id},
			        success:function(data){
			        	$("#distrito_vivienda").empty();
			        	$("#distrito_vivienda").append("<option  value='-1' default>--Distrito--</option>");
			        	$.each(data,function(index,elememt){

							//alert(elememt.id);
			        		//alert(element.nombre);
			        		$("#distrito_vivienda").append("<option value='"+elememt.id+"'>"+elememt.nombre+"</option>");
			        	});
			            //alert(data);
			        },error:function(){ 
			            alert("error!!!!");
			        }
			    }); //end of ajax
			});

		});


	</script>

	<script>
		//Script en el caso en que se seleccione el combo peruano

		function seleccionaPeruano() {
	    	document.getElementById('departamento').disabled = false;
	    	document.getElementById('doc_identidad').disabled = false;
	    	document.getElementById('direccion_nacimiento').disabled = false;
	    	document.getElementById('carnet_extranjeria').disabled = true;
	    	document.getElementById('pais_nacimiento').disabled = true;
	    	document.getElementById('lugar_nacimiento').disabled = true;
	    	//antes onclick
			document.getElementById('carnet_extranjeria').value = '';	
			document.getElementById('pais_nacimiento').value = '';	
			document.getElementById('lugar_nacimiento').value = '';	
		}

		function seleccionaExtranjero(){
	    	document.getElementById('departamento').disabled = true;
	    	document.getElementById('carnet_extranjeria').disabled = false;
	    	document.getElementById('direccion_nacimiento').disabled = true;
	    	document.getElementById('doc_identidad').disabled = true;
	    	document.getElementById('pais_nacimiento').disabled = false;
	    	document.getElementById('lugar_nacimiento').disabled = false;
	    	//antes onclick
	    	document.getElementById('doc_identidad').value = ''; 
	    	document.getElementById('direccion_nacimiento').value = ''; 
		}
	</script>

	</body>
</html>