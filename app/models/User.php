<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function sendActivationMail(){
		$user = $this;

		$data = [
			'name' => $this->name,
			'code' => $this->validation
		];


		Mail::queue('emails.validation', $data, function($message) use ($user){
			$message
				->to($user->email, $user->name)
				->subject('Bienvenid@ a ChicasBuena.cl!');
		});

		
	}

	public function isAdmin(){return $this->profile == 'Administrador';}
	public function isUser(){return $this->profile == 'Usuario';}
	public function isEscort(){return $this->profile == 'Escort';}
	public function isAgency(){return $this->profile == 'Agencia';}
}
