<?php
class Utils{
	
	public static function getHeigthList(){
		$data = [];
		for($i=1.5; $i<1.90; $i=$i+0.01):
			$val = self::left($i . '0', 4);
			$data[$val] = $val . ' mts';
		endfor;

		return $data;
	}

	public static function getWeightList(){
		$data = [];
		for($i=45; $i<=120; $i++):
			$data[$i] = $i . ' kg';
		endfor;

		return $data;
	}
	
	public static function getBustsList(){
		$data = [];
		for($i=70; $i<=130; $i++):
			$data[$i] = $i;
		endfor;

		return $data;
	}
	
	public static function getWaistList(){
		$data = [];
		for($i=40; $i<=100; $i++):
			$data[$i] = $i;
		endfor;

		return $data;
	}
	
	public static function getHipList(){
		$data = [];
		for($i=70; $i<=130; $i++):
			$data[$i] = $i;
		endfor;

		return $data;
	}

	public static function getSchedules(){
		$options = [
			'Full Time',
			'Part Time',
			'Lunes a viernes',
			'Lunes a sábado',
			'Lunes a domingo',
			'Sábados y domingos'
		];

		$data = [];
		foreach ($options as $option):
			$data[$option] = $option;
		endforeach;

		return $data;
	}

	public static function getSchedulesTimes(){
		$data = [];
		for($i=0;$i<=23;$i++):
			$val = self::right('0' . $i, 2) .':00';
			$data[$val] = $val;
		endfor;

		return $data;
	}

	public static function getCreditPurchaseOptions(){
		$data = [
			'100' => '100 créditos - $ 1.000',
			'550' => '550 créditos (¡50 gratis!) - $ 5.000',
			'1250' => '1.250 créditos (¡250 gratis!) - $ 10.000',
			'2750' => '2.750 créditos (¡750 gratis!) - $ 20.000',
		];

		return $data;
	}

	public static function left($str, $length) {
		return substr($str, 0, $length);
	}

	public static function right($str, $length) {
		return substr($str, -$length);
	}

}