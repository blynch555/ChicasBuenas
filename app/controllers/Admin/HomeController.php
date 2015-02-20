<?php
namespace Admin;
use \Controller, \View;
use \Escort, \User;

class HomeController extends Controller{
	
	public function getIndex(){
		return View::make('admin.index');
	}

	public function getUsers(){
		$users = User::all();

		return View::make('admin.users.index', [
			'users' => $users
		]);
	}

	public function getEscorts(){
		$escorts = Escort::all();

		return View::make('admin.escorts.index', [
			'escorts' => $escorts
		]);
	}

	public function getSendMessage(){
		echo "??";
		return Input::all();

		$email = Input::get('email');
		$subject = Input::get('subject');
		$body = Input::get('body');

		Mail::queue('emails.email', ['body' => $body], function($message) use ($email, $subject){
			$message
				->to($email)
				->subject($subject);
		});
	}

}