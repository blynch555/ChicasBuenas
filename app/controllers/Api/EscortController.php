<?php
namespace Api;

use \Controller, \View;
use \Escort;

class EscortController extends Controller{
	
	public function index(){
		return Escort::all();
	}

	public function show($id){
		return Escort::find($id);
	}

	public function destroy($id){
		$user = Escort::find($id);
		if($user)
			$user->delete();
	}

}