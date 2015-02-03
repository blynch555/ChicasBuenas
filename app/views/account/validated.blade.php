@extends('templates.default')
@section('content')
	
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<p class="lead">Tu cuenta ha sido validada!</p>
				</div>
				<div class="panel-body">
					<p class="lead">
						Ya puedes acceder a todas las opciones que te ofrecemos y ser 
						parte de nuestra exclusiva comunidad.
					</p>
					<p class="lead">
						Bienvenid@!!
					</p>
					<p>
						<a href="{{ url('/') }}" class="btn btn-primary"><i class="ion-home"></i> Ir a la Portada</a>
						<a href="{{ action('CuentaController@getEntrar') }}" class="btn btn-primary"><i class="ion-person"></i> Ir a mi Cuenta</a>
					</p>
				</div>
			</div>
		</div>
	</div>
@stop