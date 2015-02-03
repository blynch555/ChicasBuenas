<?php

class City extends Eloquent{
	protected $table = 'cities';

	public function url(){
		return '';
	}

	public static function getAllCities(){
		return Cache::rememberForever('cities', function(){
		    return City::all();
		});
	}
}
