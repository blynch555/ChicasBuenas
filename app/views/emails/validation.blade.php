<h1>Bienvenido a ChicasBuenas.cl</h1>

<p>Bienvenido {{ $name }}, ya eres parte de la comunidad de ChicasBuenas.cl, solo queda
que actives tu cuenta entrando al siguiente enlace:</p>

<p>
	<a href="{{ action('CuentaController@getActivar', [$code]) }}">{{ action('CuentaController@getActivar', [$code]) }}</a>
</p>