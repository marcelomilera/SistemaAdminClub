<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',

]);*/

/*Route::get('/', function () {
    return view('welcome');
});*/
/*Route::get('login2', 'FrontController@login2');*/
Route::get('/', 'FrontController@home');
/*
Route::get('/{nombre}', function ($nombre) {
     return view($nombre);
});*/

Route::resource('usuario','UsuarioController');

Route::resource('log','LogController');
Route::get('logout','LogController@logout');


//Socio
Route::group(['middleware' => ['auth', 'socio']], function () {
	Route::resource('socio','SocioController');
	Route::get('cuenta-s','SocioController@cuenta');
	Route::get('ambientes-s','SocioController@ambientes');
	Route::get('anular-reserva-ambiente-s','SocioController@anularReservaAmbiente');
	Route::get('anular-reserva-ambiente-b-s','SocioController@anularReservaAmbienteB');
	Route::get('pagos-s','SocioController@pagos');
		//Socio.talleres
	Route::get('talleres-s','SocioController@talleres');
	Route::get('futbol-s','SocioController@futbol');
		//Socio.bungalows
	Route::get('bungalows-s','SocioController@bungalow');
	Route::get('reserva-bungalows-s','SocioController@bungalowReserva');
	Route::get('reserva-bungalows-b-s','SocioController@bungalowReservaB');
});



//Administrados de registros
Route::group(['middleware' => ['auth', 'adminregistros']], function () {
	Route::resource('admin-registros','AdminRegistrosController');
	Route::get('cuenta-ar','AdminRegistrosController@cuenta');
	Route::get('ambientes-ar','AdminRegistrosController@ambientes');
	Route::get('registrar-ambiente','AdminRegistrosController@registrar');
	Route::get('modificar-ambiente','AdminRegistrosController@modificar');
});

//Gerente
Route::group(['middleware' => ['auth', 'gerente']], function () {
	Route::resource('gerente','GerenteController');
	Route::get('cuenta-g','GerenteController@cuenta');
});

//Administrados de pagos
Route::group(['middleware' => ['auth', 'adminpagos']], function () {
	Route::resource('admin-pagos','AdminPagosController');
	Route::get('cuenta-ap','AdminPagosController@cuenta');
});



