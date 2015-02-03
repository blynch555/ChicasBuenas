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
								<i class="ion-ios-location"></i> Santiago
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								@foreach(City::getAllCities() as $city)
								<li><a href="{{ $city->url() }}">{{ $city->name }}</a></li>
								@endforeach
							</ul>
						</div>
						<div class="btn-group" role="group">
							<a href="{{ url('tienda') }}" class="btn btnTopMenu btn-default">
								<i class="ion-bag"></i> Tienda Online
							</a>
						</div>
						<div class="btn-group" role="group">
							<a href="{{ url('foros') }}" class="btn btnTopMenu btn-default">
								<i class="ion-chatboxes"></i> Foros
							</a>
						</div>
					</div>
				</div>
				<div class="col-sm-3 headerUserActions">
					<div class="btn-group pull-right" role="group" aria-label="...">
						
						@include('global.user_menu')
											
					</div>
				</div>
			</div>

			<section class="row">
				<div class="col-sm-12">
					<div id="headerListSection">
						@for($i=0;$i<20;$i++)
						<div>
							<a href="{{ url('chicas/milena,123') }}"  data-escort-id="{{ $i }}" class="img-rounded linkShowEscortProfile">
								{{ HTML::image('img/photo_top.png') }}
							</a>
						</div>
						@endfor
					</div>
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
						<li class="active"><a href="#"><i class="ion-star"></i> Destacadas</a></li>
						<li><a href="{{ url('chicas-vip') }}">VIP</a></li>
						<li><a href="{{ url('chicas-premium') }}">Premium</a></li>
						<li><a href="{{ url('chicas-gold') }}">Gold</a></li>
						<li><a href="{{ url('fantasias') }}">Fantasías</a></li>
						<li><a href="{{ url('masajistas') }}">Masajistas</a></li>
						<li><a href="{{ url('maduritas') }}">Maduritas</a></li>
						<li><a href="{{ url('travestis') }}">Travestis</a></li>
						<li><a href="{{ url('publicaciones-silver') }}">Silver</a></li>
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

	{{ HTML::script('vendor/jquery/jquery-1.11.2.min.js') }}
	{{ HTML::script('vendor/bootstrap/js/bootstrap.min.js') }}
	{{ HTML::script('vendor/slick/slick.min.js') }}
	{{ HTML::script('js/app.js') }}
</body>
</html>
