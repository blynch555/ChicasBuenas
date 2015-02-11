<?php

class Transaction extends Eloquent{
	protected $table = 'transactions';

	public function transactionable()
    {
        return $this->morphTo();
    }

    public function redirectToPay(){
        $orden_compra   = $this->id;
        $monto          = $this->amount;
        $concepto       = $this->description;
        $tipo_comision  = Config::get('kpf.tasa_default');

        $flowAPI = new kpf\flowAPI;
        try {
            $flow_pack = $flowAPI->new_order($orden_compra, $monto, $concepto, $tipo_comision);

            return 
                Form::open(['url' => Config::get('kpf.url_pago'), 'id'=>'frmPago']).Form::hidden('parameters', $flow_pack).Form::close().
                HTML::script('vendor/jquery/jquery-1.11.2.min.js') .'<script>$("#frmPago").submit();</script>';
        } catch (Exception $e) {
            return $e;
        }
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

    public function publishSiver(){
        echo '$this->status == "Pagada": ' . $this->status."<br>";
        if($this->status == 'Pagada'):
            $silver = $this->transactionable;
            echo "silver: <pre>" . print_r($silver->toArray(), 1)."</pre><br>";

            if($silver and $silver->status != 'Publicada'):
                $silver->status = 'Publicada';
                $silver->purchase_date = DB::raw('now');
                $silver->purchase_email = $this->email;
                $silver->save();
            endif;
        endif;
    }
}