//Administrador general
Route::group(['middleware' => ['auth', 'admingeneral']], function () {
	Route::resource('admin-general','AdminGeneralController');
	Route::get('cuenta-a','AdminGeneralController@cuenta');
	Route::get('postulante-al-admin','AdminGeneralController@postulante');

	//MANTENIMIENTO DE POSTULANTE
	Route::get('postulante/index','PostulanteController@index');
	Route::get('postulante/search','PostulanteController@buscar');
	Route::get('postulante/new','PostulanteController@registrar');
	//MANTENIMIENTO DE TRABAJADOR
	Route::get('trabajador/index','TrabajadorController@index');//ya
	//Route::get('trabajador/search','TrabajadorController@buscar');//ya
	Route::get('trabajador/new','TrabajadorController@registrar');//ya
	Route::post('trabajador/new/trabajador', 'TrabajadorController@store');//ya
	Route::get('trabajador/{id}','TrabajadorController@edit');//ya
	Route::post('trabajador/{id}/edit', 'TrabajadorController@update');
	Route::get('trabajador/{id}/delete', 'TrabajadorController@destroy');
	Route::get('trabajador/{id}/show', 'TrabajadorController@show');//ya


	//MANTENIMIENTO DE SOCIO
	Route::get('Socio/','SocioAdminController@index');
	Route::get('Socio/all','SocioAdminController@indexAll');
	Route::get('Socio/{id}/','SocioAdminController@show');
	Route::get('Socio/{socio}/delete', 'SocioAdminController@destroy');
	Route::get('Socio/{id}/activate','SocioAdminController@activate');

	//MANTENIMIENTO DE MEMBRESIA
	Route::get('membresia/','MembresiaController@index');
	Route::get('membresia/all','MembresiaController@indexAll');
	Route::get('membresia/new','MembresiaController@create');
	Route::get('membresia/{id}/','MembresiaController@show');
	Route::post('membresia/new/save','MembresiaController@store');
	Route::get('membresia/{id}/editar','MembresiaController@edit');
	Route::get('membresia/{membresia}/delete', 'MembresiaController@destroy');
	Route::get('membresia/{id}/activate','MembresiaController@activate');
	Route::patch('membresia/{id}/edit','MembresiaController@update');




	//MANTENIMIENTO DE MULTAS

	Route::get('multa/','MultaController@index');
	Route::get('multa/new','MultaController@create');
	Route::get('multa/{multa}/','MultaController@show');
	Route::post('multa/new/save','MultaController@store');
	Route::get('multa/{multa}/editar','MultaController@edit');
	Route::patch('multa/{multa}/edit','MultaController@update');


	//MANTENIMIENTO DE SEDES
	Route::get('sedes/index', 'SedesController@index');
	Route::get('sedes/new', 'SedesController@create');
	Route::post('sedes/new/sede', 'SedesController@store');
	Route::get('sedes/{id}', 'SedesController@edit');
	Route::post('sedes/{id}/edit', 'SedesController@update');
	Route::get('sedes/{id}/delete', 'SedesController@destroy');
	Route::get('sedes/{id}/show', 'SedesController@show');


	
	// Mantenimiento de Servicios LOL
	Route::get('servicios/index', 'ServiciosController@index');	
	Route::get('servicios/new', 'ServiciosController@create');
	Route::post('servicios/new/servicio', 'ServiciosController@store');
	Route::get('servicios/{id}', 'ServiciosController@edit');
	Route::post('servicios/{id}/edit', 'ServiciosController@update');
	Route::get('servicios/{id}/delete', 'ServiciosController@destroy');
	Route::get('servicios/{id}/show', 'ServiciosController@show');
	
	//MANTENIMIENTO DE PROVEEDORES
	Route::get('proveedor/index/', 'ProveedorController@index');
	Route::get('proveedor/new', 'ProveedorController@create');
	Route::post('proveedor/new/proveedor', 'ProveedorController@store');
	Route::get('proveedor/{id}', 'ProveedorController@edit');
	Route::post('proveedor/{id}/edit', 'ProveedorController@update');
	Route::get('proveedor/{id}/delete', 'ProveedorController@destroy');
	Route::get('proveedor/{id}/show', 'ProveedorController@show');
	//MANTENIMIENTO DE PRODUCTOS
	Route::get('producto/index', 'ProductoController@index');
	Route::get('producto/new', 'ProductoController@create');
	Route::post('producto/new/producto', 'ProductoController@store');
	Route::get('producto/{id}', 'ProductoController@edit');
	Route::post('producto/{id}/edit', 'ProductoController@update');
	Route::get('producto/{id}/delete', 'ProductoController@destroy');
	Route::get('producto/{id}/show', 'ProductoController@show');

	//MANTENIMIENTO DE SORTEO
	Route::get('sorteo/index','SorteoController@index');
	Route::get('sorteo/new','SorteoController@create');	
	Route::post('sorteo/new/sorteo','SorteoController@store');	
	Route::get('sorteo/{id}','SorteoController@edit');
	Route::post('sorteo/{id}/edit', 'SorteoController@update');
	Route::get('sorteo/editSorteo/{id}','SorteoController@showEditSorteo');
	Route::get('sorteo/{id}/delete', 'SorteoController@destroy');
	
	//MANTENIMIENTO DE AMBIENTES
	Route::get('ambiente/index', 'AmbienteController@index');
	Route::get('ambiente/search', 'AmbienteController@search');/*PAra buscar el ambiente y seleccionarlo para ACtividad*/	
	Route::get('ambiente/new', 'AmbienteController@create');
	Route::post('ambiente/new/ambiente', 'AmbienteController@store');
	Route::get('ambiente/{id}', 'AmbienteController@edit');
	Route::post('ambiente/{id}/edit', 'AmbienteController@update');
	Route::get('ambiente/{id}/delete', 'AmbienteController@destroy');
	Route::get('ambiente/{id}/show', 'AmbienteController@show');
	Route::get('ambiente/{id}/select', 'AmbienteController@select');/*Para el seleccionar ambiente desde  Actividad*/
	///MANTENIMIENTO DE ACTIVIDADES
	Route::get('actividad/index', 'ActividadController@index');
	Route::get('actividad/new', 'ActividadController@create');
	Route::post('actividad/new/actividad', 'ActividadController@store');
	Route::get('actividad/{id}', 'ActividadController@edit');
	Route::post('actividad/{id}/edit', 'ActividadController@update');
	Route::get('ambiente/{id}/delete', 'AmbienteController@destroy');
	Route::get('actividad/{id}/show', 'ActividadController@show');

	//MANTENIMIENTO DE TALLERES
	Route::get('talleres/','TallerController@index');
	Route::get('talleres/new','TallerController@create');

	


});
	

/*Route::get('sede-a','SedesController@index');
Route::get('newsede-a','SedesController@create');
Route::get('editsede-a','SedesController@edit');
*/


Route::get('futbol', 'FrontController@futbol');
Route::get('historia-papusclub', 'FrontController@historia_papusclub');
Route::get('historia-papusclub-ver-mas', 'FrontController@historia_papusclub_ver_mas');
Route::get('historia-sede-callao', 'FrontController@historia_sede_callao');
Route::get('historia-sede-callao-ver-mas', 'FrontController@historia_sede_callao_ver_mas');
Route::get('reserva-bungalow', 'FrontController@reserva_bungalow');
Route::get('reserva-bungalow-busqueda', 'FrontController@reserva_bungalow_busqueda');
Route::get('registrar-concesionaria-al','FrontController@registrar_concesionaria_al');
Route::get('registrar-precio-pref-bungalows-al','FrontController@registrar_precio_pref_bungalows_al');
Route::get('registrar-nuevo-producto-al','FrontController@registrar_nuevo_producto_al');
Route::get('registrar-precio-especial-membresia-al','FrontController@registrar_precio_especial_membresia_al');
Route::get('registrar-precio-pref-bungalows-1-al','FrontController@registrar_precio_pref_bungalows_1_al');
Route::get('registrar-precio-especial-membresia-1-al','FrontController@registrar_precio_especial_membresia_1_al');





Route::get('token',function(){
    return csrf_token();
});


Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/prueba', 'FrontController@prueba');