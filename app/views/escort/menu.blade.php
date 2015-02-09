<ul class="nav nav-tabs">
	<li role="presentation" @if($perfilMenu=='perfil') class="active" @endif><a href="{{ action('EscortController@getPerfil') }}"><i class="ion-person"></i> Perfil</a></li>
	<!--
	<li role="presentation" @if($perfilMenu=='comentarios') class="active" @endif><a href="{{ action('EscortController@getComentarios') }}"><i class="ion-chatbubbles"></i> Comentarios</a></li>
	<li role="presentation" @if($perfilMenu=='evaluaciones') class="active" @endif><a href="{{ action('EscortController@getEvaluaciones') }}"><i class="ion-checkmark-circled"></i> Evaluaciones</a></li>
	<li role="presentation" @if($perfilMenu=='megusta') class="active" @endif><a href="{{ action('EscortController@getMeGusta') }}"><i class="ion-thumbsup"></i> Me Gusta</a></li>
	-->
	<li role="presentation" @if($perfilMenu=='creditos') class="active" @endif><a href="{{ action('EscortController@getCreditos') }}"><i class="ion-card"></i> Créditos</a></li>
	<li role="presentation" @if($perfilMenu=='salir') class="active" @endif><a href="{{ action('CuentaController@getSalir') }}"><i class="ion-log-out"></i> Salir</a></li>
</ul>