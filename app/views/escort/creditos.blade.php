@extends('templates.default')
@section('content')
	
	<div class="well" style="min-height: 500px;">	
		@include('escort.menu', ['perfilMenu' => 'creditos'])

		<br>
		<div class="row">
			<div class="col-sm-3">
				<div class="well well-sm">
					<ul class="nav nav-pills nav-stacked" id="navMenu">
						<li role="presentation"><a href="#resume"><i class="ion-social-usd"></i> Resumen de Créditos <i class="ion-ios-arrow-forward pull-right"></i></a></li>
						<li role="presentation" class="active"><a href="#buy"><i class="ion-card"></i> Recargar tus Créditos <i class="ion-ios-arrow-forward pull-right"></i></a></li>
						<li role="presentation"><a href="#history"><i class="ion-clock"></i> Historial <i class="ion-ios-arrow-forward pull-right"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane" id="resume">
						<div class="row">
							<div class="col-sm-4">
								<div class="well text-center">
									<h2>Saldo Total <span style="font-size: 24px;" data-toggle="tooltip" data-placement="top" title="Saldo disponible sumando Crédito Gold con Crédito Silver."><i class="ion-information-circled"></i></span></h2>
									<h1>$ 1.200</h1>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="well text-center">
									<h2>Crédito Gold <span style="font-size: 24px;" data-toggle="tooltip" data-placement="top" title="El <strong>crédito Gold</strong> es aquel que compras, este no tiene fecha de caducidad y puede ser usado tanta veces como quieras."><i class="ion-information-circled"></i></span></h2>
									<h1>$ 300</h1>
									<br>
									<button type="button" class="btn btn-primary btn-lg btn-block"><i class="ion-card"></i> Recargar Créditos</button>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="well text-center">
									<h2>Crédito Silver <span style="font-size: 24px;" data-toggle="tooltip" data-placement="top" title="El <strong>crédito Silver</strong> es aquel que obtienes gratis ya sea por el registro, por interacciones en el portal, por evaluaciones positivas, etc, este tiene fecha de caducidad de 3 semanas a contar de la fecha de obtención y puede ser usado solo una vez al día para cada acción (ej. publicaMe!)."><i class="ion-information-circled"></i></span></h2>
									<h1>$ 900</h1>
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
									<tr>
										<td class="text-center">02/02/2015</td>
										<td>Compra PublicaMe!</td>
										<td class="text-right"> </td>
										<td class="text-right">-100</td>
										<td class="text-right">1.200</td>
									</tr>
									<tr>
										<td class="text-center">02/02/2015</td>
										<td>Compra PublicaMe!</td>
										<td class="text-right">-100</td>
										<td class="text-right"> </td>
										<td class="text-right">1.300</td>
									</tr>
									<tr>
										<td class="text-center">01/02/2015</td>
										<td>Compra PublicaMe!</td>
										<td class="text-right"> </td>
										<td class="text-right">-100</td>
										<td class="text-right">1.300</td>
									</tr>
									<tr>
										<td class="text-center">01/01/2015</td>
										<td>Compra Créditos!</td>
										<td class="text-right"> </td>
										<td class="text-right">+500</td>
										<td class="text-right">1.400</td>
									</tr>
									<tr>
										<td class="text-center">01/02/2015</td>
										<td>Compra PublicaMe!</td>
										<td class="text-right">-100</td>
										<td class="text-right"> </td>
										<td class="text-right">900</td>
									</tr>
									<tr>
										<td class="text-center">31/01/2015</td>
										<td>Recibe Créditos por registro!</td>
										<td class="text-right">+1.000</td>
										<td class="text-right"></td>
										<td class="text-right">1.000</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane active" id="buy">
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

									{{ Form::open() }}

										{{ Form::select('', Utils::getCreditPurchaseOptions()) }}

									{{ Form::close() }}

								</div>
							</div>
							<div class="col-sm-4">
								<div class="well text-center">
									<p class="lead" style="font-size: 24px;">Saldo actual:</p>
									{{ HTML::image('img/money.png') }}
									<h1><i class="ion-social-usd"></i> 1.200</h1>
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