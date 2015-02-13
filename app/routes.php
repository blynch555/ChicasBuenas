<?php

Route::get('/', function(){
	if(App::environment('production'))
		return View::make('register');

	return Redirect::to( Session::get('city_slug', 'santiago') . '/destacadas');
	return Redirect::to( Session::get('city_name', 'Santiago') . '/destacadas');
});

Route::get('image', function(){



	$img = Image::make('uploads/79c009f9eb707339fa15dfe9093d7f16_small.jpeg');
	$img->fit(150, 200);
	$img->insert('img/thumbTpl.png');
	$img->text('M. Fernanda', 75, 191, function($font) {
		$font->file(5);
	    $font->color('#fff');
	    $font->align('center');
	});

	return $img->response();
});

Route::get('sms', function(){

	//return $rs = NexmoSmsMessage::sendText('56987144166','56987144166','Matias, te invitamos a publicarte en nuestra sección de travetis, GRATIS!');


	SMS::send('+56987144166', 'Te invitamos a ser una ChicaBuena (Escort) y te regalamos 1.500 creditos para publicarte, solo registrate en http://chicasbuenas.cl');

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

Route::get('{city}/chicas/{slug},{id}', ['uses' => 'ChicaController@getView', 'as' => 'escortView']);


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

View::composer('templates.default', function($view){
	$view->publicaMe = Escort::take(36)->get();
});





