<!DOCTYPE html>
<html lang="{{ trans('site.lang.code') }}">
<head>
	<meta charset="UTF-8">
	<title>@yield('title', trans('site.title'))</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="@yield('description', trans('site.meta.description'))">
	<meta name="keywords" content="{{ trans('site.meta.keywords') }}">

	<meta property="fb:app_id" content="430700113754492">
	<meta content="@chicasbuenascl" name="twitter:site" />
	<meta content="summary" name="twitter:card" />
	<meta content="@yield('title', trans('site.title'))" name="twitter:title" />
	<meta content="@yield('description', trans('site.meta.description'))" name="twitter:description" />
	<meta content="@yield('image', asset('img/fb_logo.png'))" name="twitter:image:src" />
    <meta content="ChicasBuenas.cl" property="og:site_name" />
    <meta content="object" property="og:type" />
    <meta content="@yield('image', asset('img/fb_logo.png'))" property="og:image" />
    <meta content="@yield('title', trans('site.title'))" property="og:title" />
    <meta content="{{ URL::current() }}" property="og:url" />
    <meta content="@yield('description', trans('site.meta.description'))" property="og:description" />
	
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

				@if($publicaMe->count() > 0)
				<div class="@if(Auth::check() and Auth::user()->isEscort()) col-sm-11 @else col-sm-12 @endif">
					@if($publicaMe->count() > 0)
					<div id="headerListSection">
						@foreach($publicaMe as $publicame)
						<div>
							<a href="{{ $publicame->escort->url() }}"  data-escort-id="{{ $publicame->escort->id }}" class="img-rounded linkShowEscortProfile">
								{{ HTML::image($publicame->photo->smallUrl(), $publicame->escort->name) }}
							</a>
						</div>
						@endforeach
					</div>
					@else
						<a href="javascript:;" id="linkPublicaMeBanner">{{ HTML::image('img/bannerPublicaMe.png', 'PublicaMe!', ['style'=>'margin-top: 34px;']); }}</a>
					@endif
				</div>
				@elseif(Auth::check() and Auth::user()->isEscort())
				<div class="col-sm-11">
					<a href="javascript:;" id="linkPublicaMeBanner">{{ HTML::image('img/bannerPublicaMe.png', 'PublicaMe!', ['style'=>'margin-top: 34px;']); }}</a>
				</div>
				@endif
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

	@if(Auth::check() and Auth::user()->isEscort())
	<div class="modal fade" id="dlgPublicaMe">
		{{Form::open(['action'=>'EscortController@postPublicaMe', 'id'=>'frmPublicaMe'])}}
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title lead">¡Haz que te vean cientos de personas!!</h4>
				</div>
				<div class="modal-body">
					<p class="lead">Elige tu mejor foto y la mostraremos a los cientos de visitantes que recibimos día a día.</p>

					<div class="row">
						<?php $i=0; $photoId = ''; ?>
						@foreach(Auth::user()->escort->photos as $photo)
						<div class="col-sm-2">
							<a href="#" class="thumbnail publicameSelectPhoto {{ ($i==0) ? 'active' : ''; }}" data-photo-id="{{ $photo->id }}">
								{{ HTML::image($photo->largeUrl()); }}
							</a>
						</div>
						<?php if($i==0){ $photoId = $photo->id; }?>
						<?php $i++;?>
						@endforeach
					</div>

					<p class="lead">Tu saldo es de: $ {{ number_format(Auth::user()->escort->creditsTotal(), 0, ',', '.') }} créditos</p>
					@if(Auth::user()->escort->creditsTotal() < 100)
					<div class="alert alert-danger">
						<p class="lead">No tienes saldo suficiente para publicar</p>
						{{ HTML::linkAction('EscortController@getCreditos', 'Recargar Ahora', null, ['class'=>'btn btn-primary']); }}
					</div>
					@endif

					<small>Coste del servicio – 100 créditos que se descontarán de tu cuenta.</small>
				</div>
				<div class="modal-footer">
					{{ Form::hidden('publicame_photo_id', $photoId, ['id'=>'publicame_photo_id']); }}

					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
					<button type="button" id="btnPublicaMe" class="btn btn-primary" @if(Auth::user()->escort->creditsTotal() < 100) disabled="disabled" @endif>PublicaMe Ya!</button>
				</div>
			</div>
		</div>
		{{ Form::close() }}
	</div>
	@endif

	{{ HTML::script('vendor/jquery/jquery-1.11.2.min.js') }}
	{{ HTML::script('vendor/bootstrap/js/bootstrap.min.js') }}
	{{ HTML::script('vendor/slick/slick.min.js') }}
	{{ HTML::script('vendor/share/share.min.js'); }}
	{{ HTML::script('js/app.js') }}

	@yield('scripts')

	<script>
		@if(Session::has('publicaMe'))
			$(function(){
			@if(Session::get('publicaMe') == 'ok')
				alert('Tu foto ha sido publicada en la sección PublicaMe!');
			@else
				alert('Tu foto no ha sido posible publicarla, valida que tienes saldo suficiente!');
			@endif
			});
		@endif
	</script>

	@if(!App::environment('local'))
	<!-- Google Analytics -->
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-53578919-4', 'auto');
		ga('send', 'pageview');
	</script>
	@endif
</body>
</html>
