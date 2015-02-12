<?php

class HomeController extends BaseController {

	public function getIndex($city_slug){
		$city = City::whereSlug($city_slug)->first();
		if(!$city) return Redirect::to('/');

		Session::put('city_slug', $city->slug);
		Session::put('city_name', $city->name);

		$escorts_vip 		= Escort::whereCityIdAndCategoryAndFeaturedAndStatus($city->id, 'VIP', 'Si', 'Publicada')->orderBy('featured_end')->get();
		$escorts_premium 	= Escort::whereCityIdAndCategoryAndFeaturedAndStatus($city->id, 'Premium', 'Si', 'Publicada')->orderBy('featured_end')->get();
		$escorts_gold 		= Escort::whereCityIdAndCategoryAndFeaturedAndStatus($city->id, 'Gold', 'Si', 'Publicada')->orderBy('featured_end')->get();
		$escorts_fantasias 	= Escort::whereCityIdAndCategoryAndFeaturedAndStatus($city->id, 'Fantasia', 'Si', 'Publicada')->orderBy('featured_end')->get();
		$escorts_masajistas	= Escort::whereCityIdAndCategoryAndFeaturedAndStatus($city->id, 'Masajista', 'Si', 'Publicada')->orderBy('featured_end')->get();
		$escorts_maduritas 	= Escort::whereCityIdAndCategoryAndFeaturedAndStatus($city->id, 'Madurita', 'Si', 'Publicada')->orderBy('featured_end')->get();
		$escorts_travestis	= Escort::whereCityIdAndCategoryAndFeaturedAndStatus($city->id, 'Travesti', 'Si', 'Publicada')->orderBy('featured_end')->get();

		return View::make('home.index', [
			'city_slug' => $city_slug,
			'escorts_vip' => $escorts_vip,
			'escorts_premium' => $escorts_premium,
			'escorts_gold' => $escorts_gold,
			'escorts_fantasias' => $escorts_fantasias,
			'escorts_masajistas' => $escorts_masajistas,
			'escorts_maduritas' => $escorts_maduritas,
			'escorts_travestis' => $escorts_travestis,
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
