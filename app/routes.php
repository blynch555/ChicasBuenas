<?php

Route::get('/', function(){
	if(App::environment('production'))
		return View::make('register');

	return Redirect::to('santiago/destacadas');
});

Route::any('kpf/fracaso', function(){
	$flowAPI = new kpf\flowAPI;
	
	try {
		echo "try<br>";
		$flowAPI->read_result();
	} catch (Exception $e) {
		echo "catch<br>";

		return $e;
		echo $flowAPI->build_response(false);
		return;
	}

	/*$FLOW_STATUS 	= $flowAPI->getStatus();
	$ORDEN_NUMERO 	= $flowAPI->getOrderNumber();
	$MONTO 			= $flowAPI->getAmount();
	$ORDEN_FLOW 	= $flowAPI->getFlowNumber();
	$PAGADOR 		= $flowAPI->getPayer();

	echo "FLOW_STATUS: $FLOW_STATUS<br>";
	echo "ORDEN_NUMERO: $ORDEN_NUMERO<br>";
	echo "MONTO: $MONTO<br>";
	echo "ORDEN_FLOW: $ORDEN_FLOW<br>";
	echo "PAGADOR: $PAGADOR<br>";

	File::put('fracaso.txt', print_r(Input::all(), 1));*/
	return Input::all();
});

Route::any('kpf/exito', function(){

	return Input::all();
});

Route::any('kpf/confirma', function(){
	$flowAPI = new kpf\flowAPI;

	try {
		$flowAPI ->read_confirm();
	} catch (Exception $e) {
		echo $flowAPI->build_response(false);
		return;
	}

	//Recupera Los valores de la Orden
	$FLOW_STATUS 	= $flowAPI->getStatus();  //El resultado de la transacción (EXITO o FRACASO)
	$ORDEN_NUMERO 	= $flowAPI->getOrderNumber(); // N° Orden del Comercio
	$MONTO 			= $flowAPI->getAmount(); // Monto de la transacción
	$ORDEN_FLOW 	= $flowAPI->getFlowNumber(); // Si $FLOW_STATUS = "EXITO" el N° de Orden de Flow
	$PAGADOR 		= $flowAPI->getPayer(); // El email del pagador

	$transaction = Transaction::find($ORDEN_NUMERO);

	if($FLOW_STATUS == "EXITO") {
		if($transaction and $transaction->status == 'Pendiente' and intval($transaction->amount) == intval($MONTO)):

			$transaction->email = $PAGADOR;
			$transaction->flow_number = $ORDEN_FLOW;
			$transaction->purchase_date = DB::raw('now()');
			$transaction->status = 'Pagado';
			$transaction->save();

			echo $flowAPI->build_response(true);
		else:
			$transaction->status = 'Error';
			$transaction->save();

			echo $flowAPI->build_response(false);
		endif;
	} else {

		if($transaction):
			$transaction->status = 'Rechazado';
			$transaction->save();
		endif;

		echo $flowAPI->build_response(false); // Comercio rechaza la transacción
	}

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

Route::any('ipn/notificador', function(){

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