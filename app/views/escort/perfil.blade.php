@extends('templates.default')
@section('content')

	<div class="well">	
		@include('escort.menu', ['perfilMenu' => 'perfil'])

		<br>
		<div class="row">
			<div class="col-sm-3">
				<div class="well well-sm">
					<ul class="nav nav-pills nav-stacked" id="navMenu">
						<li role="presentation" class="active"><a href="#properties"><i class="ion-ios-list-outline"></i> Información <i class="ion-ios-arrow-forward pull-right"></i></a></li>
						<li role="presentation"><a href="#contact"><i class="ion-ios-telephone"></i> Datos de Contacto <i class="ion-ios-arrow-forward pull-right"></i></a></li>
						<li role="presentation"><a href="#photos" id="linkTabPhotos"><i class="ion-images"></i> Fotografías <i class="ion-ios-arrow-forward pull-right"></i></a></li>
						<li role="presentation"><a href="#services"><i class="ion-android-checkbox-outline"></i> Servicios <i class="ion-ios-arrow-forward pull-right"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="properties">
						{{ Form::open(['class'=>'form-horizontal', 'id'=>'frmProperties']) }}
							<fieldset>
								<legend class="text-right">Información</legend>

								<div class="form-group">
									{{ Form::label('name', 'Nombre de fantasía:', ['class'=>'col-sm-3 control-label']) }}
									<div class="col-sm-3">
										{{ Form::text('name', $escort->name, ['class'=>'form-control']) }}
									</div>
								</div>

								<div class="form-group">
									{{ Form::label('birthday', 'Fecha de Nacimiento:', ['class'=>'col-sm-3 control-label']) }}
									<div class="col-sm-6">
										{{ Form::input('date', 'birthday', $escort->birthday, ['class'=>'form-control', 'style'=>'max-width: 150px;']) }}
										<p class="help-block"><i class="ion-information-circled"></i> De 40 años en adelante entra en la categoría Maduritas</p>
									</div>
								</div>

								<div class="form-group">
									{{ Form::label('hourly', 'Horario:', ['class'=>'col-sm-3 control-label']) }}
									<div class="col-sm-3">
										{{ Form::select('hourly', Utils::getSchedules(), $escort->hourly, ['class'=>'form-control']) }}
									</div>
									<div class="col-sm-2 col-lg-1 @if($escort->hourly == 'Full Time') hide @endif" id="dvHourlyTimeBegin">
										{{ Form::select('hourly_time_begin', Utils::getSchedulesTimes(), $escort->hourly_time_begin, ['class'=>'form-control']) }}
									</div>
									<div class="col-sm-2 col-lg-1 @if($escort->hourly == 'Full Time') hide @endif" id="dvHourlyTimeEnd">
										{{ Form::select('hourly_time_end', Utils::getSchedulesTimes(), $escort->hourly_time_end, ['class'=>'form-control']) }}
									</div>
								</div>

								<div class="form-group">
									{{ Form::label('heigth', 'Altura:', ['class'=>'col-sm-3 control-label']) }}
									<div class="col-sm-2">
										{{ Form::select('heigth', Utils::getHeigthList(), $escort->heigth(), ['class'=>'form-control']) }}
									</div>
								</div>

								<div class="form-group">
									{{ Form::label('weight', 'Peso:', ['class'=>'col-sm-3 control-label']) }}
									<div class="col-sm-2 col-lg-1">
										{{ Form::select('weight', Utils::getWeightList(), $escort->weight, ['class'=>'form-control']) }}
									</div>
								</div>

								<div class="form-group">
									{{ Form::label('busts', 'Medidas (cm):', ['class'=>'col-sm-3 control-label']) }}
									<div class="col-sm-1">
										{{ Form::select('busts', Utils::getBustsList(), $escort->busts, ['class'=>'form-control']) }}
									</div>
									<div class="col-sm-1">
										{{ Form::select('waist', Utils::getWaistList(), $escort->waist, ['class'=>'form-control']) }}
									</div>
									<div class="col-sm-1">
										{{ Form::select('hip', Utils::getHipList(), $escort->hip, ['class'=>'form-control']) }}
									</div>
								</div>

								<div class="form-group">
									{{ Form::label('waxing_id', 'Depilación:', ['class'=>'col-sm-3 control-label']) }}
									<div class="col-sm-2">
										{{ Form::select('waxing_id', Waxing::lists('name', 'id'), $escort->waxing_id, ['class'=>'form-control']) }}
									</div>
								</div>

								<div class="form-group">
									{{ Form::label('at_apartment', 'Atiende...:', ['class'=>'col-sm-3 control-label']) }}
									<div class="col-sm-4">
										<div class="checkbox"><label>{{ Form::checkbox('at_apartment', 'Si', ($escort->at_apartment == 'Si')) }} En departamento propio</label></div>
										<div class="checkbox"><label>{{ Form::checkbox('at_hotel', 'Si', ($escort->at_hotel == 'Si')) }} En hoteles</label></div>
										<div class="checkbox"><label>{{ Form::checkbox('at_home', 'Si', ($escort->at_home == 'Si')) }} A domicilio</label></div>
										<div class="checkbox"><label>{{ Form::checkbox('at_travel', 'Si', ($escort->at_travel == 'Si')) }} Para Viajes</label></div>
									</div>
								</div>

								<div class="form-group">
									{{ Form::label('appearance', 'Apariencia:', ['class'=>'col-sm-3 control-label']) }}
									<div class="col-sm-4">
										@foreach(Appearance::orderBy('name')->get() as $appearance)
										<div class="checkbox"><label>{{ Form::checkbox('appearance[]', $appearance->id, in_array($appearance->id, $escort->appearances->lists('id'))) }} {{ $appearance->name }}</label></div>
										@endforeach
									</div>
								</div>

								<div class="form-group">
									{{ Form::label('service_type_id', 'Tipo de Servicio:', ['class'=>'col-sm-3 control-label']) }}
									<div class="col-sm-6">
										{{ Form::select('service_type_id', ServiceType::lists('name', 'id'), $escort->service_type_id, ['class'=>'form-control']) }}
									</div>
								</div>
								
								<div class="form-group">
									{{ Form::label('price', 'Precio (x hora):', ['class'=>'col-sm-3 control-label']) }}
									<div class="col-sm-6">
										{{ Form::number('price', number_format($escort->price, 0), ['class'=>'form-control input-lg text-right', 'step'=>'10000', 'min'=>10000, 'max'=>'1000000', 'pattern'=>'\d*', 'style'=>'max-width: 150px;']) }}
										<p class="help-block">
											<i class="ion-information-circled"></i> Según el precio se define la categoría:<br>
											&lt; 45 mil = <strong>Gold</strong><br>
											&gt;= 45 mil y &lt; 70 mil = <strong>Premium</strong><br>
											&gt; 70 mil = <strong>VIP</strong><br>
											* si es mayor a 40 años se considera <strong>Madurita</strong>
										</p>
									</div>
								</div>

								<div class="form-group">
									{{ Form::label('nationality_id', 'Nacionalidad:', ['class'=>'col-sm-3 control-label']) }}
									<div class="col-sm-2">
										{{ Form::select('nationality_id', Nationality::lists('name', 'id'), $escort->nationality_id, ['class'=>'form-control']) }}
									</div>
								</div>

								<div class="form-group">
									{{ Form::label('description', 'Presentación:', ['class'=>'col-sm-3 control-label']) }}
									<div class="col-sm-6">
										{{ Form::textarea('description', $escort->description, ['class'=>'form-control']) }}
									</div>
								</div>
								<hr>

								<div class="col-sm-6 col-sm-offset-3">
									<button type="button" id="btnSaveProperties" class="btn btn-primary btn-lg btn-block"><i class="ion-checkmark-circled"></i> Guardar cambios</button>
								</div>
							</fieldset>

						{{ Form::close() }}
					</div>
					<div role="tabpanel" class="tab-pane" id="contact">
						{{ Form::open(['class'=>'form-horizontal', 'id'=>'frmContact']) }}
							<fieldset>
								<legend class="text-right">Datos de Contacto</legend>

								<div class="form-group">
									{{ Form::label('phone', 'Teléfono:', ['class'=>'col-sm-3 control-label']) }}
									<div class="col-sm-3">
										{{ Form::text('phone', $escort->phone, ['class'=>'form-control']) }}
									</div>
								</div>

								<div class="form-group">
									{{ Form::label('district_id', 'Comuna:', ['class'=>'col-sm-3 control-label']) }}
									<div class="col-sm-6">
										{{ Form::select('district_id', District::orderBy('name')->lists('name', 'id'), $escort->district_id, ['class'=>'form-control']) }}
									</div>
								</div>
								<hr>

								<div class="col-sm-6 col-sm-offset-3">
									<button type="button" id="btnSaveContact" class="btn btn-primary btn-lg btn-block"><i class="ion-checkmark-circled"></i> Guardar cambios</button>
								</div>

							</fieldset>
						{{ Form::close() }}
					</div>
					<div role="tabpanel" class="tab-pane" id="photos">
						<fieldset>
							<legend class="text-right">Fotografías</legend>

							<div class="row" id="escortPhotos">
								@if($escort->photos->count() < 10)
								<div class="col-sm-2">
									{{ Form::open(['files' => true, 'action' => 'EscortController@postSubirFotografias', 'class'=>'form-inline']) }}
									<div class="photoContainer">
										<a href="javascript:;" onclick="$('#fileUpload').trigger('click');">
											{{ HTML::image('img/addphoto.jpg', $escort->name, ['class'=>'img-thumbnail', 'width'=>'100%']) }}
										</a>

										{{ Form::file('photo', ['style'=>'margin-bottom: 10px; display: none;', 'accept'=>'image/*', 'id'=>'fileUpload', 'required' => 'required']) }}
									</div>
									{{ Form::submit('Subir Fotografía', ['class'=>'btn btn-primary btn-block']) }}
									{{ Form::close() }}
								</div>
								@endif

								@foreach($escort->photos as $photo)
								<div class="col-sm-2" id="{{ str_replace('.jpeg', '', $photo->filename) }}">
									<div class="photoContainer">
										<a href="{{ $photo->largeUrl() }}" class="escortPhoto">{{ HTML::image($photo->mediumUrl(), $escort->name, ['class'=>'img-thumbnail', 'width'=>'100%']) }}</a>
									</div>
									<button type="button" class="btn btn-default btn-block btnSetProfilePhoto" data-image-name="{{ $photo->filename }}">Foto Principal</button>
									<button type="button" class="btn btn-danger btn-block btnDeletePhoto" data-image-name="{{ $photo->filename }}"><i class="ion-close-circled"></i> Eliminar</button>
								</div>
								@endforeach
							</div>
						</fieldset>
					</div>
					<div role="tabpanel" class="tab-pane" id="services">
						{{ Form::open(['class'=>'form-horizontal', 'id'=>'frmServices']) }}
							<fieldset>
								<legend class="text-right">Servicios</legend>
								<div class="form-group">
									{{ Form::label('services', 'Apariencia:', ['class'=>'col-sm-3 control-label']) }}
									<div class="col-sm-4">
										@foreach(Service::orderBy('name')->get() as $service)
										<div class="checkbox"><label>{{ Form::checkbox('service[]', $service->id, in_array($service->id, $escort->services->lists('id'))) }} {{ $service->name }}</label></div>
										@endforeach
									</div>
								</div>
								<hr>

								<div class="col-sm-6 col-sm-offset-3">
									<button type="button" id="btnSaveServices" class="btn btn-primary btn-lg btn-block"><i class="ion-checkmark-circled"></i> Guardar cambios</button>
								</div>

							</fieldset>
						{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
	</div>

@stop
@section('styles')
	{{ HTML::style('vendor/magnific-popup/dist/magnific-popup.css') }}
	{{ HTML::style('vendor/select2/css/select2.min.css') }}

	<style>
		@media (min-width: 768px) {
			.photoContainer{
				min-height: 145px;
			}
		}
		@media (min-width: 1200px) {
			.photoContainer{
				min-height: 175px;
			}
		}
	</style>
@stop
@section('scripts')
	{{ HTML::script('vendor/magnific-popup/dist/jquery.magnific-popup.min.js') }}

	{{ HTML::script('vendor/jquery-file-upload/js/vendor/jquery.ui.widget.js') }}
	{{ HTML::script('vendor/jquery-file-upload/js/jquery.iframe-transport.js') }}
	{{ HTML::script('vendor/jquery-file-upload/js/jquery.fileupload.js') }}
	{{ HTML::script('vendor/noty/packaged/jquery.noty.packaged.min.js') }}
	{{ HTML::script('vendor/select2/js/select2.full.min.js') }}
	{{ HTML::script('js/escort/perfil.js') }}

	@if(Session::has('uploadedPhotos'))
	<script>
	$(function(){
		$("#linkTabPhotos").trigger('click');

		@if(Session::has('uploadedPhotos', false) === true)
			var n = noty({
	            text: 'La Fotografía fue cargada correctamente!',
	            type: 'success',
	            timeout: 2000
	        });
	    @else
	    	var n = noty({
	            text: 'La fotografía no pudo ser cargada',
	            type: 'error',
	            timeout: 2000
	        });
	    @endif
	});
	</script>
	@endif
@stop