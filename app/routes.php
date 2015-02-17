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

//Route::get('sms/{id}', ['as' => 'sendSMS', 'uses' => 'HomeController@getSms']);


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






Route::get('load2', function(){
	$data = [
		['name' => 'Lili', 'phone' => '97848082', 'contacted' => 'No'],
		['name' => 'Tati', 'phone' => '58320057', 'contacted' => 'No'],
		['name' => 'Irina', 'phone' => '79512536', 'contacted' => 'No'],
		['name' => 'Maura', 'phone' => '86571884', 'contacted' => 'No'],
		['name' => 'Coral', 'phone' => '61873893', 'contacted' => 'No'],
		['name' => 'Fran Masajes', 'phone' => '87359285', 'contacted' => 'No'],
		['name' => 'Cata', 'phone' => '61306745', 'contacted' => 'No'],
		['name' => 'Elizabeth', 'phone' => '73938128', 'contacted' => 'No'],
		['name' => 'Miel', 'phone' => '75512279', 'contacted' => 'No'],
		['name' => 'Zilvana', 'phone' => '68559249', 'contacted' => 'No'],
		['name' => 'Naty', 'phone' => '85476370', 'contacted' => 'No'],
		['name' => 'Mijhal Masajes', 'phone' => '76360549', 'contacted' => 'No'],
		['name' => 'Kiara', 'phone' => '98920085', 'contacted' => 'No'],
		['name' => 'Masaje Vip', 'phone' => '27858349', 'contacted' => 'No'],
		['name' => 'Jade', 'phone' => '91311315', 'contacted' => 'No'],
		['name' => 'Natalia', 'phone' => '61795877', 'contacted' => 'No'],
		['name' => 'América', 'phone' => '72649342', 'contacted' => 'No'],
		['name' => 'Barbarita', 'phone' => '62252938', 'contacted' => 'No'],
		['name' => 'Dana VIP', 'phone' => '65520686', 'contacted' => 'No'],
		['name' => 'Jessie Vip', 'phone' => '65843362', 'contacted' => 'No'],
		['name' => 'Leila', 'phone' => '76037525', 'contacted' => 'No'],
		['name' => 'Isabella', 'phone' => '86112489', 'contacted' => 'No'],
		['name' => 'Claudia', 'phone' => '59398322', 'contacted' => 'No'],
		['name' => 'Mika', 'phone' => '97684652', 'contacted' => 'No'],
		['name' => 'Carlita', 'phone' => '59937633', 'contacted' => 'No'],
		['name' => 'Aylen', 'phone' => '86213726', 'contacted' => 'No'],
		['name' => 'Caro', 'phone' => '59821542', 'contacted' => 'No'],
		['name' => 'Lucy', 'phone' => '90817432', 'contacted' => 'No'],
		['name' => 'Diana', 'phone' => '74034857', 'contacted' => 'No'],
		['name' => 'Colomba', 'phone' => '63247431', 'contacted' => 'No'],
		['name' => 'Gaby', 'phone' => '99228046', 'contacted' => 'No'],
		['name' => 'Solcito', 'phone' => '95601456', 'contacted' => 'No'],
		['name' => 'Ayelen', 'phone' => '54860189', 'contacted' => 'No'],
		['name' => 'Paulina', 'phone' => '88495310', 'contacted' => 'No'],
		['name' => 'Natasha', 'phone' => '99217993', 'contacted' => 'No'],
		['name' => 'Marlene', 'phone' => '57067241', 'contacted' => 'No'],
		['name' => 'Sofia', 'phone' => '59345478', 'contacted' => 'No'],
		['name' => 'Marisol', 'phone' => '71821670', 'contacted' => 'No'],
		['name' => 'Gabriela', 'phone' => '54470875', 'contacted' => 'No'],
		['name' => 'Abigail', 'phone' => '89245442', 'contacted' => 'No'],
		['name' => 'Chary', 'phone' => '59718942', 'contacted' => 'No'],
		['name' => 'Pareja Hot', 'phone' => '56726953', 'contacted' => 'No'],
		['name' => 'Valentina', 'phone' => '56801300', 'contacted' => 'No'],
		['name' => 'María Jesús', 'phone' => '86215241', 'contacted' => 'No'],
		['name' => 'Rocio', 'phone' => '79626509', 'contacted' => 'No'],
		['name' => 'Francheska', 'phone' => '68559249', 'contacted' => 'No'],
		['name' => 'Briana', 'phone' => '53589006', 'contacted' => 'No'],
		['name' => 'Sara Masajes', 'phone' => '95920054', 'contacted' => 'No'],
		['name' => 'Lucero', 'phone' => '92162408', 'contacted' => 'No'],
		['name' => 'Poly', 'phone' => '82609336', 'contacted' => 'No'],
		['name' => 'Karen', 'phone' => '75990581', 'contacted' => 'No'],
		['name' => 'Afrodita', 'phone' => '91301282', 'contacted' => 'No'],
		['name' => 'Samy', 'phone' => '87298243', 'contacted' => 'No'],
		['name' => 'Carla Masajes', 'phone' => '56419428', 'contacted' => 'No'],
		['name' => 'María Paz', 'phone' => '65059202', 'contacted' => 'No'],
		['name' => 'Colomba Masajes', 'phone' => '95025376', 'contacted' => 'No'],
		['name' => 'Ana Masajes', 'phone' => '66380254', 'contacted' => 'No'],
		['name' => 'Sofia Masajes', 'phone' => '83645707', 'contacted' => 'No'],
		['name' => 'Viviana Masajes', 'phone' => '97914688', 'contacted' => 'No'],
		['name' => 'Josefina Masajes', 'phone' => '56939764', 'contacted' => 'No'],
		['name' => 'Sole Masajes', 'phone' => '67164560', 'contacted' => 'No'],
		['name' => 'Lorena Masajes', 'phone' => '58281505', 'contacted' => 'No'],
		['name' => 'Simona', 'phone' => '58444118', 'contacted' => 'No'],
		['name' => 'Mía masajes', 'phone' => '89785791', 'contacted' => 'No'],
		['name' => 'Josefina VIP', 'phone' => '77706553', 'contacted' => 'No'],
		['name' => 'Masaje Touch', 'phone' => '61307747', 'contacted' => 'No'],
		['name' => 'Paula Masajes', 'phone' => '98522363', 'contacted' => 'No'],
		['name' => 'Paloma Masajes', 'phone' => '86492520', 'contacted' => 'No'],
		['name' => 'Silvana', 'phone' => '52104306', 'contacted' => 'No'],
		['name' => 'Paloma', 'phone' => '58263979', 'contacted' => 'No'],
		['name' => 'Alondra', 'phone' => '72718579', 'contacted' => 'No'],
		['name' => 'Vanesa', 'phone' => '59342551', 'contacted' => 'No'],
		['name' => 'Frangyn', 'phone' => '71558838', 'contacted' => 'No'],
		['name' => 'Antonia', 'phone' => '59293114', 'contacted' => 'No'],
		['name' => 'Katta', 'phone' => '66022120', 'contacted' => 'No'],
		['name' => 'Vane', 'phone' => '76929516', 'contacted' => 'No'],
		['name' => 'Mely', 'phone' => '95745477', 'contacted' => 'No'],
		['name' => 'Lucy Love', 'phone' => '98930041', 'contacted' => 'No'],
		['name' => 'Ada', 'phone' => '93089717', 'contacted' => 'No'],
		['name' => 'Ruby', 'phone' => '78007023', 'contacted' => 'No'],
		['name' => 'Luana', 'phone' => '77004859', 'contacted' => 'No'],
		['name' => 'Letty', 'phone' => '98484930', 'contacted' => 'No'],
		['name' => 'Daiana', 'phone' => '94934018', 'contacted' => 'No'],
		['name' => 'Estrellita', 'phone' => '74106100', 'contacted' => 'No'],
		['name' => 'Flavia', 'phone' => '97046814', 'contacted' => 'No'],
		['name' => 'Josefa', 'phone' => '52319391', 'contacted' => 'No'],
		['name' => 'Sofy', 'phone' => '66108239', 'contacted' => 'No'],
		['name' => 'Tania', 'phone' => '66108239', 'contacted' => 'No'],
		['name' => 'Sofía VIP', 'phone' => '72410774', 'contacted' => 'No'],
		['name' => 'Luna', 'phone' => '77718251', 'contacted' => 'No'],
		['name' => 'Fiorella', 'phone' => '79500868', 'contacted' => 'No'],
		['name' => 'Gina', 'phone' => '92835955', 'contacted' => 'No'],
		['name' => 'Vero', 'phone' => '81821238', 'contacted' => 'No'],
		['name' => 'Katy', 'phone' => '54623175', 'contacted' => 'No'],
		['name' => 'María Angel', 'phone' => '53669250', 'contacted' => 'No'],
		['name' => 'Alison', 'phone' => '58821412', 'contacted' => 'No'],
		['name' => 'Leonor', 'phone' => '90018023', 'contacted' => 'No'],
		['name' => 'Aracelli', 'phone' => '85091631', 'contacted' => 'No'],
		['name' => 'Agustina', 'phone' => '53996107', 'contacted' => 'No'],
		['name' => 'Cristina', 'phone' => '90095816', 'contacted' => 'No'],
		['name' => 'Sol ', 'phone' => '94765898', 'contacted' => 'No'],
		['name' => 'Lunita', 'phone' => '90837516', 'contacted' => 'No'],
		['name' => 'Gazal', 'phone' => '86349630', 'contacted' => 'No'],
		['name' => 'Cristal', 'phone' => '53164618', 'contacted' => 'No'],
		['name' => 'Vicky', 'phone' => '75303640', 'contacted' => 'No'],
		['name' => 'Cele', 'phone' => '66240340', 'contacted' => 'No'],
		['name' => 'Paulette', 'phone' => '58902763', 'contacted' => 'No'],
		['name' => 'Naomi', 'phone' => '98694274', 'contacted' => 'No'],
		['name' => 'Thais', 'phone' => '76938702', 'contacted' => 'No'],
		['name' => 'Camila', 'phone' => '94199156', 'contacted' => 'No'],
		['name' => 'Maca', 'phone' => '72080639', 'contacted' => 'No'],
		['name' => 'María Ignacia', 'phone' => '90837516', 'contacted' => 'No'],
		['name' => 'Alexia', 'phone' => '53633400', 'contacted' => 'No'],
		['name' => 'Kitty', 'phone' => '90837516', 'contacted' => 'No'],
		['name' => 'Nicole', 'phone' => '57227161', 'contacted' => 'No'],
		['name' => 'Alondra', 'phone' => '62692839', 'contacted' => 'No'],
		['name' => 'Julieta', 'phone' => '56944559', 'contacted' => 'No'],
		['name' => 'Rocio Vip', 'phone' => '66108239', 'contacted' => 'No'],
		['name' => 'Pamelita', 'phone' => '77521035', 'contacted' => 'No'],
		['name' => 'Masajes', 'phone' => '57001541', 'contacted' => 'No'],
		['name' => 'Vivian', 'phone' => '54664956', 'contacted' => 'No'],
		['name' => 'Maia', 'phone' => '78248672', 'contacted' => 'No'],
		['name' => 'Paula Masajes', 'phone' => '71594033', 'contacted' => 'No'],
		['name' => 'Rose', 'phone' => '87238864', 'contacted' => 'No'],
		['name' => 'Alina Masajes', 'phone' => '56558795', 'contacted' => 'No'],
		['name' => 'Dominga', 'phone' => '90837516', 'contacted' => 'No'],
		['name' => 'Jessica', 'phone' => '75268224', 'contacted' => 'No'],
		['name' => 'Tammy', 'phone' => '82940369', 'contacted' => 'No'],
		['name' => 'Romina', 'phone' => '75305633', 'contacted' => 'No'],
		['name' => 'Carrie', 'phone' => '90048928', 'contacted' => 'No'],
		['name' => 'Martina', 'phone' => '79369372', 'contacted' => 'No'],
		['name' => 'Carola', 'phone' => '79839562', 'contacted' => 'No'],
		['name' => 'Cristina', 'phone' => '76938076', 'contacted' => 'No'],
		['name' => 'Mane', 'phone' => '59501431', 'contacted' => 'No'],
		['name' => 'Diana', 'phone' => '54470472', 'contacted' => 'No'],
		['name' => 'Tamara', 'phone' => '87474372', 'contacted' => 'No'],
		['name' => 'Maria Angeles', 'phone' => '52531525', 'contacted' => 'No'],
		['name' => 'Antonia Masajes', 'phone' => '52320095', 'contacted' => 'No'],
		['name' => 'Lissette', 'phone' => '98761607', 'contacted' => 'No'],
		['name' => 'Luz', 'phone' => '76617838', 'contacted' => 'No'],
		['name' => 'Cleo', 'phone' => '58220427', 'contacted' => 'No'],
		['name' => 'Anto', 'phone' => '67033766', 'contacted' => 'No'],
		['name' => 'Brisa', 'phone' => '52531525', 'contacted' => 'No'],
		['name' => 'Jennifer', 'phone' => '56529395', 'contacted' => 'No'],
		['name' => 'Aline', 'phone' => '66017572', 'contacted' => 'No'],
		['name' => 'Pascal', 'phone' => '57011001', 'contacted' => 'No'],
		['name' => 'Cinthia', 'phone' => '74789055', 'contacted' => 'No'],
		['name' => 'Melizza', 'phone' => '59378552', 'contacted' => 'No'],
		['name' => 'Ingrid', 'phone' => '72627971', 'contacted' => 'No'],
		['name' => 'Fer', 'phone' => '52531525', 'contacted' => 'No'],
		['name' => 'Anahi', 'phone' => '97377365', 'contacted' => 'No'],
		['name' => 'Milu', 'phone' => '77630916', 'contacted' => 'No'],
		['name' => 'Emilia', 'phone' => '53429164', 'contacted' => 'No'],
		['name' => 'Florencia', 'phone' => '84521684', 'contacted' => 'No'],
		['name' => 'Dayane', 'phone' => '90759633', 'contacted' => 'No'],
		['name' => 'Giselle', 'phone' => '66719590', 'contacted' => 'No'],
		['name' => 'Mara', 'phone' => '52531525', 'contacted' => 'No'],
		['name' => 'Mia', 'phone' => '52531525', 'contacted' => 'No'],
		['name' => 'Naty', 'phone' => '61166512', 'contacted' => 'No'],
		['name' => 'Geraldine', 'phone' => '88760900', 'contacted' => 'No'],
		['name' => 'Poly', 'phone' => '53909880', 'contacted' => 'No'],
		['name' => 'Ariana', 'phone' => '90419730', 'contacted' => 'No'],
		['name' => 'Natalia', 'phone' => '56613483', 'contacted' => 'No'],
		['name' => 'Stefy', 'phone' => '92322136', 'contacted' => 'No'],
		['name' => 'Flo', 'phone' => '56834259', 'contacted' => 'No'],
		['name' => 'Lady', 'phone' => '62455912', 'contacted' => 'No'],
		['name' => 'Sabri', 'phone' => '52531525', 'contacted' => 'No'],
		['name' => 'Estefany Noa', 'phone' => '67676498', 'contacted' => 'No'],
		['name' => 'Carolina', 'phone' => '50378652', 'contacted' => 'No'],
		['name' => 'Caroline', 'phone' => '93077348', 'contacted' => 'No'],
		['name' => 'Yuby', 'phone' => '53909880', 'contacted' => 'No'],
		['name' => 'Angie', 'phone' => '76945047', 'contacted' => 'No'],
		['name' => 'Paz', 'phone' => '56612865', 'contacted' => 'No'],
		['name' => 'Fernanda', 'phone' => '53695346', 'contacted' => 'No'],
		['name' => 'Claudia', 'phone' => '56614448', 'contacted' => 'No'],
		['name' => 'Vanesa', 'phone' => '52531525', 'contacted' => 'No'],
		['name' => 'Sara', 'phone' => '52531525', 'contacted' => 'No'],
		['name' => 'Melany', 'phone' => '83916073', 'contacted' => 'No'],
		['name' => 'Zuara', 'phone' => '82742170', 'contacted' => 'No'],
		['name' => 'Agustina', 'phone' => '94809260', 'contacted' => 'No'],
		['name' => 'Nina', 'phone' => '56833699', 'contacted' => 'No'],
		['name' => 'Michelle Masajes', 'phone' => '56865867', 'contacted' => 'No'],
		['name' => 'Dulce Sharit', 'phone' => '83780898', 'contacted' => 'No'],
		['name' => 'Cotita', 'phone' => '52531525', 'contacted' => 'No'],
		['name' => 'Maria Ignacia', 'phone' => '72950738', 'contacted' => 'No'],
		['name' => 'Estrella', 'phone' => '67521687', 'contacted' => 'No'],
		['name' => 'Jhendelyn ', 'phone' => '62300390', 'contacted' => 'No'],
		['name' => 'Nayra', 'phone' => '98021992', 'contacted' => 'No'],
		['name' => 'Nicoleta', 'phone' => '73144591', 'contacted' => 'No'],
		['name' => 'Victoria', 'phone' => '81482136', 'contacted' => 'No'],
		['name' => 'Isabella', 'phone' => '85794229', 'contacted' => 'No'],
		['name' => 'Feñita', 'phone' => '67657401', 'contacted' => 'No'],
		['name' => 'Laura', 'phone' => '52531525', 'contacted' => 'No'],
		['name' => 'Amalia', 'phone' => '78336094', 'contacted' => 'No'],
		['name' => 'Tati', 'phone' => '52531525', 'contacted' => 'No'],
		['name' => 'Franchesca', 'phone' => '59334640', 'contacted' => 'No'],
		['name' => 'Ivanna', 'phone' => '56004848', 'contacted' => 'No'],
		['name' => 'Catalina Vip', 'phone' => '59334640', 'contacted' => 'No'],
		['name' => 'Sofy', 'phone' => '59334640', 'contacted' => 'No'],
		['name' => 'Barby', 'phone' => '98067549', 'contacted' => 'No'],
		['name' => 'Gisella', 'phone' => '52531525', 'contacted' => 'No'],
		['name' => 'Mariana', 'phone' => '83494951', 'contacted' => 'No'],
		['name' => 'Sofie', 'phone' => '88154329', 'contacted' => 'No'],
		['name' => 'Tatiana', 'phone' => '57262298', 'contacted' => 'No'],
		['name' => 'Cata', 'phone' => '99200932', 'contacted' => 'No'],
		['name' => 'Luana', 'phone' => '85418936', 'contacted' => 'No'],
		['name' => 'Chanel', 'phone' => '68116880', 'contacted' => 'No'],
		['name' => 'Samy', 'phone' => '56918964', 'contacted' => 'No'],
		['name' => 'Venus', 'phone' => '98377221', 'contacted' => 'No'],
		['name' => 'Estrellita', 'phone' => '74732370', 'contacted' => 'No'],
		['name' => 'Carry', 'phone' => '91668899', 'contacted' => 'No'],
		['name' => 'Milly ', 'phone' => '51146610', 'contacted' => 'No'],
		['name' => 'Elizabeth', 'phone' => '71831721', 'contacted' => 'No'],
		['name' => 'Alina', 'phone' => '62170258', 'contacted' => 'No'],
		['name' => 'Dulce', 'phone' => '81723001', 'contacted' => 'No'],
		['name' => 'Leonor', 'phone' => '56659294', 'contacted' => 'No'],
		['name' => 'Muñeca', 'phone' => '62324273', 'contacted' => 'No'],
		['name' => 'Antonia', 'phone' => '65816376', 'contacted' => 'No'],
		['name' => 'Nicole Masajes', 'phone' => '85866560', 'contacted' => 'No'],
		['name' => 'Francia', 'phone' => '81427098', 'contacted' => 'No'],
		['name' => 'Amaya', 'phone' => '73195800', 'contacted' => 'No'],
		['name' => 'Valeria', 'phone' => '93077327', 'contacted' => 'No'],
		['name' => 'Maria Belén', 'phone' => '84330473', 'contacted' => 'No'],
		['name' => 'Melany Vip', 'phone' => '66833658', 'contacted' => 'No'],
		['name' => 'Analí', 'phone' => '53562262', 'contacted' => 'No'],
		['name' => 'Tania', 'phone' => '88322137', 'contacted' => 'No'],
		['name' => 'Analu', 'phone' => '53098948', 'contacted' => 'No'],
		['name' => 'Rachel', 'phone' => '93830256', 'contacted' => 'No'],
		['name' => 'Consuelo', 'phone' => '65188899', 'contacted' => 'No'],
		['name' => 'Giuliana', 'phone' => '50991371', 'contacted' => 'No'],
		['name' => 'Aranza', 'phone' => '61644031', 'contacted' => 'No'],
		['name' => 'Javiera', 'phone' => '84716879', 'contacted' => 'No'],
		['name' => 'Paris', 'phone' => '96921873', 'contacted' => 'No'],
		['name' => 'Karina', 'phone' => '79216288', 'contacted' => 'No'],
		['name' => 'Alexandra', 'phone' => '91543720', 'contacted' => 'No'],
		['name' => 'Neira', 'phone' => '75231995', 'contacted' => 'No'],
		['name' => 'Danisa', 'phone' => '89842895', 'contacted' => 'No'],
		['name' => 'Caramelo', 'phone' => '54688248', 'contacted' => 'No'],
		['name' => 'Angie Masajes', 'phone' => '54559453', 'contacted' => 'No'],
		['name' => 'Yorka', 'phone' => '58578220', 'contacted' => 'No'],
		['name' => 'Daniela', 'phone' => '63690219', 'contacted' => 'No'],
		['name' => 'Melany', 'phone' => '67571895', 'contacted' => 'No'],
		['name' => 'Cata', 'phone' => '74075422', 'contacted' => 'No'],
		['name' => 'Maca', 'phone' => '82676033', 'contacted' => 'No'],
		['name' => 'Mia', 'phone' => '96536032', 'contacted' => 'No'],
		['name' => 'Eva', 'phone' => '99656802', 'contacted' => 'No'],
		['name' => 'Kamila', 'phone' => '94708771', 'contacted' => 'No'],
		['name' => 'Constanza', 'phone' => '56717385', 'contacted' => 'No'],
		['name' => 'Vane Love ', 'phone' => '67963430', 'contacted' => 'No'],
		['name' => 'Cote', 'phone' => '67959553', 'contacted' => 'No'],
		['name' => 'Charlize', 'phone' => '91776212', 'contacted' => 'No'],
		['name' => 'Francisca ', 'phone' => '79603459', 'contacted' => 'No'],
		['name' => 'Mayda Laysa Masajes', 'phone' => '76283073', 'contacted' => 'No'],
		['name' => 'Sara Masajes', 'phone' => '96405474', 'contacted' => 'No'],
		['name' => 'Pamela Masajes', 'phone' => '97955819', 'contacted' => 'No'],
		['name' => 'Grace Masajes', 'phone' => '68169418', 'contacted' => 'No'],
		['name' => 'Esmeralda', 'phone' => '90528961', 'contacted' => 'No'],
		['name' => 'Brenda', 'phone' => '82646211', 'contacted' => 'No'],
		['name' => 'Sofia', 'phone' => '93917163', 'contacted' => 'No'],
		['name' => 'Marina', 'phone' => '86769995', 'contacted' => 'No'],
		['name' => 'Margot', 'phone' => '50424177', 'contacted' => 'No'],
		['name' => 'Brissa', 'phone' => '56404744', 'contacted' => 'No'],
		['name' => 'Maria Jose', 'phone' => '71958565', 'contacted' => 'No'],
		['name' => 'Mayrita', 'phone' => '65576180', 'contacted' => 'No'],
		['name' => 'Aurora', 'phone' => '51053951', 'contacted' => 'No'],
		['name' => 'Caliente', 'phone' => '90954627', 'contacted' => 'No'],
		['name' => 'Cecilia', 'phone' => '82119780', 'contacted' => 'No'],
		['name' => 'Samantha', 'phone' => '93356879', 'contacted' => 'No'],
		['name' => 'Mery', 'phone' => '64097936', 'contacted' => 'No'],
		['name' => 'Juguetonas', 'phone' => '62828717', 'contacted' => 'No'],
		['name' => 'Golozas', 'phone' => '63152552', 'contacted' => 'No'],
		['name' => 'Andrea Dooley', 'phone' => '74040078', 'contacted' => 'No'],
		['name' => 'Luciana Vip', 'phone' => '78689270', 'contacted' => 'No'],
		['name' => 'Isidora', 'phone' => '52063672', 'contacted' => 'No'],
		['name' => 'Rosario', 'phone' => '84340555', 'contacted' => 'No'],
		['name' => 'Fernanda', 'phone' => '93587451', 'contacted' => 'No'],
		['name' => 'Thaliana', 'phone' => '71425088', 'contacted' => 'No'],
		['name' => 'Vania', 'phone' => '90524778', 'contacted' => 'No'],
		['name' => 'Alessandra Blonde⇥', 'phone' => '73709745', 'contacted' => 'No'],
		['name' => 'Scarleth', 'phone' => '65121567', 'contacted' => 'No'],
		['name' => 'Britney', 'phone' => '95519003', 'contacted' => 'No'],
		['name' => 'Rouse', 'phone' => '71558748', 'contacted' => 'No'],
		['name' => 'Isabella Top', 'phone' => '59591050', 'contacted' => 'No'],
		['name' => 'Barby', 'phone' => '79440426', 'contacted' => 'No'],
		['name' => 'Kelly Logan', 'phone' => '96805528', 'contacted' => 'No'],
		['name' => 'Tania Porn', 'phone' => '97736902', 'contacted' => 'No']
	];

	foreach($data as $info){
		$contact = new DirectoryContact;
		$contact->name = $info['name'];
		$contact->phone = $info['phone'];
		$contact->contacted = $info['contacted'];
		$contact->save();

		echo "Guardado: ".$info['name']."<br>";
	}
});


