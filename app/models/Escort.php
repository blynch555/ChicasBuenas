<?php

class Escort extends Eloquent{
	protected $table = 'escorts';

	public function district(){return $this->belongsTo('District');}
}
