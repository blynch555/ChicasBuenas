<?php

class Transaction extends Eloquent{
	protected $table = 'transactions';

	public function transactionable()
    {
        return $this->morphTo();
    }
}
