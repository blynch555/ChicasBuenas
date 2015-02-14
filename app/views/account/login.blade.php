@extends('templates.default')
@section('content')
	<br>

	<div class="row">
		<div class="col-sm-4 col-sm-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<p class="lead" style="margin: 0px;">
						<i class="ion-person"></i>
						Entrar a mi Cuenta
					</p>
				</div>
				<div class="panel-body">
					{{ Form::open(['action' => 'CuentaController@postEntrar']) }}

					@if(Session::has('login_fail'))
					<div class="alert alert-danger">
						<i class="ion-alert-circled"></i> Las credenciales ingresadas no son válidas, favor intentar de nuevo.
					</div>
					@endif

					<div class="form-group">
						{{ Form::label('username', 'Nombre de Usuario', ['class'=>'control-label']) }}
						{{ Form::text('username', '', ['class'=>'form-control', 'placeholder'=>'ivonne69', 'autofocus'=>'yes']) }}
					</div>
					<div class="form-group">
						{{ Form::label('password', 'Contraseña', ['class'=>'control-label']) }}
						{{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'contraseña']) }}
					</div>
					<br>
					{{ Form::submit('Entrar a mi cuenta &rarr;', ['class'=>'btn btn-primary btn-lg btn-block']) }}

					{{ Form::close() }}
				</div>
			</div>
		</div>
		<div class="col-sm-6">

			<div class="panel panel-primary">
				<div class="panel-heading">
					<p class="lead" style="margin: 0px;">
						<i class="ion-ios-compose"></i>
						¿Aún no estás registrada?
					</p>
				</div>
				<div class="panel-boxdy">
					<a href="{{ action('CuentaController@getRegistro') }}">
						{{ HTML::image('img/login_register.png', 'Registrate', ['style'=>'width: 100%;']) }}
					</a>
				</div>
			</div>
		</div>
	</div>


@stop