<?php
class SMS{
	public static function send($number, $message){
		echo "key: " .Config::get('services.nexmo.key') . "<br>";
		echo "secret: " .Config::get('services.nexmo.secret') . "<br>";
		echo "number: " .Config::get('services.nexmo.number') . "<br>";
		echo "detino: " . $number . "<br>";
		echo "mensaje: " . $message . "<br>";

		$sms = new \Nexmo\Message(Config::get('services.nexmo.key'), Config::get('services.nexmo.secret'));
    	$sms->sendText($number, Config::get('services.nexmo.number'), $message);
	}
}