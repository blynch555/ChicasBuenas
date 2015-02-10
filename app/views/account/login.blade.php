@extends('templates.default')
@section('content')

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
						{{ Form::text('username', '', ['class'=>'form-control', 'placeholder'=>'mrsatan']) }}
					</div>
					<div class="form-group">
						{{ Form::label('password', 'Contraseña', ['class'=>'control-label']) }}
						{{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'mrsatan666']) }}
					</div>
					<br>
					{{ Form::submit('Entrar a mi cuenta &rarr;', ['class'=>'btn btn-primary btn-lg btn-block']) }}

					{{ Form::close() }}
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-sm-offset-2">



			<div class="panel panel-primary">
				<div class="panel-heading">
					<p class="lead" style="margin: 0px;">
						<i class="ion-ios-compose"></i>
						Registrarme con ChicaBuena
					</p>
				</div>
				<div class="panel-body">
					{{ Form::open(['action' => 'CuentaController@postRegistro']) }}

					@if(Session::has('register_fail'))
					<div class="alert alert-danger">
						<i class="ion-alert-circled"></i> Por favor revise las observaciones y complete la información faltante.
					</div>
					@endif

					{{ Form::hidden('type', 'escort') }} 
					<!--<div class="form-group @if($errors->has('type')) has-error @endif">
						{{ Form::label('type', 'Tipo de Cuenta:', ['class'=>'control-label']) }}
						<div class="checkbox">
							<label>{{ Form::radio('type', 'user', true) }} Usuario</label>
							<label>{{ Form::radio('type', 'escort', false) }} Escort</label>
							<label>{{ Form::radio('type', 'agency', false) }} Agencia</label>
						</div>

						{{ $errors->first('type', '<p class="help-block"><i class="ion-alert-circled"></i> :message</p>') }}
					</div>-->

					<div class="form-group @if($errors->has('name')) has-error @endif">
						{{ Form::label('name', 'Nombre:', ['class'=>'control-label']) }}
						{{ Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Ivonne']) }}
						
						{{ $errors->first('name', '<p class="help-block"><i class="ion-alert-circled"></i> :message</p>') }}
					</div>
					<div class="form-group @if($errors->has('email')) has-error @endif">
						{{ Form::label('email', 'Email:', ['class'=>'control-label']) }}
						{{ Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'ivonne@gmail.com']) }}

						{{ $errors->first('email', '<p class="help-block"><i class="ion-alert-circled"></i> :message</p>') }}
					</div>
					<div class="form-group @if($errors->has('username')) has-error @endif">
						{{ Form::label('username', 'Nombre de Usuario:', ['class'=>'control-label']) }}
						{{ Form::text('username', '', ['class'=>'form-control', 'placeholder'=>'ivonne69']) }}

						{{ $errors->first('username', '<p class="help-block"><i class="ion-alert-circled"></i> :message</p>') }}
					</div>
					<div class="form-group @if($errors->has('password')) has-error @endif">
						{{ Form::label('password', 'Contraseña:', ['class'=>'control-label']) }}
						{{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'ivonne6922']) }}

						{{ $errors->first('password', '<p class="help-block"><i class="ion-alert-circled"></i> :message</p>') }}
					</div>
					<div class="form-group">
						{{ Form::label('password_confirmation', 'Confirmar Contraseña:', ['class'=>'control-label']) }}
						{{ Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=>'ivonne6922']) }}
					</div>
					<br>
					{{ Form::submit('Crear mi cuenta &rarr;', ['class'=>'btn btn-primary btn-lg btn-block']) }}		
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>


@stop