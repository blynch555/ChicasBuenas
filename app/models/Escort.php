<?php

class Escort extends Eloquent{
	protected $table = 'escorts';

	public function photo(){
		$photo = $this->photos->first();
		if($photo):
			return $photo->smallUrl();
		else:
			return asset('img/avatar.jpg');
		endif;
	}

	public function thumb(){
		$photo = $this->photos->first();
		if($photo):
			return $photo->thumbUrl();
		else:
			return asset('img/avatar.jpg');
		endif;
	}

	public function thumbUrl(){
		return gettype($this->thumb())=='string' ? $this->photo() : $this->photo->thumbUrl();
	}

	public function photoUrl(){
		return gettype($this->photo())=='string' ? $this->photo() : $this->photo->thumbUrl();
	}

	public function age(){return Carbon::parse($this->birthday)->diffInYears(Carbon::now());}

	public function transactions(){return $this->morphMany('Transaction', 'transactionable')->whereStatus('Pagada');}

	public function city(){return $this->belongsTo('City');}
	public function district(){return $this->belongsTo('District');}
	public function url(){return route('escortView', [Str::slug((($this->district) ? $this->district->city->name : 'santiago')), Str::slug($this->name), $this->id]);}
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
	public function waxing(){return $this->belongsTo('Waxing');}
	public function serviceType(){return $this->belongsTo('ServiceType');}

	public function atAt(){
		$str = '';
		$str .= ($this->at_apartment == 'Si') ? (($str!='') ? ', ' : '') . 'En Depto. Propio' : '';
		$str .= ($this->at_home == 'Si') ? (($str!='') ? ', ' : '') . 'A domicilio' : '';
		$str .= ($this->at_hotel == 'Si') ? (($str!='') ? ', ' : '') . 'A Hoteles' : '';
		$str .= ($this->at_travel == 'Si') ? (($str!='') ? ', ' : '') . 'Viajes' : '';

		return $str;
	}

	public function heigth(){return number_format($this->heigth, 2);}
	public function birthday(){return date('d/m/Y', strtotime($this->birthday));}

	public function measures(){return $this->busts . '-' . $this->waist . '-' . $this->hip;}
}
