<?php

class DirectoryContact extends Eloquent{
	protected $table = 'directory_contacts';

	public function sendInvitation(){
		Twilio::message('+569' . $this->phone, $this->name . ' te invitamos a ser parte de nuestro esclusivo set de Escort, registrate GRATIS en http://chicasbuenas.cl/registro');

		$this->contacted = 'Si';
		$this->save();
	}
}
