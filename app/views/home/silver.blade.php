@extends('templates.default')
@section('content')
	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-primary panelEscorts">
				<div class="panel-heading">
					<i class="ion-android-star"></i> Publicaciones Silver
				</div>
				<div class="panel-body">

					<ul class="media-list">
					
						@foreach($escorts_f as $escort)
						<li class="media">
							<div class="media-left">
								<p class="lead">
									{{ HTML::image('img/photo.png', '', ['class'=>'media-object', 'width' => '100px']) }}
								</p>
							</div>
							<div class="media-body">
								<h2 class="media-heading">{{ $escort->name }}</h2>
								<p class="lead">
									Contenido
								</p>
							</div>
						</li>
						@endforeach
						
					</ul>

				</div>
			</div>
		</div>
	</div>
@stop