<?php

Route::get('/', function(){
	return View::make('hello');
});

Route::get('test', function(){
	$s3 = AWS::get('s3');
	$bucket = 'media.chicasbuenas.cl';
	$path = 'photos/photo.png';

	$result = $s3->putObject(array(
	    'Bucket'     => $bucket,
	    'Key'        => 'photos/photo.png',
	    'SourceFile' => 'img/photo.png'
	));


	$iterator = $s3->getIterator('ListObjects', array(
	    'Bucket' => $bucket
	));

	foreach ($iterator as $object) {
	    echo $object['Key'] . "<br>";
	}

	echo Media::image($path);
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