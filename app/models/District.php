<?php

class District extends Eloquent{
	protected $table = 'districts';

	public function city(){return $this->belongsTo('City');}
}