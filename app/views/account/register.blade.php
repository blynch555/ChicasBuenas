@extends('templates.default')
@section('content')
	<br>

	<div class="row">
		<div class="col-sm-4 col-sm-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<p class="lead" style="margin: 0px;">
						<i class="ion-ios-compose"></i>
						Registrarme como ChicaBuena
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
						{{ Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Ivonne', 'required'=>'required']) }}
						
						{{ $errors->first('name', '<p class="help-block"><i class="ion-alert-circled"></i> :message</p>') }}
					</div>
					<div class="form-group @if($errors->has('email')) has-error @endif">
						{{ Form::label('email', 'Email:', ['class'=>'control-label']) }}
						{{ Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'ivonne@gmail.com', 'required'=>'required']) }}

						{{ $errors->first('email', '<p class="help-block"><i class="ion-alert-circled"></i> :message</p>') }}
					</div>
					<div class="form-group @if($errors->has('username')) has-error @endif">
						{{ Form::label('username', 'Nombre de Usuario:', ['class'=>'control-label']) }}
						{{ Form::text('username', '', ['class'=>'form-control', 'placeholder'=>'ivonne69', 'required'=>'required']) }}

						{{ $errors->first('username', '<p class="help-block"><i class="ion-alert-circled"></i> :message</p>') }}
					</div>
					<div class="form-group @if($errors->has('password')) has-error @endif">
						{{ Form::label('password', 'Contraseña:', ['class'=>'control-label']) }}
						{{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'contraseña', 'required'=>'required']) }}

						{{ $errors->first('password', '<p class="help-block"><i class="ion-alert-circled"></i> :message</p>') }}
					</div>
					<div class="form-group">
						{{ Form::label('password_confirmation', 'Confirmar Contraseña:', ['class'=>'control-label']) }}
						{{ Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=>'contraseña', 'required'=>'required']) }}
					</div>
					<div class="form-group @if($errors->has('accept_terms') or $errors->has('accept_age18')) has-error @endif">
						<label>
							{{ Form::checkbox('accept_terms', 'yes', false, ['required'=>'required']) }}
							Acepto los <a href="">Términos y Condiciones</a>, 
							las <a href="">Políticas de Privacidad</a> 
							y <a href="">Reglas de ChicasBuenas.cl</a> 
						</label>
						{{ $errors->first('accept_terms', '<p class="help-block"><i class="ion-alert-circled"></i> :message</p>') }}
						
						<label>
							{{ Form::checkbox('accept_age18', 'yes', false, ['required'=>'required']) }}
							Declaro que soy mayor de 18 años y me registro de manera voluntaria
						</label>

						{{ $errors->first('accept_age18', '<p class="help-block"><i class="ion-alert-circled"></i> :message</p>') }}
					</div>
					<br>
					{{ Form::submit('Crear mi cuenta &rarr;', ['class'=>'btn btn-primary btn-lg btn-block']) }}		
					{{ Form::close() }}
				</div>
			</div>
		</div>
		<div class="col-sm-6">

		{{ HTML::image('img/register.png') }}

			
		</div>
	</div>


@stop