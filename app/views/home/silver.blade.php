@extends('templates.default')
@section('content')
	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-primary panelEscorts">
				<div class="panel-heading">
					<i class="ion-heart"></i> Publicaciones Silver
				</div>
				<div class="panel-body">

					<ul class="media-list">
					
						@foreach($escorts_f as $escort)
						<li class="media" style="border-bottom: solid 1px #ff26ff;">
							<div class="media-left">
								<p class="lead">
									{{ HTML::image('http://www.chicaschilenas.cl/images/com_adsmanager/ads/515211a_t.jpg', '', ['class'=>'media-object', 'width' => '100%']) }}

									<a href="tel:77281112" class="btn btn-primary btn-lg btn-block" style="margin-top: 5px;">
										<i class="ion-ios-telephone"></i> 77281112
									</a>
								</p>
							</div>
							<div class="media-body">
								<h2 class="media-heading">PRECIOSA LOLITA CONNY 66908017 SERVICIO COMPLETO</h2>
								<p class="lead">
									bebe bien caliente complaciente cariñosa me encanta que me chupen el anito 
									el chorito con tu lenguita que me hagas chupete me andicho que lo hago bien 
									rico el oral de garganta profunda te encantara estrechica 100% llamame 77281112 
									tambien voy hasta tu domicilio amor tu desides y practico trios centro
								</p>
							</div>
						</li>
						<li class="media" style="border-bottom: solid 1px #ff26ff;">
							<div class="media-left">
								<p class="lead">
									{{ HTML::image('http://www.chicaschilenas.cl/images/com_adsmanager/ads/510378a_t.jpg', '', ['class'=>'media-object', 'width' => '100%']) }}

									<a href="tel:72962908" class="btn btn-primary btn-lg btn-block" style="margin-top: 5px;">
										<i class="ion-ios-telephone"></i> 72962908
									</a>
								</p>
							</div>
							<div class="media-body">
								<h2 class="media-heading">domy flaquita nalgona bien caliente 72962908</h2>
								<p class="lead">
									Si te animas te estaré esperando en mi céntrico, cómodo y discreto departamento 
									a pasos del metro bellas artes<br><br> CUERPESITO DE BARBIE 100%% REAL<br><br>72962908
								</p>
							</div>
						</li>
						@endforeach
						
					</ul>

					<div class="text-center">
						<nav>
							<ul class="pagination">
								<li>
									<a href="#" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
									</a>
								</li>
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li>
									<a href="#" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
									</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
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
							<p class="lead text-center">costo por publicación: $ 1.000.-</p>
						</div>

						{{ Form::submit('Publicar', ['class'=>'btn btn-primary btn-lg btn-block']) }}

					{{ Form::close() }}

				</div>
			</div>
		</div>
	</div>
@stop
@section('styles')
	<style>
		.media-heading{
			color: #d700d7;
		}
	</style>
@stop