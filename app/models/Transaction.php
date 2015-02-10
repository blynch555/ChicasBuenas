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
                $credit->transaction_id = $this->id;
    			$credit->escort_id = $this->transactionable_id;
    			$credit->type = 'Gold';
    			$credit->purchase_date = $this->purchase_date;
    			$credit->amount = $this->credits;
    			$credit->balance = $this->credits;
    			$credit->save();

                $history = new EscortHistory;
                $history->escort_id = $this->transactionable_id;
                $history->transaction_id = $this->id;
                $history->credit_id = $credit->id;
                $history->description = $this->description;
                $history->credits_total = Escort::find($this->transactionable_id)->creditsTotal();
                $history->credits_gold = $this->credits;
                $history->save();
    		endif;
    	endif;
    }
}
