<?php
class City extends Eloquent{
	protected $table = 'cities';

	public function url(){
		return "http://" . $this->slug . "." . Config::get('site.url_base');
	}

	public static function getAllCities(){
		
		return Cache::rememberForever('cities', function(){
		    return City::orderBy('position')->get();
		});

	}
}