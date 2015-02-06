<?php

Route::get('/', function(){
	return View::make('hello');
});

Route::get('test', function(){

	$pathLocal = 'img/photo.png';
	$pathAws = 'photos/photo2.png';

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

Route::controller('cuenta', 		'CuentaController');

Route::group(['prefix' => 'admin', 'before' => 'admin'], function(){
	Route::controller('/', 			'Admin\HomeController');
});

Route::group(['prefix' => 'api', 'before' => 'api'], function(){
	Route::resource('users', 		'Api\UserController');	
	Route::resource('escorts', 		'Api\EscortController');	
});

Route::group(['prefix' => 'mi/escort', 'before' => 'escort'], function(){
	Route::controller('/', 			'Escort\HomeController');
	Route::controller('perfil', 	'Escort\PerfilController');
	Route::controller('creditos', 	'Escort\CreditosController');
});

Route::group(['prefix' => 'mi/usuario', 'before' => 'usuario'], function(){
	Route::controller('/', 			'Usuario\HomeController');
	Route::controller('perfil', 	'Usuario\PerfilController');
});

Route::group(['prefix' => 'mi/agencia', 'before' => 'agencia'], function(){
	Route::controller('/', 			'Agencia\HomeController');
	Route::controller('chicas', 	'Agencia\ChicasController');
	Route::controller('pagos', 		'Agencia\PagosController');
});