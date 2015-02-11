<?php

class Silver extends Eloquent{
	protected $table = 'silvers';

	public function transaction(){return $this->morphOne('Transaction', 'transactionable');}

	public function originalUrl(){return ($this->in_aws == 'Si') ? Media::url('photos/' . $this->filename) : asset('uploads/' . $this->filename);}
	
	public function largeUrl(){
		return str_replace('.jpeg', '_large.jpeg', $this->originalUrl() );
	}
	public function mediumUrl(){
		return str_replace('.jpeg', '_medium.jpeg', $this->originalUrl() );
	}


	public function deletePhoto(){
		if($this->filename != '' and $this->in_aws == 'No'):
			if(File::exists('uploads/' . str_replace('.jpeg', '_large.jpeg', $this->filename))) File::delete('uploads/' . str_replace('.jpeg', '_large.jpeg', $this->filename));
			if(File::exists('uploads/' . str_replace('.jpeg', '_medium.jpeg', $this->filename))) File::delete('uploads/' . str_replace('.jpeg', '_medium.jpeg', $this->filename));
		endif;
	}
}
