@extends('templates.default')
@section('content')

	<div class="row">
		<div class="col-sm-9">
			<div class="panel panel-primary panelEscorts">
				<div class="panel-heading">
					<i class="ion-android-star"></i> Chicas Destacadas
				</div>
				<div class="panel-body">
				
					<a href="{{ action('CuentaController@getRegistro') }}">
						{{ HTML::image('img/banner700x115.png', 'Registrate', ['style'=>'width: 100%;']) }}
					</a>

					<div class="row">
						@foreach($escorts as $escort)
						<div class="col-sm-2 escortListItem escortListItemNormal">
							<a href="{{ $escort->url() }}" class="icons linkShowEscortProfile" data-escort-id="{{ $escort->id }}">
								<span class="iconShowPreviewProfile"><i class="ion-search"></i></span>
							</a>
							<a href="{{ $escort->url() }}" class="linkShowEscortProfile" data-escort-id="{{ $escort->id }}">
								{{ HTML::image($escort->thumbUrl()) }}
							</a>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-3 text-center">
			<a href="{{ action('CuentaController@getRegistro') }}">
				{{ HTML::image('img/banner280x200.png', 'Registrate', ['style'=>'width: 100%;']) }}
			</a>
			
			<div style="margin-top: 10px;">
				<a class="twitter-timeline" href="https://twitter.com/chicasbuenascl" data-widget-id="547284619255898112">Tweets por el @chicasbuenascl.</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</div>
			<div style="margin-top: 10px;">
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&appId=430700113754492&version=v2.0";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
			</div>
		</div>
	</div>

@stop