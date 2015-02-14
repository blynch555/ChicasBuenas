<!doctype html>
<html lang="{{ trans('site.lang.code') }}">
<head>
	<meta charset="UTF-8">
	<title>{{ trans('site.title') }}</title>
	
	{{ HTML::style('vendor/bootstrap/css/bootstrap.min.css') }}
	{{ HTML::style('vendor/bootstrap/css/bootstrap-theme.min.css') }}
	{{ HTML::style('vendor/ionicons/css/ionicons.min.css') }}
	{{ HTML::style('vendor/font-awesome/css/font-awesome.min.css') }}
	{{ HTML::style('vendor/slick/slick.css') }}
	{{ HTML::style('css/app.css') }}

	@yield('styles')
	<style>
		@if(Auth::check() and Auth::user()->isEscort())
			.slick-prev{display: none !important;}
		@endif
	</style>
</head>
<body>
	<div class="container wraper">

		<header>
			<div class="row">
				<div class="col-sm-3 headerLogo">
					<a href="{{ url('/') }}"><h1>ChicasBuenas.cl</h1></a>
				</div>
				<div class="col-sm-6 headerButtons">
					<div class="btn-group btn-group-justified" role="group" aria-label="...">
						<div class="btn-group" role="group">
							<button type="button" class="btn btnTopMenu btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<i class="ion-ios-location"></i> {{ Session::get('city_name', 'Santiago') }}
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								@foreach(City::getAllCities() as $city)
								<li><a href="{{ $city->url() }}">{{ $city->name }}</a></li>
								@endforeach
							</ul>
						</div>
						<!--<div class="btn-group" role="group">
							<a href="{{ url('tienda') }}" class="btn btnTopMenu btn-default">
								<i class="ion-bag"></i> Tienda Online
							</a>
						</div>-->
						<!--<div class="btn-group" role="group">
							<a href="{{ url('foros') }}" class="btn btnTopMenu btn-default">
								<i class="ion-chatboxes"></i> Foros
							</a>
						</div>
						-->
					</div>
				</div>
				<div class="col-sm-3 headerUserActions">
					<div class="btn-group pull-right" role="group" aria-label="...">
						
						@include('global.user_menu')
											
					</div>
				</div>
			</div>

			<section class="row">
				@if(Auth::check() and Auth::user()->isEscort())
				<div class="col-sm-1">
					<div id="dvPublicaMe">
						<a href="javascript:;" id="linkPublicaMe" class="img-rounded linkShowEscortProfile">
							{{ HTML::image('img/publicame.png') }}
						</a>
					</div>
				</div>
				@endif
				<div class="@if(Auth::check() and Auth::user()->isEscort()) col-sm-11 @else col-sm-12 @endif">
					@if($publicaMe->count() > 0)
					<div id="headerListSection">
						@foreach($publicaMe as $pEscort)
						<div>
							<a href="{{ $pEscort->url() }}"  data-escort-id="{{ $pEscort->id }}" class="img-rounded linkShowEscortProfile">
								{{ HTML::image($pEscort->photoUrl(), $pEscort->name) }}
							</a>
						</div>
						@endforeach
					</div>
					@else
						{{ HTML::image('img/bannerPublicaMe.png'); }}
					@endif
				</div>
			</section>

			<nav class="navbar navbar-inverse">
				<div class="container-fluid">

				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li @if(Route::is('home')) class="active" @endif><a href="{{ route('home', Session::get('city_slug', 'santiago')) }}"><i class="ion-star"></i> Destacadas</a></li>
						<li @if(Route::is('home_vip')) class="active" @endif><a href="{{ route('home_vip', Session::get('city_slug', 'santiago')) }}">VIP</a></li>
						<li @if(Route::is('home_premium')) class="active" @endif><a href="{{ route('home_premium', Session::get('city_slug', 'santiago')) }}">Premium</a></li>
						<li @if(Route::is('home_gold')) class="active" @endif><a href="{{ route('home_gold', Session::get('city_slug', 'santiago')) }}">Gold</a></li>
						<li @if(Route::is('home_fantasias')) class="active" @endif><a href="{{ route('home_fantasias', Session::get('city_slug', 'santiago')) }}">Fantasías</a></li>
						<li @if(Route::is('home_masajistas')) class="active" @endif><a href="{{ route('home_masajistas', Session::get('city_slug', 'santiago')) }}">Masajistas</a></li>
						<li @if(Route::is('home_maduritas')) class="active" @endif><a href="{{ route('home_maduritas', Session::get('city_slug', 'santiago')) }}">Maduritas</a></li>
						<li @if(Route::is('home_travestis')) class="active" @endif><a href="{{ route('home_travestis', Session::get('city_slug', 'santiago')) }}">Travestis</a></li>
						<li @if(Route::is('home_silver')) class="active" @endif><a href="{{ route('home_silver', Session::get('city_slug', 'santiago')) }}">Silver</a></li>
					</ul>
					<ul class="nav navbar-nav pull-right">
						<li class="hidden-lg"><a href="{{ url('buscar') }}"><i class="ion-search"></i></a></li>
						<li class="visible-lg"><a href="{{ url('buscar') }}"><i class="ion-search"></i> Buscar</a></li>
					</ul>
				</div>
			</nav>		
		</header>


		@yield('content')
			
		@include('global.footer')

	</div>

	<script>
		var HOME = '{{ url('/') }}';
	</script>

	{{ HTML::script('vendor/jquery/jquery-1.11.2.min.js') }}
	{{ HTML::script('vendor/bootstrap/js/bootstrap.min.js') }}
	{{ HTML::script('vendor/slick/slick.min.js') }}
	{{ HTML::script('vendor/sharrre/jquery.sharrre.min.js'); }}
	{{ HTML::script('js/app.js') }}

	@yield('scripts')
</body>
</html>
