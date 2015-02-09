<?php

Route::get('/', function(){
	if(App::environment('production'))
		return View::make('register');

	return Redirect::to('santiago/destacadas');
});

Route::get('pago', function(){
	return '<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>
	<body>
	<form method="post" action="/pago">
	Orden N°: <input type="text" name="orden" id="orden" /><br />
	Monto : <input type="text" name="monto" id="monto" /><br />
	Descripcion : <input type="text" name="concepto" id="concepto" /><br />
	<button id="btnAceptar" type="submit">Aceptar</button>
	</form>
	</body>
	</html>';
});

Route::post('pago', function(){
	$date = new DateTime();
	$timestamp = $date->format('YmdHis');

	$orden_compra = Input::get('orden');
	$monto = Input::get('monto');
	$concepto = Input::get('concepto');
	$tipo_comision = Config::get('kpf.tasa_default');

	$flowAPI = new kpf\flowAPI;

	try {
		$flow_pack = $flowAPI->new_order($orden_compra, $monto, $concepto, $tipo_comision);
	} catch (Exception $e) {
		return $e;
		header('location: error.php');
	}

	return '<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
Confirme su orden antes de proceder al pago via Flow<br /><br />
Orden N°: '. $orden_compra .'<br />
Monto: '. $monto .'<br />
Descripción: '.$concepto.'<br />
<form method="post" action="'.Config::get('kpf.url_pago').'">
<input type="hidden" name="parameters" value="'.$flow_pack.'" />
<button type="submit">Pagar en Flow</button>
</form>
</body>
</html>';
});

Route::any('kpf/fracaso', function(){
	File::put('fracaso.txt', print_r(Input::all(), 1));
});
Route::any('kpf/exito', function(){
	File::put('exito.txt', print_r(Input::all(), 1));
});
Route::any('kpf/confirma', function(){
	File::put('confirma.txt', print_r(Input::all(), 1));
	
	$flowAPI = new kpf\flowAPI;

	try {
		$flowAPI ->read_confirm();
	} catch (Exception $e) {
		echo $flowAPI ->build_response(false);
		return;
	}

	//Recupera Los valores de la Orden
	$FLOW_STATUS 	= $flowAPI->getStatus();  //El resultado de la transacción (EXITO o FRACASO)
	$ORDEN_NUMERO 	= $flowAPI->getOrderNumber(); // N° Orden del Comercio
	$MONTO 			= $flowAPI->getAmount(); // Monto de la transacción
	$ORDEN_FLOW 	= $flowAPI->getFlowNumber(); // Si $FLOW_STATUS = "EXITO" el N° de Orden de Flow
	$PAGADOR 		= $flowAPI->getPayer(); // El email del pagador

	if($FLOW_STATUS == "EXITO") {
		echo $flowAPI->build_response(true); // Comercio acepta la transacción
	} else {
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