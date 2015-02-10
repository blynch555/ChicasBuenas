<?php

class EscortHistory extends Eloquent{
	protected $table = 'escorts_history';

	public function escort(){return $this->belongsTo('Escort');}
	public function transaction(){return $this->belongsTo('Transaction');}
	public function credit(){return $this->belongsTo('EscortCredit', 'credit_id');}
}
