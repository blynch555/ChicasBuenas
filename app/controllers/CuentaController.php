<?php
class CuentaController extends Controller{
	
	public function getIndex(){
		
	}


	public function getEntrar(){
		return View::make('account.login');
	}

	public function postEntrar(){
		$credentials = [
			'username' => Input::get('username'),
			'password' => Input::get('password'),
			'status' => 'Activo'
		];

		if(Auth::attempt($credentials))
			return Redirect::intended('/');

		return Redirect::back()
			->withInput()
			->with('login_fail', true);
	}

	public function postRegistro(){
		echo "aki01<br>";
		$rules = [
			'type' 		=> 'required|in:user,escort,agency',
			'name' 		=> 'required',
			'email' 	=> 'required|email|unique:users',
			'username' 	=> 'required|unique:users',
			'password' 	=> 'required|confirmed'
		];

		echo "aki02<br>";

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

		/*$validation = Validator::make(Input::all(), $rules, $messages);
		if($validation->fails())
			return Redirect::back()
				->withInput()
				->withErrors($validation)
				->with('register_fail', true);*/

		echo "aki1<br>";

		$profile = 'Usuario';
		$profile = (Input::get('type') == 'escort') ? 'Escort' : $profile;
		$profile = (Input::get('type') == 'agency') ? 'Agencia' : $profile;
		echo "aki2<br>";

		$user = new User;
		$user->name = Input::get('name');
		$user->username = Input::get('username');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->validation = md5(date('YmdHis'));
		$user->profile = $profile;
		$user->status = 'Validación';
		$user->save();

		echo "aki3<br>";

		$user->sendActivationMail();
		echo "aki4<br>";

		return Redirect::action('CuentaController@getRegistrado');

	}

	public function getRegistrado(){
		return View::make('account.registered');
	}

	public function getActivar($code){
		$user = User::whereValidation($code)->first();
		if($user):
			$user->status = 'Activo';
			$user->save();

			return 'cuenta activada';
		else:
			return 'código no válido';
		endif;
	}

	public function getSalir(){
		Auth::logout();

		return Redirect::intended('/');		
	}
}