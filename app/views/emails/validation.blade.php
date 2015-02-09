<h1>Bienvenid@ a ChicasBuenas.cl</h1>

<p>Bienvenid@ {{ $name }}, ya eres parte de nuestra exclusiva comunidad ChicasBuenas.cl, 
solo necesitas activar tu cuenta entrando en el siguiente enlace:</p>

<p>
	<a href="{{ action('CuentaController@getActivar', [$code]) }}">{{ action('CuentaController@getActivar', [$code]) }}</a>
</p>