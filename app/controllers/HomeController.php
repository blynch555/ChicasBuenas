<?php

class HomeController extends BaseController {


	public function getSms($id = 1){
		/* and $contact->contacted!='Si'*/
		$contact = DirectoryContact::find($id);
		if($contact)
			$contact->sendInvitation();

		if(!$contact)
			return 'OK';

		return '<h1>' . $contact->id . '</h1>Enviando mensaje a <b>' . $contact->name . '</b><script>window.location = "' . action('sendSMS', [$id+1]) . '";</script>';
	}

	public function getSmsSilver(){
		$phones = [87144166, 50233618, 50492104, 54369297, 56340306, 56620063, 56819498, 58566799, 66024716, 73236374, 74125796, 77872888, 78495811, 78699240, 79237906, 79293779, 79334747, 81476003, 81548801, 84806935, 84901133, 84904090, 86555572, 86555608, 88823535, 88983003, 98684007];

		foreach($phones as $phone):
			SMS::send('+569' . $phone, 'Publicate en nuestra portal y llega a miles de clientes cada dia, solo ingresa a http://chicasbuenas.cl e ingresa a la seccion Silver');

			echo $phone . " - OK<br>";
		endforeach;
	}

	public function getIndex($city_slug){
		$city = City::whereSlug($city_slug)->first();
		if(!$city) return Redirect::to('/');

		Session::put('city_slug', $city->slug);
		Session::put('city_name', $city->name);

		//$escorts 		= Escort::whereCityIdAndFeaturedAndStatus($city->id, 'Si', 'Publicada')->orderBy(DB::raw('rand()'))->get();
		$escorts 		= Escort::whereCityIdAndStatus($city->id, 'Publicada')->orderBy(DB::raw('rand()'))->get();

		return View::make('home.index', [
			'city_slug' => $city_slug,
			'escorts' => $escorts
		]);
	}

	public function getVip($city_slug){
		$city = City::whereSlug($city_slug)->first();
		if(!$city) return Redirect::to('/');

		Session::put('city_slug', $city->slug);
		Session::put('city_name', $city->name);

		$escorts_f 		= Escort::whereCityIdAndCategoryAndFeaturedAndStatus($city->id, 'VIP', 'Si', 'Publicada')->orderBy('featured_end')->orderBy(DB::raw('rand()'))->get();
		$escorts 		= Escort::whereCityIdAndCategoryAndFeaturedAndStatus($city->id, 'VIP', 'No', 'Publicada')->orderBy(DB::raw('rand()'))->get();

		return View::make('home.vip', [
			'escorts_f' => $escorts_f,
			'escorts' => $escorts,
		]);
	}

	public function getPremium($city_slug){
		$city = City::whereSlug($city_slug)->first();
		if(!$city) return Redirect::to('/');

		Session::put('city_slug', $city->slug);
		Session::put('city_name', $city->name);

		$escorts_f 		= Escort::whereCityIdAndCategoryAndFeaturedAndStatus($city->id, 'Premium', 'Si', 'Publicada')->orderBy('featured_end')->orderBy(DB::raw('rand()'))->get();
		$escorts 		= Escort::whereCityIdAndCategoryAndFeaturedAndStatus($city->id, 'Premium', 'No', 'Publicada')->orderBy(DB::raw('rand()'))->get();

		return View::make('home.premium', [
			'escorts_f' => $escorts_f,
			'escorts' => $escorts,
		]);
	}

	public function getGold($city_slug){
		$city = City::whereSlug($city_slug)->first();
		if(!$city) return Redirect::to('/');

		Session::put('city_slug', $city->slug);
		Session::put('city_name', $city->name);

		$escorts_f 		= Escort::whereCityIdAndCategoryAndFeaturedAndStatus($city->id, 'Gold', 'Si', 'Publicada')->orderBy('featured_end')->orderBy(DB::raw('rand()'))->get();
		$escorts 		= Escort::whereCityIdAndCategoryAndFeaturedAndStatus($city->id, 'Gold', 'No', 'Publicada')->orderBy(DB::raw('rand()'))->get();

		return View::make('home.gold', [
			'escorts_f' => $escorts_f,
			'escorts' => $escorts,
		]);
	}

