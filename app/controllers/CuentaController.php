<?php
class CuentaController extends Controller{
	
	public function getIndex(){
		$user = Auth::user();

		return View::make('account.index', ['user' => $user]);
	}

	public function getEntrar(){
		return View::make('account.login');
	}

	public function getRegistro(){
		return View::make('account.register');
	}

	public function postEntrar(){
		$credentials = [
			'username' => Input::get('username'),
			'password' => Input::get('password'),
			'status' => 'Activo'
		];

		if(Auth::attempt($credentials)):
			if(Auth::user()->isEscort())
				return Redirect::intended('escort/perfil');
			return Redirect::intended('cuenta');
		endif;

		return Redirect::back()
			->withInput()
			->with('login_fail', true);
	}

	public function postRegistro(){
		
		$rules = [
			'type' 		=> 'required|in:user,escort,agency',
			'name' 		=> 'required',
			'email' 	=> 'required|email|unique:users',
			'username' 	=> 'required|unique:users',
			'password' 	=> 'required|confirmed',
			'accept_terms' => 'accepted',
			'accept_age18' => 'accepted',
		];

		$messages = [
			'type.required' 	=> 'selecciona un tipo de cuenta',
			'type.in' 			=> 'selecciona un tipo de cuenta válido',
			'name.required' 	=> 'ingresa tu nombre (no sera visible)',
			'email.required' 	=> 'ingresa tu email',
			'email.email' 		=> 'ingresa un email válido',
			'email.unique' 		=> 'este email ya se encuentra registrado',
			'username.required' => 'ingresa un nombre de usuario',
			'username.unique' 	=> 'este nombre de usuario ya se encuentra registrado',
			'password.required' => 'ingresa una contraseña',
			'password.confirmed' => 'debes confirmar tu contraseña',
			'accept_terms.accepted' => 'debes aceptar los términos y condiciones, políticas de privacidad y las reglas de ChicasBuenas.cl',
			'accept_age18.accepted' => 'solo se permite el registro de personas mayores a 18 años',
		];

		$validation = Validator::make(Input::all(), $rules, $messages);
		if($validation->fails())
			return Redirect::back()
				->withInput()
				->withErrors($validation)
				->with('register_fail', true);


		$profile = 'Usuario';
		$profile = (Input::get('type') == 'escort') ? 'Escort' : $profile;
		$profile = (Input::get('type') == 'agency') ? 'Agencia' : $profile;

		$user = new User;
		$user->name = Input::get('name');
		$user->username = Input::get('username');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->validation = md5(date('YmdHis'));
		$user->profile = $profile;
		$user->status = 'Validación';
		$user->save();

		if($profile == 'Escort'):
			$escort = new Escort;
			$escort->user_id = $user->id;
			$escort->name = $user->name;
			$escort->birthday = DB::raw('DATE_ADD(now(), INTERVAL -18 YEAR)');
			$escort->category = 'Premium';
			$escort->price = 50000;
			$escort->city_id = 1;
			$escort->district_id = 1;
			$escort->hourly = 'Full Time';
			$escort->heigth = 1.65;
			$escort->weight = 65;
			$escort->busts = 60;
			$escort->busts = 90;
			$escort->waist = 60;
			$escort->hip = 60;
			$escort->waxing_id = 1;
			$escort->at_apartment = 'Si';
			$escort->at_hotel = 'Si';
			$escort->at_home = 'Si';
			$escort->at_travel = 'No';
			$escort->service_type_id = 3;
			$escort->price = 50000;
			$escort->promotion = 'No';
			$escort->nationality_id = 4;
			$escort->featured = 'No';
			$escort->status = 'Borrador';
			$escort->save();

			$credit = new EscortCredit;
			$credit->escort_id = $escort->id;
			$credit->type = 'Silver';
			$credit->duedate = DB::raw('DATE_ADD(now(), INTERVAL 1 MONTH)');
			$credit->balance = 1000;
			$credit->save();

			$history = new EscortHistory;
            $history->escort_id = $escort->id;
            $history->credit_id = $credit->id;
            $history->description = 'Recibe 1.000 créditos GRATIS por registrarse';
            $history->credits_total = 1000;
            $history->credits_silver = 1000;
            $history->save();

		endif;

		$user->sendActivationMail();

		return Redirect::action('CuentaController@getRegistrado');
	}

	public function postActualizar(){
		$rules = ['name' 		=> 'required'];

		$messages = [
			'name.required' 	=> 'ingresa tu nombre (no sera visible)'
		];

		if(Input::get('password') != ''):
			$rules['password'] 	= 'confirmed';
			$messages['password.required'] = 'ingresa una contraseña';
			$messages['password.confirmed'] = 'debes confirmar tu contraseña';
		endif;

		$validation = Validator::make(Input::all(), $rules, $messages);
		if($validation->fails())
			return Redirect::back()
				->withInput()
				->withErrors($validation)
				->with('update_fail', true);

		$user = Auth::user();
		$user->name = Input::get('name');
		if(Input::get('password') != ''):
			$user->password = Hash::make(Input::get('password'));
		endif;
		$user->save();

		return Redirect::action('CuentaController@getIndex')
			->with('update_success', true);
	}

	public function getRegistrado(){
		return View::make('account.registered');
	}

	public function getActivar($code){
		$user = User::whereValidationAndStatus($code, 'Validación')->first();
		if($user):
			$user->status = 'Activo';
			$user->save();

			return View::make('account.validated');
		else:
			return View::make('account.notvalidated');
		endif;
	}

	public function getSalir(){
		Auth::logout();

		return Redirect::intended('/');		
	}
}