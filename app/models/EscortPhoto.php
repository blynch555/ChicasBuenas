<?php

class EscortPhoto extends Eloquent{
	protected $table = 'escorts_photos';

	public function originalUrl(){return ($this->in_aws == 'Si') ? Media::url('photos/' . $this->filename) : asset('uploads/' . $this->filename);}
	public function largeUrl(){
		return ($this->in_aws == 'Si') ? str_replace('.jpeg', '_large.jpeg', $this->originalUrl()) : str_replace('uploads/', 'uploads/large/', $this->originalUrl());
	}
	public function mediumUrl(){
		return ($this->in_aws == 'Si') ? str_replace('.jpeg', '_medium.jpeg', $this->originalUrl()) : str_replace('uploads/', 'uploads/medium/', $this->originalUrl());
	}
	public function smallUrl(){
		return ($this->in_aws == 'Si') ? str_replace('.jpeg', '_small.jpeg', $this->originalUrl()) : str_replace('uploads/', 'uploads/small/', $this->originalUrl());
	}
	public function topUrl(){
		return ($this->in_aws == 'Si') ? str_replace('.jpeg', '_top.jpeg', $this->originalUrl()) : str_replace('uploads/', 'uploads/top/', $this->originalUrl());
	}
	public function thumbUrl(){
		return ($this->in_aws == 'Si') ? str_replace('.jpeg', '_thumb.jpeg', $this->originalUrl()) : str_replace('uploads/', 'uploads/thumbnail/', $this->originalUrl());
	}
}
