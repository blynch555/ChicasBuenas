@extends('templates.default')
@section('content')
	
	<div class="well" style="min-height: 500px;">	
		@include('escort.menu', ['perfilMenu' => 'creditos'])

		<br>
		<div class="row">
			<div class="col-sm-3">
				<div class="well well-sm">
					<ul class="nav nav-pills nav-stacked" id="navMenu">
						<li role="presentation" class="active"><a href="#resume"><i class="ion-social-usd"></i> Resumen de Créditos <i class="ion-ios-arrow-forward pull-right"></i></a></li>
						<li role="presentation"><a href="#buy" id="linkToBuyTab"><i class="ion-card"></i> Recargar tus Créditos <i class="ion-ios-arrow-forward pull-right"></i></a></li>
						<li role="presentation"><a href="#history"><i class="ion-clock"></i> Historial <i class="ion-ios-arrow-forward pull-right"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="resume">
						<div class="row">
							<div class="col-sm-4">
								<div class="well text-center">
									<h2>Saldo Total <span style="font-size: 24px;" data-toggle="tooltip" data-placement="top" title="Saldo disponible sumando Crédito Gold con Crédito Silver."><i class="ion-information-circled"></i></span></h2>
									<h1>$ {{ number_format($escort->creditsTotal(), 0, ',', '.') }}</h1>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="well text-center">
									<h2>Crédito Gold <span style="font-size: 24px;" data-toggle="tooltip" data-placement="top" title="El <strong>crédito Gold</strong> es aquel que compras, este no tiene fecha de caducidad y puede ser usado tanta veces como quieras."><i class="ion-information-circled"></i></span></h2>
									<h1>$ {{ number_format($escort->creditsGoldTotal(), 0, ',', '.') }}</h1>
									<br>
									<button type="button" class="btn btn-primary btn-lg btn-block" onclick="$('#linkToBuyTab').trigger('click');"><i class="ion-card"></i> Recargar Créditos</button>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="well text-center">
									<h2>Crédito Silver <span style="font-size: 24px;" data-toggle="tooltip" data-placement="top" title="El <strong>crédito Silver</strong> es aquel que obtienes gratis ya sea por el registro, por interacciones en el portal, por evaluaciones positivas, etc, este tiene fecha de caducidad de 3 semanas a contar de la fecha de obtención y puede ser usado solo una vez al día para cada acción (ej. publicaMe!)."><i class="ion-information-circled"></i></span></h2>
									<h1>$ {{ number_format($escort->creditsSilverTotal(), 0, ',', '.') }}</h1>
								</div>
							</div>
						</div>
						<br>

						<div class="panel panel-primary">
							<div class="panel-heading">
								<i class="ion-clock"></i> Últimos 10 Movimientos
							</div>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th class="text-center">Fecha</th>
										<th>Detalle</th>
										<th class="text-right">Silver</th>
										<th class="text-right">Gold</th>
										<th class="text-right">Saldo</th>
									</tr>
								</thead>
								<tbody>
									@foreach($escort->histories as $history)
									<tr>
										<td class="text-center">{{ date('d/m/Y H:i', strtotime($transaction->purchase_date)) }}</td>
										<td>{{ $transaction->description }}</td>
										<td class="text-right"> </td>
										<td class="text-right">+ {{ $transaction->credits }}</td>
										<td class="text-right">1.200</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="buy">
						<h2>¡Llega a más clientes con tus créditos!</h2>
						<p class="lead">
							Aparece en el centro de atención facilmente con tus créditos ChicasBuenas y
							llega a miles de clientes rapidamente...
						</p>

						<div class="row">
							<div class="col-sm-8">
								<div class="well">
									<p class="lead" style="font-size: 24px;">Recargar tus Créditos:</p>
									<p class="lead">¡Recárgalos ahora! Cuantos más créditos compres, más baratos te saldrán:</p>

									{{ Form::open(['action' => 'EscortController@postRecargarCreditos']) }}

										@if(Session::has('recargaFallida'))
										<div class="alert alert-danger">
											<p class="lead"><i class="ion-alert-circled"></i> La recarga fue cancelada o rechazada.</p>
										</div>
										@endif

										@if(Session::has('recargaExitosa'))
										<div class="alert alert-success">
											<p class="lead"><i class="ion-checkmark-circled"></i> La recarga fue realizada correctamente!</p>
										</div>
										@endif
										

										{{ Form::select('amount', Utils::getCreditPurchaseOptions(), '', ['class'=>'form-control input-lg']) }}
										<br>
										{{ Form::submit('Recargar ahora', ['class'=>'btn btn-primary btn-lg btn-block']) }}

									{{ Form::close() }}

								</div>
							</div>
							<div class="col-sm-4">
								<div class="well text-center">
									<p class="lead" style="font-size: 24px;">Saldo actual:</p>
									{{ HTML::image('img/money.png') }}
									<h1><i class="ion-social-usd"></i> {{ number_format($escort->creditsTotal(), 0, ',', '.') }}</h1>
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

@stop
@section('scripts')
	{{ HTML::script('vendor/noty/packaged/jquery.noty.packaged.min.js') }}
	{{ HTML::script('js/escort/creditos.js') }}
@stop