	public function getFantasias($city_slug){
		$city = City::whereSlug($city_slug)->first();
		if(!$city) return Redirect::to('/');

		Session::put('city_slug', $city->slug);
		Session::put('city_name', $city->name);

		$escorts_f 		= Escort::whereCityIdAndCategoryAndFeaturedAndStatus($city->id, 'Fantasia', 'Si', 'Publicada')->orderBy('featured_end')->orderBy(DB::raw('rand()'))->get();
		$escorts 		= Escort::whereCityIdAndCategoryAndFeaturedAndStatus($city->id, 'Fantasia', 'No', 'Publicada')->orderBy(DB::raw('rand()'))->get();

		return View::make('home.fantasias', [
			'escorts_f' => $escorts_f,
			'escorts' => $escorts,
		]);
	}

	public function getMasajistas($city_slug){
		$city = City::whereSlug($city_slug)->first();
		if(!$city) return Redirect::to('/');

		Session::put('city_slug', $city->slug);
		Session::put('city_name', $city->name);

		$escorts_f 		= Escort::whereCityIdAndCategoryAndFeaturedAndStatus($city->id, 'Masajista', 'Si', 'Publicada')->orderBy('featured_end')->orderBy(DB::raw('rand()'))->get();
		$escorts 		= Escort::whereCityIdAndCategoryAndFeaturedAndStatus($city->id, 'Masajista', 'No', 'Publicada')->orderBy(DB::raw('rand()'))->get();

		return View::make('home.masajistas', [
			'escorts_f' => $escorts_f,
			'escorts' => $escorts,
		]);
	}

	public function getMaduritas($city_slug){
		$city = City::whereSlug($city_slug)->first();
		if(!$city) return Redirect::to('/');

		Session::put('city_slug', $city->slug);
		Session::put('city_name', $city->name);

		$escorts_f 		= Escort::whereCityIdAndCategoryAndFeaturedAndStatus($city->id, 'Madurita', 'Si', 'Publicada')->orderBy('featured_end')->orderBy(DB::raw('rand()'))->get();
		$escorts 		= Escort::whereCityIdAndCategoryAndFeaturedAndStatus($city->id, 'Madurita', 'No', 'Publicada')->orderBy(DB::raw('rand()'))->get();

		return View::make('home.maduritas', [
			'escorts_f' => $escorts_f,
			'escorts' => $escorts,
		]);
	}

	public function getTravestis($city_slug){
		$city = City::whereSlug($city_slug)->first();
		if(!$city) return Redirect::to('/');

		Session::put('city_slug', $city->slug);
		Session::put('city_name', $city->name);

		$escorts_f 		= Escort::whereCityIdAndCategoryAndFeaturedAndStatus($city->id, 'Travesti', 'Si', 'Publicada')->orderBy('featured_end')->orderBy(DB::raw('rand()'))->get();
		$escorts 		= Escort::whereCityIdAndCategoryAndFeaturedAndStatus($city->id, 'Travesti', 'No', 'Publicada')->orderBy(DB::raw('rand()'))->get();

		return View::make('home.travestis', [
			'escorts_f' => $escorts_f,
			'escorts' => $escorts,
		]);
	}

	public function getSilver($city_slug){
		$city = City::whereSlug($city_slug)->first();
		if(!$city) return Redirect::to('/');

		Session::put('city_slug', $city->slug);
		Session::put('city_name', $city->name);

		$silvers = Silver::whereStatus('Publicada')->orderBy('purchase_date', 'desc')->paginate();

		return View::make('home.silver', [
			'silvers' => $silvers
		]);
	}

	

}
