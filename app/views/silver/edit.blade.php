@extends('templates.default')
@section('content')
	
	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<i class="ion-heart"></i> Publicación Silver

					@if($silver->status != 'Publicada')
					<button type="button" data-toggle="modal" data-target="#frmEditSilver" class="btn btn-default btn-xs pull-right"><i class="ion-edit"></i> Editar publicación</button>
					@endif
				</div>
				<div class="panel-body">
					<ul class="media-list">
						<li class="media">
							<div class="media-left">
								<p class="lead">
									@if($silver->filename!='')
									{{ HTML::image($silver->mediumUrl(), '', ['class'=>'media-object', 'width' => '100%']) }}
									@else
									{{ HTML::image('img/withoutphoto.jpg', '', ['class'=>'media-object', 'width' => '100%']) }}
									@endif

									<a href="tel:569{{ $silver->phone }}" class="btn btn-primary btn-lg btn-block" style="margin-top: 5px;">
										<i class="ion-ios-telephone"></i> {{ $silver->phone }}
									</a>
								</p>
							</div>
							<div class="media-body">
								<h2 class="media-heading">{{ $silver->title }}</h2>
								<p class="lead">
									{{ nl2br($silver->details) }}
								</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
					@if($silver->status != 'Publicada')
					<i class="ion-speakerphone"></i> Pagar y publicar
					@else

					@endif
				</div>
				<div class="panel-body">
					@if($silver->status != 'Publicada')
						<p class="lead">
							Las publicaciones Silver tienen una vigencia de 2 días desde su compra. El valor 
							es de $ 1.000.-
						</p>

						<h1 class="text-center">$ 1.000 <small>x 2 días</small></h1>
						<br>
						<p class="text-center">
							{{ HTML::image('img/webpay2.jpg', '', ['style'=>'width: 50%;']) }}
						</p>
						<br>

						{{ Form::open(['action'=>'SilverController@postPagar']) }}
						{{ Form::hidden('hash', $silver->hash) }}
						<button type="submit" class="btn btn-primary btn-block btn-lg">Pagar y publicar &rarr;</button>
						{{ Form::close() }}
					@else

					@endif
				</div>
			</div>
		</div>
	</div>

	@if($silver->status != 'Publicada')
	<div class="modal fade" id="frmEditSilver">
		<div class="modal-dialog">
			<div class="modal-content">
				{{ Form::open(['files'=>true, 'class'=>'form', 'style'=>'margin: 10px;', 'action'=>'SilverController@postActualizar']) }}
				{{ Form::hidden('hash', $silver->hash) }}

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Editar Publicación</h4>
				</div>
				<div class="modal-body">

					<div class="form-group">
						{{ Form::label('title', 'Titulo de la publicación (máx 50 carácteres):', ['class'=>'control-label']) }}
						{{ Form::text('title', $silver->title, ['class'=>'form-control', 'placeholder'=>'ej. Cassandra la chica de tus sueños fulltime', 'required' => 'required']) }}
					</div>

					<div class="form-group">
						{{ Form::label('photo', 'Fotografía:', ['class'=>'control-label']) }}
						{{ Form::file('photo', ['style'=>'margin-bottom: 10px;', 'accept'=>'image/*', 'id'=>'fileUpload']) }}
					</div>

					<div class="form-group">
						{{ Form::label('details', 'Detalle de la publicación (máx 1000 carácteres):', ['class'=>'control-label']) }}
						{{ Form::textarea('details', $silver->details, ['class'=>'form-control', 'required' => 'required', 'placeholder'=>'Aquí te puedes explayar y explicar tus servicios', 'maxlength' => 1000]) }}
					</div>

					<div class="form-group">
						{{ Form::label('phone', 'Teléfono de contacto:', ['class'=>'control-label']) }}
						{{ Form::text('phone', $silver->phone, ['class'=>'form-control', 'required' => 'required', 'placeholder'=>'ej. 98765432 (no incluir +569)', 'maxlength' => 8]) }}
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Guardar Cambios</button>
				</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
	@endif
@stop