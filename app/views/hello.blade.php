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
						@for($i=0;$i<48;$i++)
						<div class="col-sm-2 escortListItem escortListItemNormal">
							<a href="{{ url('chicas/milena,123') }}" class="icons linkShowEscortProfile" data-escort-id="{{ $i }}">
								<span class="iconShowPreviewProfile"><i class="ion-search"></i></span>
							</a>
							<a href="{{ url('chicas/milena,123') }}" class="linkShowEscortProfile" data-escort-id="{{ $i }}">
								{{ HTML::image('img/photo.png') }}
							</a>
						</div>
						@endfor
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
						@for($i=0;$i<24;$i++)
						<div class="col-sm-4 escortListItem escortListItemNormal">
							<a href="{{ url('chicas/milena,123') }}" class="icons linkShowEscortProfile" data-escort-id="{{ $i }}">
								<span class="iconShowPreviewProfile"><i class="ion-search"></i></span>
							</a>
							<a href="{{ url('chicas/milena,123') }}" class="linkShowEscortProfile" data-escort-id="{{ $i }}">
								{{ HTML::image('img/photo.png') }}
							</a>
						</div>
						@endfor
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
						@for($i=0;$i<24;$i++)
						<div class="col-sm-4 escortListItem escortListItemNormal">
							<a href="{{ url('chicas/milena,123') }}" class="icons linkShowEscortProfile" data-escort-id="{{ $i }}">
								<span class="iconShowPreviewProfile"><i class="ion-search"></i></span>
							</a>
							<a href="{{ url('chicas/milena,123') }}" class="linkShowEscortProfile" data-escort-id="{{ $i }}">
								{{ HTML::image('img/photo.png') }}
							</a>
						</div>
						@endfor
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
					Masajistas Detacadas
				</div>
				<div class="panel-body">
					<div class="row">
						@for($i=0;$i<24;$i++)
						<div class="col-sm-4 escortListItem escortListItemNormal">
							<a href="{{ url('chicas/milena,123') }}" class="icons linkShowEscortProfile" data-escort-id="{{ $i }}">
								<span class="iconShowPreviewProfile"><i class="ion-search"></i></span>
							</a>
							<a href="{{ url('chicas/milena,123') }}" class="linkShowEscortProfile" data-escort-id="{{ $i }}">
								{{ HTML::image('img/photo.png') }}
							</a>
						</div>
						@endfor
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="panel panel-primary panelEscorts">
				<div class="panel-heading">
					Fantasías Destacadas
				</div>
				<div class="panel-body">
					<div class="row">
						@for($i=0;$i<12;$i++)
						<div class="col-sm-4 escortListItem escortListItemNormal">
							<a href="{{ url('chicas/milena,123') }}" class="icons linkShowEscortProfile" data-escort-id="{{ $i }}">
								<span class="iconShowPreviewProfile"><i class="ion-search"></i></span>
							</a>
							<a href="{{ url('chicas/milena,123') }}" class="linkShowEscortProfile" data-escort-id="{{ $i }}">
								{{ HTML::image('img/photo.png') }}
							</a>
						</div>
						@endfor
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="panel panel-primary panelEscorts">
				<div class="panel-heading">
					Maduritas Destacadas
				</div>
				<div class="panel-body">
					<div class="row">
						@for($i=0;$i<24;$i++)
						<div class="col-sm-4 escortListItem escortListItemNormal">
							<a href="{{ url('chicas/milena,123') }}" class="icons linkShowEscortProfile" data-escort-id="{{ $i }}">
								<span class="iconShowPreviewProfile"><i class="ion-search"></i></span>
							</a>
							<a href="{{ url('chicas/milena,123') }}" class="linkShowEscortProfile" data-escort-id="{{ $i }}">
								{{ HTML::image('img/photo.png') }}
							</a>
						</div>
						@endfor
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="panel panel-primary panelEscorts">
				<div class="panel-heading">
					Travestis Destacados
				</div>
				<div class="panel-body">
					<div class="row">
						@for($i=0;$i<24;$i++)
						<div class="col-sm-4 escortListItem escortListItemNormal">
							<a href="{{ url('chicas/milena,123') }}" class="icons linkShowEscortProfile" data-escort-id="{{ $i }}">
								<span class="iconShowPreviewProfile"><i class="ion-search"></i></span>
							</a>
							<a href="{{ url('chicas/milena,123') }}" class="linkShowEscortProfile" data-escort-id="{{ $i }}">
								{{ HTML::image('img/photo.png') }}
							</a>
						</div>
						@endfor
					</div>
				</div>
			</div>
		</div>
	</div>

@stop