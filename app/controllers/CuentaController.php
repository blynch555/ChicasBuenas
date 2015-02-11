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

		if(Auth::attempt($credentials))
			return Redirect::intended('cuenta');

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
			'password' 	=> 'required|confirmed'
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
			'password.confirmed' => 'debes confirmar tu contraseña'
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
			$escort->status = 'Pendiente Certificación';
			$escort->save();
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