<?php
class ChicaController extends Controller{
	
	public function getView($city, $slug, $id){
		$escort = Escort::find($id);
		if(!$escort) return App::abort(404);

		return View::make('chicas.profile', [
			'escort' => $escort
		]);
	}

}