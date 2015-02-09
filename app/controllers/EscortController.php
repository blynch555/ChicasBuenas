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

	public function postGuardarCaracteristicas(){

		$escort = Auth::user()->escort;
		if($escort):

			$age = Carbon::parse(Input::get('birthday'))->diffInYears(Carbon::now());

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
			$escort->price = Input::get('price');
			$escort->nationality_id = Input::get('nationality_id');

			$category = $escort->category;
			if($age >= 40):
				$category = 'Madurita';
			else:
				$category = ($escort->price < 45000) ? 'Gold' : $category;
				$category = ($escort->price >= 45000 and $escort->price < 70000) ? 'Premium' : $category;
				$category = ($escort->price >= 70000) ? 'VIP' : $category;
			endif;
			$escort->category = $category;

			$escort->appearances()->sync(Input::get('appearance', []));

			$escort->save();

			return ['success' => true, 'age' => $age];
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
		return View::make('escort.creditos');
	}


	public function postUploadPhoto(){
		$error_messages = array(
	        1 => 'La fotografía es demasiada grande, intente con una más pequeña',
	        2 => 'La fotografía es demasiada grande, intente con una más pequeña',
	        3 => 'La fotografía no fue cargada, por favor intente nuevamente',
	        4 => 'No ha seleccionado una foto a subir',
	        6 => 'Error interno: Missing a temporary folder',
	        7 => 'Error interno: Failed to write file to disk',
	        8 => 'Error interno: A PHP extension stopped the file upload',
	        'post_max_size' => 'La fotografía es demasiada grande, intente con una más pequeña',
	        'max_file_size' => 'La fotografía es demasiada grande, intente con una más pequeña',
	        'min_file_size' => 'La fotografía es demasiada pequeña, intente con una más grande',
	        'accept_file_types' => 'Solo se permiten imágenes (jpg o png)',
	        'max_number_of_files' => 'Solo puede subir hasta 10 fotografías simultaneamente',
	        'max_width' => 'La imagen es demasiada ancha',
	        'min_width' => 'La imagen es demasiada angosta',
	        'max_height' => 'La imagen es demasiada alta',
	        'min_height' => 'La imagen es demasiada baja',
	        'abort' => 'La carga fue cancelada',
	        'image_resize' => 'No se logro redimensionar la fotografía'
	    );


		$uh = new UploadHandler([
			'script_url' => 'uploads/',
			'upload_dir' => 'uploads/',
			'upload_url' => asset('uploads') . '/',
			'accept_file_types' => '/\.(jpe?g|png)$/i',
		], true, $error_messages);

		$file = isset($uh->response['files'][0]) ? $uh->response['files'][0] : null;
		if($file):
			
			$ephoto = new EscortPhoto;
			$ephoto->escort_id = Auth::user()->escort->id;
			$ephoto->filename = $file->name;
			$ephoto->in_aws = 'No';
			$ephoto->save();


			/*$pathLocal = 'uploads/' . $file->name;
			$pathAws = 'photos/' . $file->name;

			$files = [
				['origen' => $pathLocal, 'destino' => $pathAws],
				['origen' => str_replace('uploads/', 'uploads/large/', $pathLocal), 'destino' => str_replace('.jpeg', '_large.jpeg', $pathAws)],
				['origen' => str_replace('uploads/', 'uploads/medium/', $pathLocal), 'destino' => str_replace('.jpeg', '_medium.jpeg', $pathAws)],
				['origen' => str_replace('uploads/', 'uploads/small/', $pathLocal), 'destino' => str_replace('.jpeg', '_small.jpeg', $pathAws)],
				['origen' => str_replace('uploads/', 'uploads/top/', $pathLocal), 'destino' => str_replace('.jpeg', '_top.jpeg', $pathAws)],
				['origen' => str_replace('uploads/', 'uploads/thumbnail/', $pathLocal), 'destino' => str_replace('.jpeg', '_thumb.jpeg', $pathAws)]
			];

			foreach($files as $fileToAws):
				$pathInLocal = $fileToAws['origen'];
				$pathToAws = $fileToAws['destino'];

				if(File::exists($pathInLocal)):
					Queue::push(function($job) use ($pathInLocal, $pathToAws){
					    $s3 = AWS::get('s3');
						$bucket = 'media.chicasbuenas.cl';

						$result = $s3->putObject(array(
						    'Bucket'     => $bucket,
						    'Key'        => $pathToAws,
						    'SourceFile' => $pathInLocal
						));

					    $job->delete();
					});

					File::delete($pathInLocal);
				endif;
			endforeach;
			*/
		endif;

	}
}