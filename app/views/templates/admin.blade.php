<!doctype html>
<html lang="{{ trans('site.lang.code') }}">
<head>
	<meta charset="UTF-8">
	<title>Administración</title>
	
	{{ HTML::style('vendor/bootstrap/css/bootstrap.min.css') }}
	{{ HTML::style('vendor/bootstrap/css/bootstrap-theme.min.css') }}
	{{ HTML::style('vendor/ionicons/css/ionicons.min.css') }}
	{{ HTML::style('vendor/font-awesome/css/font-awesome.min.css') }}
	{{ HTML::style('css/app.css') }}

	@yield('styles')
</head>
<body>
	<div class="container wraper">

		<header>
			<div class="row">
				<div class="col-sm-3 headerLogo">
					<a href="{{ url('/') }}"><h1>ChicasBuenas.cl</h1></a>
				</div>
				<div class="col-sm-6 headerButtons">
					<p class="lead text-center" style="margin-top: 7px; font-weight: normal; color: #fff; font-size: 32px;">ADMINISTRACIÓN</p>
				</div>
				<div class="col-sm-3 headerUserActions">
					<div class="btn-group pull-right" role="group" aria-label="...">

						@include('global.user_menu')

					</div>
				</div>
			</div>

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
						<li><a href="#"><i class="ion-star"></i> Dashboard</a></li>
						<li><a href="{{ action('Admin\HomeController@getUsers') }}">Usuarios</a></li>
						<li><a href="{{ action('Admin\HomeController@getEscorts') }}">Escorts</a></li>
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
	
	@yield('scripts')
</body>
</html>
