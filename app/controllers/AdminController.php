<?php
class AdminController extends \Controller{
	
	public function getUsers(){
		$users = User::orderBy('name')->get();

		return View::make('admin.users.index', [
			'users' => $users
		]);
	}

}