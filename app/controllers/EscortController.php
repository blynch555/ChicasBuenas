<?php
class EscortController extends Controller{
	 
	public function __construct(){
		$this->beforeFilter('escort');
	}

	public function getIndex(){
		return Redirect::action('EscortController@getPerfil');
	}

	public function getPerfil(){
		return View::make('escort.perfil', [
			'user' => Auth::user(),
			'escort' => Auth::user()->escort
		]);
	}

	public function postPublicaMe(){
		if(Auth::user()->escort->discountCredit(100, 'Compra servicio PublicaMe')):
			$publicame = new Publicame;
			$publicame->escort_id = Auth::user()->escort->id;
			$publicame->photo_id = Input::get('publicame_photo_id');
			$publicame->city_id = Auth::user()->escort->city_id;
			$publicame->purchase_date = DB::raw('NOW()');
			$publicame->save();

			return Redirect::back()
				->with('publicaMe', 'ok');
		else:
			return Redirect::back()
				->with('publicaMe', 'nok');
		endif;
	}

	public function postRecargarCreditos(){
		$date = new DateTime();
		$timestamp = $date->format('YmdHis');

		$amount = Input::get('amount', 0);
		$price = 0;
		$details = '';

		if($amount == 100){
			$price = 1000;
			$details = 'Recarga de 100 creditos';
		}elseif($amount == 550){
			$price = 5000;
			$details = 'Recarga de 550 creditos - 50 gratis';
		}elseif($amount == 1250){
			$price = 10000;
			$details = 'Recarga de 1.250 creditos - 250 gratis';
		}elseif($amount == 2750){
			$price = 20000;
			$details = 'Recarga de 2.750 creditos - 750 gratis';
		}

		if($amount > 0 and $price > 0):
			$transaction = new Transaction;
			$transaction->request_date = DB::raw('now()');
			$transaction->type = 'Crédito';
			$transaction->description = $details;
			$transaction->credits = $amount;
			$transaction->amount = $price;
			$transaction->status = 'Pendiente';
			$transaction->save();

			Auth::user()->escort->transactions()->save($transaction);

			return $transaction->redirectToPay();
		endif;

		return ['success' => 'false', 'data' => Input::all()];
	}

	public function postGuardarCaracteristicas(){

		$escort = Auth::user()->escort;
		if($escort):

			$age = Carbon::parse(Input::get('birthday'))->diffInYears(Carbon::now());
			$price = Input::get('price');
			$price = is_numeric($price) ? $price : 30000;
			$price = ($price >= 30000) ? $price : 30000;

			$escort->name = Input::get('name');
			$escort->birthday = Input::get('birthday');
			$escort->description = Input::get('description');
			$escort->hourly = Input::get('hourly');
			$escort->hourly_time_begin = Input::get('hourly_time_begin');
			$escort->hourly_time_end = Input::get('hourly_time_end');
			$escort->heigth = Input::get('heigth');
			$escort->weight = Input::get('weight');
			$escort->busts = Input::get('busts');
			$escort->waist = Input::get('waist');
			$escort->hip = Input::get('hip');
			$escort->waxing_id = Input::get('waxing_id');
			$escort->at_apartment = Input::get('at_apartment', 'No');
			$escort->at_hotel = Input::get('at_hotel', 'No');
			$escort->at_home = Input::get('at_home', 'No');
			$escort->at_travel = Input::get('at_travel', 'No');
			$escort->service_type_id = Input::get('service_type_id');
			$escort->price = $price;
			$escort->nationality_id = Input::get('nationality_id');
			$escort->status = 'Publicada';

			$category = Input::get('category');
			if(($category == '' and $age >= 40) or $category == 'Madurita'):
				$category = 'Madurita';
			else:
				if($category == ''):
					$category = ($escort->price < 45000) ? 'Gold' : $category;
					$category = ($escort->price >= 45000 and $escort->price < 70000) ? 'Premium' : $category;
					$category = ($escort->price >= 70000) ? 'VIP' : $category;
				endif;
			endif;
			$escort->category = $category;

			$escort->appearances()->sync(Input::get('appearance', []));

			$escort->save();

			return ['success' => true, 'category' => $category, 'price' => $price];
		else:
			return ['success' => false];
		endif;

	}

	public function postGuardarContacto(){

		$escort = Auth::user()->escort;
		$district = District::find(Input::get('district_id'));

		if($escort and $district):
			$escort->phone = Input::get('phone');
			$escort->district_id = $district->id;
			$escort->city_id = $district->city_id;
			$escort->save();

			return ['success' => true];
		else:
			return ['success' => false];
		endif;
	}

	public function postGuardarServicios(){

		$escort = Auth::user()->escort;
		if($escort):
			$escort->services()->sync(Input::get('service', []));

			return ['success' => true];
		else:
			return ['success' => false];
		endif;
	}

