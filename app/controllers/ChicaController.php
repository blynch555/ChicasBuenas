<?php
class ChicaController extends Controller{
	
	public function getView($city, $slug, $id){
		return Escort::find($id);
	}

}