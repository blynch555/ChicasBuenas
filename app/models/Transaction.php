<?php

class Transaction extends Eloquent{
	protected $table = 'transactions';

	public function transactionable()
    {
        return $this->morphTo();
    }


    public function traspaseToCredit(){
    	if($this->status == 'Pagada'):
    		$credit = EscortCredit::whereTransactionId($this->id)->first();
    		if(!$credit):
    			$credit = new EscortCredit;
    			$credit->escort_id = $this->transactionable_id;
    			$credit->type = 'Gold';
    			$credit->purchase_date = $this->purchase_date;
    			$credit->amount = $this->credits;
    			$credit->balance = $this->credits;
    			$credit->save();

    			echo "traspasando transacción id: " . $this->id . "<br>";
    		endif;
    	endif;
    }
}
