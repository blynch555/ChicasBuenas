<?php

class Publicame extends Eloquent{
	protected $table = 'publicame';

	public function escort(){return $this->belongsTo('Escort');}
	public function photo(){return $this->belongsTo('EscortPhoto', 'photo_id');}
}
