@extends('templates.default')
@section('content')
	
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<p class="lead">Bienvenido a nuestra comunidad ChicasBuenas.cl!</p>
				</div>
				<div class="panel-body">
					<p class="lead">
						Hemos enviado un código de activación a tu correo, entra a tu casilla 
						y pincha sobre el enlace.
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