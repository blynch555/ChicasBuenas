<?php

class HomeController extends BaseController {

	public function getIndex($city_slug){
		$city = City::whereSlug($city_slug)->first();
		if(!$city) return Redirect::to('/');

		Session::put('city_slug', $city_slug);

		$escorts_vip 		= Escort::whereCityIdAndCategoryAndFeatured($city->id, 'VIP', 'Si')->orderBy('featured_end')->get();
		$escorts_premium 	= Escort::whereCityIdAndCategoryAndFeatured($city->id, 'Premium', 'Si')->orderBy('featured_end')->get();
		$escorts_gold 		= Escort::whereCityIdAndCategoryAndFeatured($city->id, 'Gold', 'Si')->orderBy('featured_end')->get();
		$escorts_fantasias 	= Escort::whereCityIdAndCategoryAndFeatured($city->id, 'Fantasia', 'Si')->orderBy('featured_end')->get();
		$escorts_masajistas	= Escort::whereCityIdAndCategoryAndFeatured($city->id, 'Masajista', 'Si')->orderBy('featured_end')->get();
		$escorts_maduritas 	= Escort::whereCityIdAndCategoryAndFeatured($city->id, 'Madurita', 'Si')->orderBy('featured_end')->get();
		$escorts_travestis	= Escort::whereCityIdAndCategoryAndFeatured($city->id, 'Travesti', 'Si')->orderBy('featured_end')->get();

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

		Session::put('city_slug', $city_slug);

		$escorts_f 		= Escort::whereCityIdAndCategoryAndFeatured($city->id, 'VIP', 'Si')->orderBy('featured_end')->orderBy(DB::raw('rand()'))->get();
		$escorts 		= Escort::whereCityIdAndCategoryAndFeatured($city->id, 'VIP', 'No')->orderBy(DB::raw('rand()'))->get();

		return View::make('home.vip', [
			'escorts_f' => $escorts_f,
			'escorts' => $escorts,
		]);
	}

	public function getPremium($city_slug){
		$city = City::whereSlug($city_slug)->first();
		if(!$city) return Redirect::to('/');

		Session::put('city_slug', $city_slug);

		$escorts_f 		= Escort::whereCityIdAndCategoryAndFeatured($city->id, 'VIP', 'Si')->orderBy('featured_end')->orderBy(DB::raw('rand()'))->get();
		$escorts 		= Escort::whereCityIdAndCategoryAndFeatured($city->id, 'VIP', 'No')->orderBy(DB::raw('rand()'))->get();

		return View::make('home.premium', [
			'escorts_f' => $escorts_f,
			'escorts' => $escorts,
		]);
	}

	public function getGold($city_slug){
		$city = City::whereSlug($city_slug)->first();
		if(!$city) return Redirect::to('/');

		Session::put('city_slug', $city_slug);

		$escorts_f 		= Escort::whereCityIdAndCategoryAndFeatured($city->id, 'Gold', 'Si')->orderBy('featured_end')->orderBy(DB::raw('rand()'))->get();
		$escorts 		= Escort::whereCityIdAndCategoryAndFeatured($city->id, 'Gold', 'No')->orderBy(DB::raw('rand()'))->get();

		return View::make('home.gold', [
			'escorts_f' => $escorts_f,
			'escorts' => $escorts,
		]);
	}

	public function getFantasias($city_slug){
		$city = City::whereSlug($city_slug)->first();
		if(!$city) return Redirect::to('/');

		Session::put('city_slug', $city_slug);

		$escorts_f 		= Escort::whereCityIdAndCategoryAndFeatured($city->id, 'Fantasia', 'Si')->orderBy('featured_end')->orderBy(DB::raw('rand()'))->get();
		$escorts 		= Escort::whereCityIdAndCategoryAndFeatured($city->id, 'Fantasia', 'No')->orderBy(DB::raw('rand()'))->get();

		return View::make('home.fantasias', [
			'escorts_f' => $escorts_f,
			'escorts' => $escorts,
		]);
	}

	public function getMasajistas($city_slug){
		$city = City::whereSlug($city_slug)->first();
		if(!$city) return Redirect::to('/');

		Session::put('city_slug', $city_slug);

		$escorts_f 		= Escort::whereCityIdAndCategoryAndFeatured($city->id, 'Masajista', 'Si')->orderBy('featured_end')->orderBy(DB::raw('rand()'))->get();
		$escorts 		= Escort::whereCityIdAndCategoryAndFeatured($city->id, 'Masajista', 'No')->orderBy(DB::raw('rand()'))->get();

		return View::make('home.masajistas', [
			'escorts_f' => $escorts_f,
			'escorts' => $escorts,
		]);
	}

	public function getMaduritas($city_slug){
		$city = City::whereSlug($city_slug)->first();
		if(!$city) return Redirect::to('/');

		Session::put('city_slug', $city_slug);

		$escorts_f 		= Escort::whereCityIdAndCategoryAndFeatured($city->id, 'Madurita', 'Si')->orderBy('featured_end')->orderBy(DB::raw('rand()'))->get();
		$escorts 		= Escort::whereCityIdAndCategoryAndFeatured($city->id, 'Madurita', 'No')->orderBy(DB::raw('rand()'))->get();

		return View::make('home.maduritas', [
			'escorts_f' => $escorts_f,
			'escorts' => $escorts,
		]);
	}

	public function getTravestis($city_slug){
		$city = City::whereSlug($city_slug)->first();
		if(!$city) return Redirect::to('/');

		Session::put('city_slug', $city_slug);

		$escorts_f 		= Escort::whereCityIdAndCategoryAndFeatured($city->id, 'Travesti', 'Si')->orderBy('featured_end')->orderBy(DB::raw('rand()'))->get();
		$escorts 		= Escort::whereCityIdAndCategoryAndFeatured($city->id, 'Travesti', 'No')->orderBy(DB::raw('rand()'))->get();

		return View::make('home.travestis', [
			'escorts_f' => $escorts_f,
			'escorts' => $escorts,
		]);
	}

	public function getSilver($city_slug){
		$city = City::whereSlug($city_slug)->first();
		if(!$city) return Redirect::to('/');

		Session::put('city_slug', $city_slug);

		$silvers = Silver::whereStatus('Publicada')->orderBy('purchase_date', 'desc')->paginate();

		return View::make('home.silver', [
			'silvers' => $silvers
		]);
	}

}
