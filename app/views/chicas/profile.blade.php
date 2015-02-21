@extends('templates.default')
@section('content')

	<div class="panel panel-primary">
		<div class="panel-heading">
			{{ $escort->name }}
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-4">
					<div class="escortPhotos">
						@foreach($escort->photos as $photo)
						<div>
							<a href="{{ $photo->largeUrl() }}" title="{{ $escort->name }}">{{ HTML::image($photo->largeUrl(), $escort->name, ['style'=>'width: 100%;', 'class'=>'img-thumbnail']) }}</a>
						</div>
						@endforeach
					</div>
				</div>
				<div class="col-sm-7 col-sm-offset-1">
					<div class="form-horizontal">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-sm-6 control-label">Depilación:</label>
									<div class="col-sm-6">
										<p class="form-control-static">{{ ($escort->waxing) ? $escort->waxing->name : '' }}</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-6 control-label">Edad:</label>
									<div class="col-sm-6">
										<p class="form-control-static">{{ $escort->age() }} años</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-6 control-label">Medidas:</label>
									<div class="col-sm-6">
										<p class="form-control-static">{{ $escort->measures() }} cm</p>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-sm-6 control-label">Estatura:</label>
									<div class="col-sm-6">
										<p class="form-control-static">{{ number_format($escort->heigth, 2, ',', '.') }} mts</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-6 control-label">Peso:</label>
									<div class="col-sm-6">
										<p class="form-control-static">{{ $escort->weight }} kg</p>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-group">
										<label class="col-sm-3 control-label">Categoría:</label>
										<div class="col-sm-9">
											<p class="form-control-static">{{ $escort->category }}</p>
										</div>
									</div>
									<label class="col-sm-3 control-label">Tipo de Servicio:</label>
									<div class="col-sm-9">
										<p class="form-control-static">{{ ($escort->serviceType) ? $escort->serviceType->name : '' }}</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Atiende:</label>
									<div class="col-sm-9">
										<p class="form-control-static">{{ $escort->atAt() }}</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Ubicación:</label>
									<div class="col-sm-9">
										<p class="form-control-static">
											{{ ($escort->district) ? $escort->district->name : '' }},
											{{ ($escort->district) ? $escort->district->city->name : '' }}
										</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Horario:</label>
									<div class="col-sm-9">
										<p class="form-control-static">
											{{ $escort->hourly }}
											@if($escort->hourly != 'Full Time')
												de {{ $escort->hourly_time_begin }} a
												{{ $escort->hourly_time_end }}
											@endif
										</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label lead">Precio:</label>
									<div class="col-sm-9">
										<p class="form-control-static lead">$ {{ number_format($escort->price, 0, ',', '.') }}</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label lead">Teléfono:</label>
									<div class="col-sm-9">
										<a href="tel:569{{ $escort->phone }}" class="btn btn-primary btn-lg">
											<i class="ion-ios-telephone"></i> {{ $escort->phone }}
										</a>
									</div>
								</div>

								<blockquote>
									<p>
										{{ nl2br($escort->description) }}
									</p>
								</blockquote>
								<hr>
								<div id="socialShare"></div>
								<hr>

								<div class="form-group">
									<label class="col-sm-3 control-label">Servicios:</label>
									<div class="col-sm-9">
										<p class="form-control-static">{{ implode(', ', $escort->services->lists('name')) }}</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Apariencia:</label>
									<div class="col-sm-9">
										<p class="form-control-static">{{ implode(', ', $escort->appearances->lists('name')) }}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop
@section('styles')
	{{ HTML::style('vendor/magnific-popup/dist/magnific-popup.css') }}
	<style>
	.control-label{text-align: left !important;}
	.form-group{margin-bottom: 0;}
	</style>
@stop
@section('scripts')
	<script>
	var escort = {
		name: '{{ str_replace("'", '"', $escort->name) }}',
		description: '{{ str_replace("'", '"', $escort->description) }}',
		photo_url: '{{ $escort->thumb() }}'
	};
	</script>
	{{ HTML::script('vendor/magnific-popup/dist/jquery.magnific-popup.min.js') }}
	{{ HTML::script('js/chicas/profile.js') }}
@stop

@section('title') {{ $escort->name }} en ChicasBuenas.cl @stop
@section('description') {{ $escort->description }} @stop
@section('image') {{ $escort->thumb() }} @stop