	public function postEliminarFotografia(){
		$name = Input::get('name');
		$photo = EscortPhoto::whereEscortIdAndFilename(Auth::user()->escort->id, $name)->first();
		if($photo):
			if($photo->in_aws == 'Si'):

			else:
				File::delete('uploads/' . $name);
				File::delete('uploads/large/' . $name);
				File::delete('uploads/medium/' . $name);
				File::delete('uploads/small/' . $name);
				File::delete('uploads/top/' . $name);
				File::delete('uploads/thumbnail/' . $name);
			endif;

			$photo->delete();

			return ['success' => true];
		else:
			return ['success' => false];
		endif;
	}

	public function getComentarios(){
		return View::make('escort.comentarios');
	}

	public function getEvaluaciones(){
		return View::make('escort.evaluaciones');
	}

	public function getMeGusta(){
		return View::make('escort.megusta');
	}

	public function getCreditos(){
		return View::make('escort.creditos', [
			'user' => Auth::user(),
			'escort' => Auth::user()->escort
		]);
	}

	public function postSubirFotografias(){

		$sizes = [
			'large' 	=> ['w' => 450, 'h' => 667],
            'medium' 	=> ['w' => 200, 'h' => 267],
            'small' 	=> ['w' => 150, 'h' => 200],
            'top' 		=> ['w' => 100, 'h' => 100],
            'thumb' 	=> ['w' => 80, 	'h' => 80]
		];

		$photo = Input::file('photo');
		$escort = Auth::user()->escort;
		
		if($photo and $photo->isValid()):
			$filename = md5(date('YmdHis') . rand(0, 999999));
			if($photo->move('uploads', $filename)):

				$filenameOriginal = $filename . '_original.jpeg';
				$img = Image::make('uploads/' . $filename)->orientate()->save('uploads/' . $filenameOriginal);
				File::delete('uploads/' . $filename);

				if(Image::make('uploads/' . $filenameOriginal)->width() < Image::make('uploads/' . $filenameOriginal)->height()):
					$img = Image::make('uploads/' . $filenameOriginal)->resize($sizes['large']['w'], 	$sizes['large']['h'])->save('uploads/' . $filename . '_large.jpeg');
					$img = Image::make('uploads/' . $filenameOriginal)->resize($sizes['medium']['w'], 	$sizes['medium']['h'])->save('uploads/' . $filename . '_medium.jpeg');
					$img = Image::make('uploads/' . $filenameOriginal)->resize($sizes['small']['w'], 	$sizes['small']['h'])->save('uploads/' . $filename . '_small.jpeg');
					$img = Image::make('uploads/' . $filenameOriginal)->resize($sizes['top']['w'], 	$sizes['top']['h'])->save('uploads/' . $filename . '_top.jpeg');
					$img = Image::make('uploads/' . $filenameOriginal)->resize($sizes['thumb']['w'], 	$sizes['thumb']['h'])->save('uploads/' . $filename . '_thumb.jpeg');


					$img = Image::make('uploads/' . $filename . '_small.jpeg');
					$img->insert('img/thumbTpl.png');
					$img->text($escort->name, 75, 191, function($font) {
						$font->file(5);
					    $font->color('#fff');
					    $font->align('center');
					});
					$img->save('uploads/' . $filename . '_small.jpeg');

				else:
					$img = Image::make('uploads/' . $filenameOriginal)->resize($sizes['large']['h'], 	$sizes['large']['w'])->save('uploads/' . $filename . '_large.jpeg');
					$img = Image::make('uploads/' . $filenameOriginal)->resize($sizes['medium']['h'], 	$sizes['medium']['w'])->save('uploads/' . $filename . '_medium.jpeg');
					$img = Image::make('uploads/' . $filenameOriginal)->resize($sizes['small']['h'], 	$sizes['small']['w'])->save('uploads/' . $filename . '_small.jpeg');
					$img = Image::make('uploads/' . $filenameOriginal)->resize($sizes['top']['h'], 	$sizes['top']['w'])->save('uploads/' . $filename . '_top.jpeg');
					$img = Image::make('uploads/' . $filenameOriginal)->resize($sizes['thumb']['h'], 	$sizes['thumb']['w'])->save('uploads/' . $filename . '_thumb.jpeg');

					$img = Image::make('uploads/' . $filename . '_small.jpeg');
					$img->fit(150, 200);
					$img->insert('img/thumbTpl.png');
					$img->text($escort->name, 75, 191, function($font) {
						$font->file(5);
					    $font->color('#fff');
					    $font->align('center');
					});
					$img->save('uploads/' . $filename . '_small.jpeg');
				endif;

				$ephoto = new EscortPhoto;
				$ephoto->escort_id = Auth::user()->escort->id;
				$ephoto->filename = $filename . '.jpeg';
				$ephoto->in_aws = 'No';
				$ephoto->save();

				return Redirect::action('EscortController@getPerfil')->with('uploadedPhotos', true);
			else:
				return Redirect::action('EscortController@getPerfil')->with('uploadedPhotos', false);
			endif;
		else:
			return Redirect::action('EscortController@getPerfil')->with('uploadedPhotos', false);
		endif;
	}
}