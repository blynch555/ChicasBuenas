
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8">
		<title>@section('title') {{ trans('site.meta.title') }} @show</title>

		<meta name="title" 									content="@section('meta-title') {{ trans('site.meta.title') }} @show"/>
		<meta name="description" 							content="@section('meta-description') {{ trans('site.meta.description') }} @show"/>
		<meta name="keywords" 								content="{{ trans('site.meta.keywords') }}">
		<meta name="abstract" 								content="{{ trans('site.meta.keywords') }}"/>
		<meta name="category" 								content="Adult"/>
		<meta name="language" 								content="es"/>
		<meta name="locality" 								content="Santiago de Chile"/>
		<meta name="robots" 								content="all | index | follow"/>
		<meta name="Copyright" 								content="Ubora Chile SpA"/>
		<meta http-equiv="Pragma" 							content="no-cache"/>
		<meta name="revisit-after" 							content="1 days"/>
		<meta name="classification" 						content="18"/> 

		<meta property='og:title' 							content="{{ trans('site.og.title') }}" />
		<meta property='og:type' 							content='website' />
		<meta property='og:url' 							content='http://www.chicasbuenas.cl' />
		<meta property='og:image'							content='{{ url('img/logo-square-dark.png') }}'  />
		<meta property='og:site_name'						content='ChicasBuenas.cl'  />
		<meta property='og:description'						content='{{ trans('site.og.description') }}'  />

        @section('twitter-meta')
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:site" content="@chicasbuenascl" />
		<meta name="twitter:title" content="@section('twitter-title') Chicas Buenas - El éxtasis del pecado - Acompañantes y Escorts en Chile @show" />
		<meta name="twitter:description" content="@section('twitter-description') Portal interactivo de servicios escorts y de acompañantes mas completo de Chile @show" />
		<meta name="twitter:image" content="@section('twitter-image') {{ url('img/logo-square-dark.png') }} @show" />
		<meta name="twitter:url" content="@section('twitter-title') http://www.chicasbuenas.cl @show" />
		@show

		<meta name="viewport" 								content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
		<meta name="format-detection" 						content="telephone=yes">
		<meta name="apple-mobile-web-app-capable" 			content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" 	content="black">
		<meta name="robots" 								content="index,follow">
		<meta name="viewport" 								content="width=device-width, initial-scale=1">

		<meta name="google-site-verification" 				content="ND_X3a1Z4038_CgjuINEXbQ-4NVbAKm93QyDsetmYoM" />
		<meta property="fb:app_id" 							content="325458097659974" />

		<link href='{{ asset('favicon.png') }}' type="image/png" rel='shortcut icon' />

        {{ HTML::style('pivot/css/flexslider.min.css') }}
        {{ HTML::style('pivot/css/line-icons.min.css') }}
        {{ HTML::style('pivot/css/elegant-icons.min.css') }}
        {{ HTML::style('pivot/css/lightbox.min.css') }}
        {{ HTML::style('pivot/css/bootstrap.min.css') }}
        {{ HTML::style('pivot/css/theme-sunset.css') }}
        {{ HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700%7CRaleway:700') }}
        {{ HTML::script('pivot/js/modernizr-2.6.2-respond-1.1.0.min.js') }}
    </head>
    <body>
    	<div class="loader">
    		<div class="spinner">
			  <div class="double-bounce1"></div>
			  <div class="double-bounce2"></div>
			</div>
    	</div>
				
		<div class="nav-container">
						
			<nav class="top-bar overlay-bar offscreen-menu">
				<div class="container">
				
					<div class="row nav-menu clearfix">
						<div class="col-xs-4">
							<a href="#">
								{{ HTML::image('pivot/img/logo-light.png', '', ['class'=>'logo logo-light']) }}
								{{ HTML::image('pivot/img/logo-dark.png', '', ['class'=>'logo logo-dark']) }}
							</a>
						</div>
						
						<div class="col-xs-2 text-right pull-right">
							<div class="offscreen-toggle">
								<i class="icon icon_menu text-white"></i>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-sm-12">
							<hr class="no-margin">
						</div>
					</div>
					
				</div>
				
				<div class="offscreen-container">
					{{ HTML::image('pivot/img/logo-light.png', '', ['class'=>'logo']) }}
					<ul class="menu">
						<li><a href="#cabecera" class="inner-link" target="default">portada </a></li>
						<li><a href="#caractersticas" class="inner-link" target="default">Características&nbsp;</a></li>
						<li><a href="#panel-de-control" class="inner-link" target="default">Panel de Control&nbsp;</a></li>
						<li><a href="#planes-gpv" class="inner-link" target="default">planes GPV</a></li>
						<li><a href="#planes-mmsf" class="inner-link" target="default">planes MMTF</a></li>
						<li><a href="#registro" id="linkRegister" class="inner-link" target="default">Registrarme </a></li>
						<!--<li><a href="#contacto" class="inner-link" target="default">Contacto</a></li>-->
					</ul>	
					<ul class="social-icons">
						<li>
							<a href="https://twitter.com/chicasbuenascl" target="_blank">
								<i class="icon social_twitter"></i>
							</a>
						</li>
				
						<li>
							<a href="https://www.facebook.com/chicasbuenascl" target="_blank">
								<i class="icon social_facebook"></i>
							</a>
						</li>						
					</ul>
				</div>
			</nav>
		</div>
		
		<div class="main-container">
		<a id="cabecera" class="in-page-link"></a>
			
			<header class="title">
					<div class="background-image-holder">
						{{ HTML::image('pivot/img/header.jpg', '', ['class'=>'background-image']) }}
					</div>
					
					<div class="container align-bottom">
						<div class="row">
							<div class="col-xs-12">
								<h1 class="text-white">Se parte de la mayor comunidad de Chicas Escort en Chile</h1>
								<span class="sub alt-font text-white">En la variedad esta el gusto, no dudes en publicar tus apetecidos servicios a miles de usuarios que ingresan diariamente a Chicasbuenas.cl</span>
							</div>
						</div>
					</div>
			</header>
			
			<a id="presentacin" class="in-page-link"></a>
			
			<section class="action-banner overlay">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 text-center">
							<h1 class="text-white">Sabemos lo importante que es llegar a más clientes</h1>
							<h2 class="text-white">Es por esto que ponemos a tu disposición nuestros servicios de publicación en internet a bajos costos y con un alto potencial de publicidad</h2>
							<a href="#caractersticas" class="btn btn-primary btn-white inner-link" target="default">Características</a>
							<a href="#planes-gpv" class="btn btn-primary btn-white btn-filled inner-link" target="default">Ver Planes</a>
						</div>
					</div>
				</div>
			</section>
			
			<a id="caractersticas" class="in-page-link"></a>
			
			<section>
				<div class="container">
					<div class="row">
						<div class="col-sm-6 text-center">
							{{ HTML::image('pivot/img/notebookgirl2.jpg', '', ['class'=>'phone-portrait']) }}
						</div>
					
						<div class="col-sm-6 align-vertical no-align-mobile clearfix">
							<div class="col-md-6 no-pad-left clearfix">
								<div class="feature feature-icon-small">
									<i class="icon icon-megaphone icon-large"></i>
									<h6>Publicación Estándar</h6>
									<p>
										Haremos llegar tu perfil a una gran cantidad de clientes de forma efectiva y económica</p>
								</div>
							</div>
						
							<div class="col-md-6 no-pad-left clearfix">
								<div class="feature feature-icon-small">
									<i class="icon icon-trophy icon-large"></i>
									<h6>Publicación Destacada</h6>
									<p>
										Sabemos que tus encantos entran por la vista, es por eso que estarás en los primeros lugares y en un tamaño mayor.</p>
								</div>
							</div>
						
							<div class="col-md-6 no-pad-left clearfix">
								<div class="feature feature-icon-small">
									<i class="icon icon-profile-female icon-large"></i>
									<h6>Controla 100% tus Datos</h6>
									<p>
										Modificar tus servicios y promociones estará bajo tu control, puedes hacer cambios en tu perfil las veces que quieras y cuando quieras.</p>
								</div>
							</div>
						
							<div class="col-md-6 no-pad-left clearfix">
								<div class="feature feature-icon-small">
									<i class="icon social_youtube icon-large"></i>
									<h6>Un Video habla mucho más&nbsp;</h6>
									<p>
										Tu clientes estarán muy interesados en ver tu video de presentación, es por eso que los hemos integrado Youtube y Vimeo en tu perfil.</p>
								</div>
							</div><div class="col-md-6 no-pad-left clearfix">
								<div class="feature feature-icon-small">
									<i class="icon social_twitter icon-large"></i>
									<h6>Interactua con Twitter</h6>
									<p>
										A tus clientes les gustará interactuar contigo a través de twitter, es por eso que lo hemos integrado en tu perfil, para que llegues a tus seguidores de forma rápida.</p>
								</div>
							</div><div class="col-md-6 no-pad-left clearfix">
								<div class="feature feature-icon-small">
									<i class="icon icon-bargraph icon-large"></i>
									<h6>Panel de Control</h6>
									<p>
										Accede a tu panel de control para actualizar tu perfil, tus datos de tu plan, obtener estadísticas, etc. disponible 24/7</p>
								</div>
							</div>
							
		
						</div>
					</div>
				
				</div>
			</section>
			
			<a id="panel-de-control" class="in-page-link"></a>
			
			<section class="product-right">
				<div class="container align-vertical">
					<div class="row">
						<div class="col-md-5 col-sm-6">
							<h1>Mantén el control de tus datos y tu cuenta a todo momento</h1>
							<p class="lead">
								Tendrás acceso a tu panel de control donde podrás ver las estadísticas de tu perfil y controlar tus datos y ofertas de forma fácil y rápida. No sigas dependiendo del tiempo de otros sitios.</p>
							
							<a href="#planes-gpv" class="btn btn-primary btn-filled inner-link" target="default">Ver Planes</a>
						</div>
					</div>
				</div>
				
				<div class="product-image" data-scroll-reveal="enter right and move 100px">
					{{ HTML::image('pivot/img/dashboard.jpg') }}
				</div>
			
			</section>
			
			<a id="planes-gpv" class="in-page-link"></a>
			
			<section class="pricing-1 bg-secondary-1">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h1 class="text-white">Planes para Chicas Gold, Premium y VIP</h1>
						</div>
					</div>
					
					<div class="row clearfix pricing-tables">
						<div class="col-md-3 col-sm-6 no-pad-right">
							<div class="pricing-table">
								<div class="price">
									<span class="sub">$</span>
									<span class="amount">Gratis </span>
								</div>
								<ul class="features">
									<li><strong>3</strong>&nbsp;Fotografías</li>
									<li><strong><span>Publicación&nbsp;</span>Estándar</strong><div><span>en la categoría</span></div></li>
									<li><span>Panel de Estadísticas 24/7</span></li>
									<li>Control Total de tus Datos</li><li>Integración de tu Twitter</li><li>Integración tu video&nbsp;<div>Youtube o Vimeo</div></li><li><br><div><br></div></li>
								</ul>
								<a href="#registro" class="btn btn-primary btn-white inner-link" target="default">Registrarme</a>
							</div>
						</div>
						
						<div class="col-md-3 col-sm-6 no-pad">
							<div class="pricing-table">
								<div class="price">
									<span class="sub">$</span>
									<span class="amount">PRONTO</span>
								</div>
								<ul class="features">
									<li><strong>12</strong>&nbsp;Fotografías</li>
									<li> <span>Publicación </span><strong>Destacada</strong><div>en la categoría</div></li>
									<li>Panel de Estadísticas 24/7</li>
									<li>Control Total de tus Datos</li><li>Integración de tu Twitter</li><li>Integración de tu video&nbsp;<div>Youtube o Vimeo</div></li><li><br><div><br></div></li>
								</ul>
								<a href="#registro" class="btn btn-primary btn-white inner-link" target="default">Registrarme</a>
							</div>
						</div>
						
						<div class="col-md-3 col-sm-6 no-pad">
							<div class="pricing-table emphasis">
								<div class="price">
									<span class="sub">$</span>
									<span class="amount">PRONTO</span>
								</div>
								<ul class="features">
									<li><strong>12</strong>&nbsp;Fotografías</li>
									<li><span>Publicación </span><span><b>Destacada</b></span><div><span>en la Categoría</span></div></li>
									<li><span>Publicación <b>Estándar</b></span><div><span>en la <b>Portada</b></span></div></li>
									<li>Panel de Estadísticas 24/7</li><li>Control Total de tus Datos</li><li>Integración de tu Twitter</li><li>Integración de tu video<div>Youtube o Vimeo</div></li>
								</ul>
								<a href="#registro" class="btn btn-primary btn-white inner-link" target="default">Registrarme</a>
							</div>
						</div>
						
						<div class="col-md-3 col-sm-6 no-pad-left">
							<div class="pricing-table">
								<div class="price">
									<span class="sub">$</span>
									<span class="amount">PRONTO</span>
								</div>
								<ul class="features">
									<li><span>12</span>&nbsp;Fotografías</li>
									<li>Publicación <b>Destacada</b><div> en la Categoría</div></li>
									<li>Publicación <b>Destacada</b><div> en la <b>Portada</b></div></li>
									<li>Panel de Estadísticas 24/7</li><li>Control Total de tus Datos</li><li>Integración de tu Twitter</li><li>Integración de tu video&nbsp;<div>Youtube o Vimeo</div></li>
								</ul>
								<a href="#registro" class="btn btn-primary btn-white inner-link" target="default">Registrarme</a>
							</div>
						</div>
						
						
					</div>
					
				</div>
			
			</section>
			
			<a id="planes-mmsf" class="in-page-link"></a>
			
			<section class="pricing-1 bg-secondary-1">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h1 class="text-white">Planes para Masajistas, Maduritas, Travestis y Fantasias</h1>
						</div>
					</div>
					
					<div class="row clearfix pricing-tables">

						<div class="col-sm-offset-3 col-sm-3 col-md-3 no-pad-right">
							<div class="pricing-table">
								<div class="price">
									<span class="sub">$</span>
									<span class="amount">Gratis</span>
								</div>
								<ul class="features">
									<li><strong>12</strong>&nbsp;Fotografías</li>
									<li>Publicación <b>Estándar</b> en la <br>Categoría</li>
									<li>Publicación <b>Estándar</b> en la Portada</li>
									<li>Panel de Estadísticas 24/7</li>
									<li>Control Total de tus Datos</li>
									<li>Integración de tu Twitter</li>
									<li>
										Integración de tu video<br>
										Youtube o Vimeo
									</li>
									
								</ul>
								<a href="#registro" class="btn btn-primary btn-white inner-link" target="default">Registrarme</a>
							</div>
						</div>
						
						<div class="col-md-3 col-sm-3 no-pad-left">
							<div class="pricing-table">
								<div class="price">
									<span class="sub">$</span>
									<span class="amount">Pronto&nbsp;</span>
								</div>
								<ul class="features">
									<li><strong>12</strong>&nbsp;Fotografìas</li>
									<li>Publicación <b>Destacada</b> en la Categoría</li>
									<li>Publicación <b>Destacada</b> en la Portada</li>
									<li>Panel de Estadísticas 24/7</li>
									<li>Control Total de tus Datos</li>
									<li>Integración de tu Twitter</li>
									<li>
										Integración de tu video<br>
										Youtube o Vimeo
									</li>
								</ul>
								<a href="#registro" class="btn btn-primary btn-white inner-link" target="default">Registrarme</a>
							</div>
						</div>
						
					</div>
					
				</div>
			
			</section>
			
			<a id="registro" class="in-page-link"></a>
			
			<header class="signup">
					<div class="background-image-holder parallax-background">
						{{ HTML::image('pivot/img/register.jpg', '', ['class'=>'background-image']) }}
					</div>
					
					<div class="container">
						<div class="row">
							<div class="col-md-10 col-md-offset-1 col-sm-12 text-center">
								<h1 class="text-white">No pierdas más clientes, se parte ya de nuestra comunidad de Chicas Buenas</h1>
							</div>
						</div>
						
						{{ Form::open(['method'=>'POST', 'id'=>'frmRegister']) }}
						<div class="row text-center">
						
							<div class="col-sm-12 text-center">
								<div class="photo-form-wrapper clearfix">
									<div class="row">
										<div class="col-md-4 col-sm-4">
											{{ Form::text('register_name', '', ['class'=>'form-name', 'placeholder'=>'Nombre', 'id'=>'register_name']) }}
										</div>
										<div class="col-md-4 col-sm-4">
											{{ Form::text('register_email', '', ['class'=>'form-email', 'placeholder'=>'Email', 'id'=>'register_email']) }}
										</div>
										<div class="col-md-4 col-sm-4">
											{{ Form::text('register_phone', '', ['class'=>'form-phone', 'placeholder'=>'Teléfono (ej. 87133278)', 'id'=>'register_phone']) }}
										</div>
									</div>
								</div>
							</div>
						
						</div>
						<div class="row text-center">
						
							<div class="col-sm-12 text-center">
								<div class="photo-form-wrapper clearfix">
									
									<div class="row">
										<div class="col-md-4 col-sm-4">
											{{ Form::password('register_password', ['class'=>'form-password', 'placeholder'=>'Contraseña', 'id'=>'register_password']) }}
										</div>
										<div class="col-md-4 col-sm-4">
											{{ Form::password('register_password_confirm', ['class'=>'form-password2', 'placeholder'=>'Confirmar Contraseña', 'id'=>'register_password_confirm']) }}
										</div>
										<div class="col-md-4 col-sm-4">
											{{ Form::button('Registrarme', ['class' => 'btn btn-primary btn-filled btn-block', 'id'=>'btnRegisterSubmit']) }}
										</div>
									</div>
								</div>
							</div>

						</div>
						{{ Form::close() }}
						
					</div>	
			</header>
			
			<!--
			<a id="contacto" class="in-page-link"></a>
			
			<section class="contact-photo">
				
				<div class="background-image-holder">
					{{ HTML::image('pivot/img/phonegirl.jpg', 'Contáctanos', ['class'=>'background-image']) }}
				</div>
				
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 text-center">
							<h1 class="text-white">Contáctanos<br>
							Estamos siempre dispuestos a atender tus dudas</h1>
						</div>
					</div>
					
					<div class="photo-form-wrapper clearfix">
						<form class="email-form">
							<div class="row">
								<div class="col-sm-4 col-sm-offset-2 col-md-offset-3 col-md-2">
									<input class="form-name validate-required" type="text" placeholder="Tu Nombre" name="name">
								</div>
							
								<div class="col-sm-4 col-md-2">
									<input class="form-phone validate-required" type="text" placeholder="Tu Teléfono" name="phone">
								</div>

								<div class="col-sm-4 col-md-2">
									<input class="form-email validate-required validate-email" type="text" placeholder="Tu Email" name="email">
								</div>
							</div>
						
							<div class="row">
								<div class="col-md-6 col-sm-8 col-sm-offset-2 col-md-offset-3 text-center">
									<input class="form-message validate-required" type="text" name="message" placeholder="Tu Mensaje">
									<input type="submit" class="send-form btn-filled" value="Enviar Mensaje">
									<div class="form-success">
										<span class="text-white">Mensaje enviado - Te contactaremos lo antes posible</span>
									</div>
									<div class="form-error">
										<span class="text-white">Por favor ingresa todos los datos solicitados</span>
									</div>
								</div>	
							</div>
						</form>
						
					</div>
					
					
		
				</div>
			
			</section>
			-->
		</div>
		
		<div class="footer-container">
			<footer class="short bg-secondary-1">
				<div class="container">
					<div class="row">
						<div class="col-sm-10">
							<span class="sub">Copright &copy; 2014 - ChicasBuenas.cl</span>
							<ul>
								<li><a href="#">Términos de Uso</a></li>
								<li><a href="#">Privacidad y Políticas de Seguridad</a></li>
								
							</ul>
						</div>
						
						<div class="col-sm-2 text-right">
							<ul class="social-icons">
								<li>
									<a href="https://twitter.com/chicasbuenascl" target="default">
										<i class="icon social_twitter"></i>
									</a>
								</li>
								
								<li>
									<a href="https://www.facebook.com/chicasbuenascl" target="blank">
										<i class="icon social_facebook"></i>
									</a>
								</li>
							</ul>	
						</div>
					</div>
				</div>
			</footer>
		</div>
				
		{{ HTML::script('https://www.youtube.com/iframe_api') }}
		{{ HTML::script('pivot/js/jquery.min.js') }}
        {{ HTML::script('pivot/js/jquery.plugin.min.js') }}
        {{ HTML::script('pivot/js/bootstrap.min.js') }}
        {{ HTML::script('pivot/js/jquery.flexslider-min.js') }}
        {{ HTML::script('pivot/js/smooth-scroll.min.js') }}
        {{ HTML::script('pivot/js/skrollr.min.js') }}
        {{ HTML::script('pivot/js/spectragram.min.js') }}
        {{ HTML::script('pivot/js/scrollReveal.min.js') }}
        {{ HTML::script('pivot/js/isotope.min.js') }}
        {{ HTML::script('pivot/js/twitterFetcher_v10_min.js') }}
        {{ HTML::script('pivot/js/lightbox.min.js') }}
        {{ HTML::script('pivot/js/jquery.countdown.min.js') }}
        {{ HTML::script('pivot/js/scripts.js') }}

        <script>
        	$(function(){
		        @if(count($errors->register->all()) > 0)
		        	location.hash = "#registro";
		        	alert('Debes llenar todos los datos!');
		        @endif

		        @if(Session::has('register_success'))
		        	alert('Tu cuenta ha sido registrada, dentro de poco nos pondremos en contacto contigo para que empieces a usar tu cuenta');
		        @endif

	        
	        	$("#btnRegisterSubmit").click(function(){
	        		var name = $("#register_name").val();
	        		var email = $("#register_email").val();
	        		var phone = $("#register_phone").val();
	        		var pass = $("#register_password").val();
	        		var pass2 = $("#register_password_confirm").val();

	        		if(name == ''){
	        			alert('Ingresa tu nombre');
	        			$("#register_name").focus();
	        		}else if(email == ''){
	        			alert('Ingresa tu email');
	        			$("#register_email").focus();
	        		}else if(!validateEmail(email)){
	        			alert('Ingresa un email válido');
	        			$("#register_email").focus();
	        		}else if(phone == ''){
	        			alert('Ingresa tu teléfono');
	        			$("#register_phone").focus();
	        		}else if(phone.length < 8){
	        			alert("Ingresa un teléfono válido (8 dígitos)");
	        			$("#register_phone").focus();
	        		}else if(pass == ''){
	        			alert('Ingresa una contraseña');
	        			$("#register_password").focus();
	        		}else if(pass2 == ''){
	        			alert('Repite tu contraseña');
	        			$("#register_password_confirm").focus();
	        		}else if(pass2 != pass){
	        			alert('Las contraseñas no coinciden');
	        			$("#register_password_confirm").focus();
	        		}else{
	        			$("#frmRegister").submit();
	        		}
	        	});


				function validateEmail(email) { 
				    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				    return re.test(email);
				} 
	        });
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