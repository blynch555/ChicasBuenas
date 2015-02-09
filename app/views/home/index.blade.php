@extends('templates.default')
@section('content')

	<div class="row">
		<div class="col-sm-6">
			<div class="panel panel-primary panelEscorts">
				<div class="panel-heading">
					<i class="ion-android-star"></i> Destacadas VIP
				</div>
				<div class="panel-body">
					<div class="row">
						@foreach($escorts_vip as $escort)
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
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="panel panel-primary panelEscorts">
				<div class="panel-heading">
					<i class="ion-android-star-half"></i> Destacadas Premium
				</div>
				<div class="panel-body">
					<div class="row">
						@foreach($escorts_premium as $escort)
						<div class="col-sm-4 escortListItem escortListItemNormal">
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
		<div class="col-sm-3">
			<div class="panel panel-primary panelEscorts">
				<div class="panel-heading">
					<i class="ion-android-star-outline"></i> Destacadas Gold
				</div>
				<div class="panel-body">
					<div class="row">
						@foreach($escorts_gold as $escort)
						<div class="col-sm-4 escortListItem escortListItemNormal">
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

	<div class="row" style="margin-bottom: 15px;">
		<div class="col-sm-12 text-center">
			<a href="">
				{{ HTML::image('img/banner700x115.png', '', ['style'=>'width: 100%;']) }}
			</a>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-3">
			<div class="panel panel-primary panelEscorts">
				<div class="panel-heading">
					<i class="ion-battery-charging"></i> Masajistas Detacadas
				</div>
				<div class="panel-body">
					<div class="row">
						@foreach($escorts_masajistas as $escort)
						<div class="col-sm-4 escortListItem escortListItemNormal">
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
		<div class="col-sm-3">
			<div class="panel panel-primary panelEscorts">
				<div class="panel-heading">
					<i class="ion-happy-outline"></i> Fantasías Destacadas
				</div>
				<div class="panel-body">
					<div class="row">
						@foreach($escorts_fantasias as $escort)
						<div class="col-sm-4 escortListItem escortListItemNormal">
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
		<div class="col-sm-3">
			<div class="panel panel-primary panelEscorts">
				<div class="panel-heading">
					<i class="ion-wineglass"></i> Maduritas Destacadas
				</div>
				<div class="panel-body">
					<div class="row">
						@foreach($escorts_maduritas as $escort)
						<div class="col-sm-4 escortListItem escortListItemNormal">
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
		<div class="col-sm-3">
			<div class="panel panel-primary panelEscorts">
				<div class="panel-heading">
					<i class="ion-transgender"></i> Travestis Destacados
				</div>
				<div class="panel-body">
					<div class="row">
						@foreach($escorts_travestis as $escort)
						<div class="col-sm-4 escortListItem escortListItemNormal">
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