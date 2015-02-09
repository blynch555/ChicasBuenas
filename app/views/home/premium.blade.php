@extends('templates.default')
@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary panelEscorts">
				<div class="panel-heading">
					<i class="ion-android-star-half"></i> Chicas Premium
				</div>
				<div class="panel-body">
					<div class="row">
						@foreach($escorts_f as $escort)
						<div class="col-sm-2 escortListItem escortListItemNormal">
							<a href="{{ $escort->url() }}" class="icons linkShowEscortProfile" data-escort-id="{{ $escort->id }}">
								<span class="iconShowPreviewProfile"><i class="ion-search"></i></span>
							</a>
							<a href="{{ $escort->url() }}" class="linkShowEscortProfile" data-escort-id="{{ $escort->id }}">
								{{ HTML::image('img/photo.png') }}
							</a>
						</div>
						@endforeach
					</div>
					<br>
					<div class="row">
						@foreach($escorts as $escort)
						<div class="col-sm-1 escortListItem escortListItemNormal">
							<a href="{{ $escort->url() }}" class="icons linkShowEscortProfile" data-escort-id="{{ $escort->id }}">
								<span class="iconShowPreviewProfile"><i class="ion-search"></i></span>
							</a>
							<a href="{{ $escort->url() }}" class="linkShowEscortProfile" data-escort-id="{{ $escort->id }}">
								{{ HTML::image('img/photo.png') }}
							</a>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
@stop