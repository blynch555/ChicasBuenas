<?php

Route::get('/', function(){
	if(App::environment('production'))
		return View::make('register');

	return Redirect::to( Session::get('city_slug', 'santiago') . '/destacadas');
});

Route::get('test', function(){
	$trx = Transaction::find(20);

	echo "<pre>";
	echo print_r($trx->transactionable, 1);

	$trx->publishSiver();

	echo print_r($trx->transactionable, 1);


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


// Pagos
Route::controller('pagos', 		'PagosController');
Route::any('kpf/fracaso', 		'PagosController@getFracaso');
Route::any('kpf/exito', 		'PagosController@getExito');
Route::any('kpf/confirma', 		'PagosController@getConfirmar');



