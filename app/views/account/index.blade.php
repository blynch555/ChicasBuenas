@extends('templates.default')
@section('content')

	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			
			<div class="panel panel-primary">
				<div class="panel-heading">
					<p class="lead" style="margin: 0px;">
						<i class="ion-ios-compose"></i>
						Actualizar mis Datos
					</p>
				</div>
				<div class="panel-body">
					{{ Form::open(['action' => 'CuentaController@postActualizar']) }}

					@if(Session::has('update_fail'))
					<div class="alert alert-danger">
						<i class="ion-alert-circled"></i> Por favor revise las observaciones y complete la información faltante.
					</div>
					@endif

					@if(Session::has('update_success'))
					<div class="alert alert-success">
						<i class="ion-checkmark-circled"></i> Los cambios fueron guardados.
					</div>
					@endif

					<div class="form-group @if($errors->has('name')) has-error @endif">
						{{ Form::label('name', 'Nombre:', ['class'=>'control-label']) }}
						{{ Form::text('name', $user->name, ['class'=>'form-control', 'placeholder'=>'Ivonne']) }}
						
						{{ $errors->first('name', '<p class="help-block"><i class="ion-alert-circled"></i> :message</p>') }}
					</div>
					<div class="form-group @if($errors->has('email')) has-error @endif">
						{{ Form::label('email', 'Email:', ['class'=>'control-label']) }}
						{{ Form::email('email', $user->email, ['class'=>'form-control', 'readonly']) }}
					</div>
					<div class="form-group @if($errors->has('username')) has-error @endif">
						{{ Form::label('username', 'Nombre de Usuario:', ['class'=>'control-label']) }}
						{{ Form::text('username', $user->username, ['class'=>'form-control', 'readonly']) }}
					</div>
					<div class="form-group @if($errors->has('password')) has-error @endif">
						{{ Form::label('password', 'Contraseña:', ['class'=>'control-label']) }}
						{{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'Nueva contraseña']) }}

						{{ $errors->first('password', '<p class="help-block"><i class="ion-alert-circled"></i> :message</p>') }}
					</div>
					<div class="form-group">
						{{ Form::label('password_confirmation', 'Confirmar Contraseña:', ['class'=>'control-label']) }}
						{{ Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=>'Repetir nueva contraseña']) }}
					</div>
					<div class="form-group @if($errors->has('type')) has-error @endif">
						{{ Form::label('type', 'Tipo de Cuenta:', ['class'=>'control-label']) }}
						{{ Form::email('type', $user->profile, ['class'=>'form-control', 'readonly']) }}
					</div>
					<br>
					{{ Form::submit('Guardar cambios &rarr;', ['class'=>'btn btn-primary btn-lg btn-block']) }}		
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>


@stop