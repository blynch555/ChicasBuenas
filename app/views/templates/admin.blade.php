<!doctype html>
<html lang="{{ trans('site.lang.code') }}">
<head>
	<meta charset="UTF-8">
	<title>Administración</title>
	
	{{ HTML::style('vendor/bootstrap/css/bootstrap.min.css') }}
	{{ HTML::style('vendor/bootstrap/css/bootstrap-theme.min.css') }}
	{{ HTML::style('vendor/ionicons/css/ionicons.min.css') }}
	{{ HTML::style('vendor/font-awesome/css/font-awesome.min.css') }}
</head>
<body>
	<div class="container wraper">

		<header>
			<div class="row">
				<div class="col-sm-3 headerLogo">
					<a href="{{ url('/') }}"><h1>ChicasBuenas.cl</h1></a>
				</div>
				<div class="col-sm-6 headerButtons">
					
				</div>
				<div class="col-sm-3 headerUserActions">
					<div class="btn-group pull-right" role="group" aria-label="...">
						

						@if(Auth::guest())
						<a href="{{ url('cuenta/entrar') }}" class="btn btn-primary btn-lg" style="margin: 14px 5px;">
							<i class="ion-person"></i> Registrarme / Ingresar
						</a>
						@else

							@if(Auth::user()->profile == 'Escort')
							<a href="{{ url('cuenta/creditos') }}" class="btn btn-default" style="margin-top: 15px;">
								<i class="ion-card"></i> 200 créditos
							</a>
							@endif

							<div class="btn-group" role="group">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									{{ HTML::image('img/283216786_small.jpg') }}
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
									@if(Auth::user()->profile == 'Escort')
									<li><a href="{{ url('cuenta/creditos') }}"><i class="ion-person"></i> Perfil</a></li>
									<li><a href="{{ url('cuenta/creditos') }}"><i class="ion-chatbubbles"></i> Comentarios</a></li>
									<li><a href="{{ url('cuenta/creditos') }}"><i class="ion-checkmark-circled"></i> Evaluaciones</a></li>
									<li><a href="{{ url('cuenta/creditos') }}"><i class="ion-thumbsup"></i> Me Gusta</a></li>
									<li><a href="{{ url('cuenta/creditos') }}"><i class="ion-card"></i> Crédito</a></li>
									@endif
									<li><a href="{{ url('cuenta') }}"><i class="ion-gear-a"></i> Mi cuenta</a></li>

									<li><a href="{{ url('cuenta/salir') }}"><i class="ion-log-out"></i> Salir</a></li>
								</ul>
							</div>

						@endif					
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
						<li class="active"><a href="#"><i class="ion-star"></i> Dashboard</a></li>
						<li><a href="{{ action('AdminController@getUsers') }}">Usuarios</a></li>
					</ul>
				</div>
			</nav>		
		</header>


		@yield('content')
			
		<footer>
			<div class="row">
				<div class="col-sm-4">
					{{ HTML::image('img/footer_bg.png') }}
				</div>
				<div class="col-sm-4">
					<br>
					<ul class="list-unstyled">
						<li><a href="{{ url('info/precios') }}">Precios</a></li>
						<li><a href="{{ url('info/reglas') }}">Reglas</a></li>
						<li><a href="{{ url('info/terminos') }}">Términos y Condiciones</a></li>
						<li><a href="{{ url('info/politicas') }}">Políticas de Privacidad</a></li>
					</ul>
				</div>
				<div class="col-sm-4">
					<br><br><br>
					<p class="lead">
						Sitio web para mayores de 18 años<br>
						&copy; 2015 - <strong><a href="{{ Config::get('site.full_url') }}">ChicasBuenas.cl</a></strong>
					</p>
				</div>
			</div>
		</footer>

	</div>

	{{ HTML::script('vendor/jquery/jquery-1.11.2.min.js') }}
	{{ HTML::script('vendor/bootstrap/js/bootstrap.min.js') }}
	{{ HTML::script('vendor/slick/slick.min.js') }}
	{{ HTML::script('js/app.js') }}
</body>
</html>
