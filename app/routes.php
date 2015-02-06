<?php

Route::get('/', function(){
	return Redirect::to('santiago/destacadas');
});

Route::get('test', function(){

	$pathLocal = 'img/banner232x115.png';
	$pathAws = 'photos/banner232x115.png';

	Queue::push(function($job) use ($pathLocal, $pathAws){
	    $s3 = AWS::get('s3');
		$bucket = 'media.chicasbuenas.cl';

		$result = $s3->putObject(array(
		    'Bucket'     => $bucket,
		    'Key'        => $pathAws,
		    'SourceFile' => $pathLocal
		));

	    $job->delete();
	});

	echo Media::image($pathAws);
});

Route::get('{city}/destacadas', 	'HomeController@getIndex');
Route::get('{city}/vip', 			'HomeController@getVip');
Route::get('{city}/premium', 		'HomeController@getPremium');
Route::get('{city}/gold', 			'HomeController@getGold');
Route::get('{city}/fantasias', 		'HomeController@getFantasias');
Route::get('{city}/masajistas', 	'HomeController@getMasajistas');
Route::get('{city}/maduritas', 		'HomeController@getMaduritas');
Route::get('{city}/travestis', 		'HomeController@getTravestis');
Route::get('{city}/listado-silver', 'HomeController@getSilver');



// Administrar Cuenta
Route::controller('cuenta', 		'CuentaController');

/* Escort */
Route::group(['prefix' => 'mi/escort', 'before' => 'escort'], function(){
	Route::controller('/', 			'Escort\HomeController');
	Route::controller('perfil', 	'Escort\PerfilController');
	Route::controller('creditos', 	'Escort\CreditosController');
});

/* Usuario */
Route::group(['prefix' => 'mi/usuario', 'before' => 'usuario'], function(){
	Route::controller('/', 			'Usuario\HomeController');
	Route::controller('perfil', 	'Usuario\PerfilController');
});

/* Agencia */
Route::group(['prefix' => 'mi/agencia', 'before' => 'agencia'], function(){
	Route::controller('/', 			'Agencia\HomeController');
	Route::controller('chicas', 	'Agencia\ChicasController');
	Route::controller('pagos', 		'Agencia\PagosController');
});

/* Silver */
Route::group(['prefix' => 'mi/silver', 'before' => 'agencia'], function(){
	Route::controller('/', 			'Silver\HomeController');
});



// Administración
Route::group(['prefix' => 'admin', 'before' => 'admin'], function(){
	Route::controller('/', 			'Admin\HomeController');
});


// API
Route::group(['prefix' => 'api', 'before' => 'api'], function(){
	Route::resource('users', 		'Api\UserController');	
	Route::resource('escorts', 		'Api\EscortController');	
});