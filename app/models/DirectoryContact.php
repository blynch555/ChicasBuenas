<?php

class DirectoryContact extends Eloquent{
	protected $table = 'directory_contacts';

	public function sendInvitation(){
		SMS::send('+569' . $this->phone, 'Te invitamos a ser una ChicaBuena (Escort) y te regalamos 1.000 en creditos para publicarte, solo registrate en http://chicasbuenas.cl');
		
		$this->contacted = 'Si';
		$this->save();
	}
}
