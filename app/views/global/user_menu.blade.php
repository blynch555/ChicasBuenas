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

		<div class="btn-group" style="margin-top: 4px;" role="group">
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				{{ HTML::image(Auth::user()->photo(), '', ['class'=>'img-thumbnail', 'style'=>'width: 48px; padding: 2px !important;']) }}
				<span class="caret"></span>
			</button>
			<ul class="dropdown-menu dropdown-menu-right" role="menu">
				@if(Auth::user()->profile == 'Escort')
				<li><a href="{{ action('EscortController@getPerfil') }}"><i class="ion-person"></i> Perfil</a></li>
				<!--
				<li><a href="{{ action('EscortController@getComentarios') }}"><i class="ion-chatbubbles"></i> Comentarios</a></li>
				<li><a href="{{ action('EscortController@getEvaluaciones') }}"><i class="ion-checkmark-circled"></i> Evaluaciones</a></li>
				<li><a href="{{ action('EscortController@getMeGusta') }}"><i class="ion-thumbsup"></i> Me Gusta</a></li>
				-->
				<li><a href="{{ action('EscortController@getCreditos') }}"><i class="ion-card"></i> Créditos</a></li>
				@endif

				@if(Auth::user()->isAdmin())
				<li><a href="{{ url('admin') }}"><i class="ion-ios-cog-outline"></i> Administración</a></li>
				@endif

				@if(Auth::user()->profile == 'Agencia')
				<li><a href="{{ url('admin') }}"><i class="ion-person"></i> Mis Chicas</a></li>
				<li><a href="{{ url('admin') }}"><i class="ion-card"></i> Mis Pagos</a></li>
				@endif

				<li><a href="{{ url('cuenta') }}"><i class="ion-gear-a"></i> Mi cuenta</a></li>

				<li><a href="{{ url('cuenta/salir') }}"><i class="ion-log-out"></i> Salir</a></li>
			</ul>
		</div>

	@endif