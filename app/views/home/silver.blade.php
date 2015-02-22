@extends('templates.default')
@section('headers')
<h2 class="sr-only">Publicaciones Silver en {{ Session::get('city_name') }}</h2>
@stop
@section('content')
	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-primary panelEscorts">
				<div class="panel-heading">
					<i class="ion-heart"></i> Publicaciones Silver
				</div>
				<div class="panel-body">

					<ul class="media-list hidden-xs" id="escortPhotos">
					
						@foreach($silvers as $silver)
						<li class="media" style="border-bottom: solid 1px #ff26ff;" id="silver_{{ $silver->id }}">
							<div class="media-left">
								<p class="lead">
									@if($silver->filename!='')
									<a href="{{ $silver->largeUrl() }}" class="escortPhoto" title="{{ $silver->title }}">
										{{ HTML::image($silver->mediumUrl(), $silver->title, ['class'=>'media-object', 'width' => '100%']) }}
									</a>
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
						@endforeach
						
					</ul>

					@foreach($silvers as $silver)
					<div class="panel panel-primary">
						<div class="panel-heading" style="font-size: 12px;">
							<i class="ion-heart"></i> {{ $silver->title }}
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-xs-3">
									@if($silver->filename!='')
									<a href="{{ $silver->largeUrl() }}" class="escortPhoto" title="{{ $silver->title }}">
										{{ HTML::image($silver->mediumUrl(), $silver->title, ['class'=>'media-object', 'width' => '100%']) }}
									</a>
									@else
									{{ HTML::image('img/withoutphoto.jpg', '', ['class'=>'media-object', 'width' => '100%']) }}
									@endif
								</div>
								<div class="col-xs-9">
									{{ nl2br($silver->details) }}
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<a href="tel:569{{ $silver->phone }}" class="btn btn-primary btn-lg btn-block" style="margin-top: 5px;">
										<i class="ion-ios-telephone"></i> {{ $silver->phone }}
									</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<div class="panel-footer">
					{{ $silvers->links() }}
				</div>
			</div>
		</div>
		<div class="col-sm-4 hidden-xs">
			<div class="panel panel-primary panelEscorts">
				<div class="panel-heading">
					<i class="ion-speakerphone"></i> Publícate ahora
				</div>
				<div class="panel-body">

					{{ Form::open(['files'=>true, 'class'=>'form', 'style'=>'margin: 10px;', 'action'=>'SilverController@postPublicar']) }}

						<div class="form-group">
							{{ Form::label('title', 'Titulo de la publicación (máx 50 carácteres):', ['class'=>'control-label']) }}
							{{ Form::text('title', '', ['class'=>'form-control', 'required' => 'required', 'placeholder'=>'ej. Cassandra la chica de tus sueños fulltime']) }}
						</div>

						<div class="form-group">
							{{ Form::label('photo', 'Fotografía:', ['class'=>'control-label']) }}
							{{ Form::file('photo', ['style'=>'margin-bottom: 10px;', 'accept'=>'image/*', 'id'=>'fileUpload', 'required' => 'required']) }}
						</div>

						<div class="form-group">
							{{ Form::label('details', 'Detalle de la publicación (máx 500 carácteres):', ['class'=>'control-label']) }}
							{{ Form::textarea('details', '', ['class'=>'form-control', 'required' => 'required', 'placeholder'=>'Aquí te puedes explayar y explicar tus servicios', 'maxlength' => 500]) }}
						</div>

						<div class="form-group">
							{{ Form::label('phone', 'Teléfono de contacto:', ['class'=>'control-label']) }}
							{{ Form::text('phone', '', ['class'=>'form-control', 'required' => 'required', 'placeholder'=>'ej. 98765432 (no incluir +569)', 'maxlength' => 8]) }}
						</div>

						<div class="form-group">
							<p class="lead text-center">costo por publicación: $ 500.-</p>
						</div>

						{{ Form::submit('Publicar', ['class'=>'btn btn-primary btn-lg btn-block']) }}

					{{ Form::close() }}

				</div>
			</div>
		</div>
	</div>
@stop
@section('styles')
	{{ HTML::style('vendor/magnific-popup/dist/magnific-popup.css') }}

	<style>
		.media-heading{
			color: #d700d7;
		}
	</style>
@stop
@section('scripts')
	{{ HTML::script('vendor/magnific-popup/dist/jquery.magnific-popup.min.js') }}

	<script>
	$(function(){
		$('#escortPhotos').magnificPopup({
			delegate: 'a.escortPhoto',
			type: 'image'
		});
	});
	</script>
@stop