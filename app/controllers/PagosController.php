<?php
class PagosController extends Controller{
	
	public function getFracaso(){
		$flowAPI = new kpf\flowAPI;
		
		try {
			$flowAPI->read_result();
		} catch (Exception $e) {
			return $e;
		}

		$ORDEN_NUMERO 	= $flowAPI->getOrderNumber();
		$PAGADOR 		= $flowAPI->getPayer();

		$transaction = Transaction::find($ORDEN_NUMERO);
		if($transaction):
			$transaction->email = $PAGADOR;
			$transaction->status = 'Cancelado';
			$transaction->save();

			if($transaction->type == 'Crédito'):
				return Redirect::action('EscortController@getCreditos')->with('recargaFallida', true);
			elseif($transaction->type == 'Silver'):
				$silver = $transaction->transactionable;
				if($silver):
					return Redirect::action('SilverController@getPublicar', [$silver->hash])
						->with('pagoFallido', true);
				else:
					return 'Publicación silver no encontrada!';
				endif;
			endif;
		endif;

		return Redirect::to('/');
	}

	public function getExito(){
		$flowAPI = new kpf\flowAPI;
		
		try {
			$flowAPI->read_result();
		} catch (Exception $e) {
			return $e;
		}

		$ORDEN_NUMERO 	= $flowAPI->getOrderNumber();
		$PAGADOR 		= $flowAPI->getPayer();

		$transaction = Transaction::find($ORDEN_NUMERO);
		if($transaction):
			$transaction->email = $PAGADOR;
			$transaction->save();

			if($transaction->type == 'Crédito'):
				$transaction->traspaseToCredit();
			elseif($transaction->type == 'Silver'):
				$transaction->publishSiver();
			endif;

			if($transaction->type == 'Crédito'):
				return Redirect::action('EscortController@getCreditos')->with('recargaExitosa', true);
			elseif($transaction->type == 'Silver'):
				$silver = $transaction->transactionable;
				if($silver):
					return Redirect::action('SilverController@getPublicar', [$silver->hash])
						->with('pagoExitoso', true);
				else:
					return 'Publicación silver no encontrada!';
				endif;
			endif;
		endif;

		return Redirect::to('/');
	}

	public function getConfirmar(){
		$flowAPI = new kpf\flowAPI;

		try {
			$flowAPI ->read_confirm();
		} catch (Exception $e) {
			echo $flowAPI->build_response(false);
			return;
		}

		//Recupera Los valores de la Orden
		$FLOW_STATUS 	= $flowAPI->getStatus();  //El resultado de la transacción (EXITO o FRACASO)
		$ORDEN_NUMERO 	= $flowAPI->getOrderNumber(); // N° Orden del Comercio
		$MONTO 			= $flowAPI->getAmount(); // Monto de la transacción
		$ORDEN_FLOW 	= $flowAPI->getFlowNumber(); // Si $FLOW_STATUS = "EXITO" el N° de Orden de Flow
		$PAGADOR 		= $flowAPI->getPayer(); // El email del pagador

		$transaction = Transaction::find($ORDEN_NUMERO);

		if($FLOW_STATUS == "EXITO") {
			if($transaction and $transaction->status == 'Pendiente' and intval($transaction->amount) == intval($MONTO)):

				$transaction->email = $PAGADOR;
				$transaction->flow_number = $ORDEN_FLOW;
				$transaction->purchase_date = DB::raw('now()');
				$transaction->status = 'Pagada';
				$transaction->save();

				if($transaction->type == 'Crédito'):
					$transaction->traspaseToCredit();
				elseif($transaction->type == 'Silver'):
					$transaction->publishSiver();
				endif;

				echo $flowAPI->build_response(true);
			else:
				$transaction->status = 'Error';
				$transaction->save();

				echo $flowAPI->build_response(false);
			endif;
		} else {

			if($transaction):
				$transaction->status = 'Rechazado';
				$transaction->save();
			endif;

			echo $flowAPI->build_response(false); // Comercio rechaza la transacción
		}
	}
}