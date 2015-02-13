<?php

class SilverController extends Controller{
	
	public function postPublicar(){
		
		$title = Input::get('title');
		$details = Input::get('details');
		$phone = Input::get('phone');
		
		$file_filename = $this->uploadPhoto();

		$silver = new Silver;
		$silver->title = $title;
		$silver->details = $details;
		$silver->filename = $file_filename;
		$silver->in_aws = 'No';
		$silver->phone = $phone;
		$silver->hash = md5(date('YmdHis') . rand(1, 9999999));
		$silver->status = 'Borrador';
		$silver->save();

		return Redirect::action('SilverController@getPublicar', [$silver->hash]);
	}

	public function getPublicar($hash){
		$silver = Silver::whereHash($hash)->first();
		if(!$silver) return App::abort(404);

		return View::make('silver.edit', [
			'silver' => $silver
		]);
	}

	public function postActualizar(){
		$hash = Input::get('hash');
		$silver = Silver::whereHash($hash)->first();
		if(!$silver) return App::abort(404);

		$file_filename = $this->uploadPhoto();
		if($file_filename != ''):
			$silver->deletePhoto();
			$silver->filename = $file_filename;
		endif;

		$silver->title = Input::get('title');
		$silver->details = Input::get('details');
		$silver->in_aws = 'No';
		$silver->phone = Input::get('phone');
		$silver->save();

		return Redirect::action('SilverController@getPublicar', [$silver->hash]);
	}


	private function uploadPhoto(){
		$file_filename = '';

		$sizes = [
			'large' 	=> ['w' => 450, 'h' => 667],
            'medium' 	=> ['w' => 200, 'h' => 267]
		];

		$photo = Input::file('photo');
		if($photo and $photo->isValid()):
			$filename = md5(date('YmdHis') . rand(0, 999999));
			if($photo->move('uploads', $filename)):

				$filenameOriginal = $filename . '_original.jpeg';
				$img = Image::make('uploads/' . $filename)->orientate()->save('uploads/' . $filenameOriginal);
				File::delete('uploads/' . $filename);

				if(Image::make('uploads/' . $filenameOriginal)->width() < Image::make('uploads/' . $filenameOriginal)->height()):
					$img = Image::make('uploads/' . $filenameOriginal)->resize($sizes['large']['w'], 	$sizes['large']['h'])->save('uploads/' . $filename . '_large.jpeg');
					$img = Image::make('uploads/' . $filenameOriginal)->resize($sizes['medium']['w'], 	$sizes['medium']['h'])->save('uploads/' . $filename . '_medium.jpeg');
				else:
					$img = Image::make('uploads/' . $filenameOriginal)->resize($sizes['large']['h'], 	$sizes['large']['w'])->save('uploads/' . $filename . '_large.jpeg');
					$img = Image::make('uploads/' . $filenameOriginal)->resize($sizes['medium']['h'], 	$sizes['medium']['w'])->save('uploads/' . $filename . '_medium.jpeg');
				endif;

				File::delete('uploads/' . $filenameOriginal);

				$file_filename = $filename . '.jpeg';
			endif;
		endif;

		return $file_filename;
	}

	public function postPagar(){
		$hash = Input::get('hash');
		$silver = Silver::whereHash($hash)->first();
		if(!$silver) return App::abort(404);

		if(!$silver->transaction):
			$transaction = new Transaction;
			$transaction->request_date = DB::raw('now()');
			$transaction->type = 'Silver';
			$transaction->description = 'Publicacion Silver';
			$transaction->amount = 500;
			$transaction->status = 'Pendiente';
			$transaction->save();

			$silver->transaction()->save($transaction);

			return $transaction->redirectToPay();
		else:
			if($silver->transaction->status != 'Pagada'):
				$silver->transaction->status = 'Pendiente';
				$silver->transaction->save();
				
				return $silver->transaction->redirectToPay();
			endif;
			return 'Esta compra ya fue pagada!';
		endif;
	}
}