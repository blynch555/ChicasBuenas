<?php



Route::get('/', function(){
	return Redirect::to( Session::get('city_slug', 'santiago') . '/destacadas');
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

Route::get('sms/{id}', ['as' => 'sendSMS', 'uses' => 'HomeController@getSms']);
Route::get('sms-silver', ['as' => 'sendSMSilver', 'uses' => 'HomeController@getSmsSilver']);


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
	$city_slug = Session::get('city_slug', 'santiago');
	$city = City::whereSlug($city_slug)->first();
	if(!$city) $city = City::first();

	$view->publicaMe = Publicame::whereCityId($city->id)->orderBy('purchase_date', 'desc')->take(36)->get();
});


Route::post('send-email', function(){
	if(Auth::check() and Auth::user()->isAdmin()):
		$email = Input::get('email');
		$subject = Input::get('subject');
		$body = Input::get('body');

		Mail::queue('emails.email', ['body' => $body], function($message) use ($email, $subject){
			$message
				->to($email)
				->subject($subject);
		});

		return ['success' => true];
	else:
		return ['success' => false];
	endif;
});

Route::post('publish', function(){
	if(Auth::check() and Auth::user()->isAdmin()):

		$escort = Escort::find(Input::get('id'));
		if($escort):
			$escort->status = 'Publicada';
			$escort->save();
		endif;

		return ['success' => true];
	else:
		return ['success' => false];
	endif;
});