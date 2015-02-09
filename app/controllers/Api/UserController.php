<?php
namespace Api;

use \Controller, \View;
use \User;

class UserController extends Controller{
	
	public function index(){
		return User::all();
	}

	public function show($id){
		return User::find($id);
	}

	public function destroy($id){
		$user = User::find($id);
		if($user)
			$user->delete();
	}

}