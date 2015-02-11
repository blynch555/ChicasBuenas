<?php

class Escort extends Eloquent{
	protected $table = 'escorts';

	public function photo(){
		$photo = $this->photos->first();
		if($photo):
			return $photo->thumbUrl();
		else:
			return asset('img/avatar.jpg');
		endif;
	}

	public function transactions(){return $this->morphMany('Transaction', 'transactionable')->whereStatus('Pagada');}

	public function city(){return $this->belongsTo('City');}
	public function district(){return $this->belongsTo('District');}
	public function url(){return route('escortView', [Str::slug($this->district->city->name), Str::slug($this->name), $this->id]);}
	public function slug(){return Str::slug($this->name) . ',' . $this->id;}

	public function photos(){return $this->hasMany('EscortPhoto');}
	public function credits(){return $this->hasMany('EscortCredit')->where('balance', '>', 0);}
	public function creditsGold(){return $this->hasMany('EscortCredit')->whereType('Gold')->where('balance', '>', 0);}
	public function creditsSilver(){return $this->hasMany('EscortCredit')->whereType('Silver')->where('balance', '>', 0);}
	public function histories(){return $this->hasMany('EscortHistory')->orderBy('created_at', 'desc');}

	public function creditsTotal(){return $this->credits->sum('balance');}
	public function creditsGoldTotal(){return $this->creditsGold->sum('balance');}
	public function creditsSilverTotal(){return $this->creditsSilver->sum('balance');}


	public function appearances(){return $this->belongsToMany('Appearance', 'escorts_appearances');}
	public function services(){return $this->belongsToMany('Service', 'escorts_services');}

	public function heigth(){return number_format($this->heigth, 2);}
	public function birthday(){return date('d/m/Y', strtotime($this->birthday));}
}
