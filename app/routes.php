<?php

Route::get('/', function(){
	if(App::environment('production'))
		return View::make('register');

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

Route::get('ipn/notificador', function(){

	File::put('post.txt', print_r($_POST, 1));
	File::put('get.txt', print_r($_GET, 1));
	File::put('request.txt', print_r($_REQUEST, 1));
	File::put('input.txt', print_r(Input::all(), 1));

});

Route::get('{city}/destacadas', 	['uses' => 'HomeController@getIndex', 		'as' => 'home']);
Route::get('{city}/vip', 			['uses' => 'HomeController@getVip', 		'as' => 'home_vip']);
Route::get('{city}/premium', 		['uses' => 'HomeController@getPremium', 	'as' => 'home_premium']);
Route::get('{city}/gold', 			['uses' => 'HomeController@getGold', 		'as' => 'home_gold']);
Route::get('{city}/fantasias', 		['uses' => 'HomeController@getFantasias', 	'as' => 'home_fantasias']);
Route::get('{city}/masajistas', 	['uses' => 'HomeController@getMasajistas', 	'as' => 'home_masajistas']);
Route::get('{city}/maduritas', 		['uses' => 'HomeController@getMaduritas', 	'as' => 'home_maduritas']);
Route::get('{city}/travestis', 		['uses' => 'HomeController@getTravestis', 	'as' => 'home_travestis']);
Route::get('{city}/listado-silver', ['uses' => 'HomeController@getSilver', 		'as' => 'home_silver']);

Route::get('{city}/chica/{slug},{id}', ['uses' => 'ChicaController@getView', 'as' => 'escortView']);


Route::controller('cuenta', 		'CuentaController');
Route::controller('escort', 		'EscortController');
Route::controller('agencia', 		'AgenciaController');
Route::controller('usuario', 		'UsuarioController');
Route::controller('silver', 		'SilverController');



// Administración
Route::group(['prefix' => 'admin', 'before' => 'admin'], function(){
	Route::controller('/', 			'Admin\HomeController');
});


// API
Route::group(['prefix' => 'api', 'before' => 'api'], function(){
	Route::resource('users', 		'Api\UserController');	
	Route::resource('escorts', 		'Api\EscortController');	
});