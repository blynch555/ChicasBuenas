@extends('templates.admin')
@section('content')
	
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<p class="lead"><i class="ion-person-stalker"></i> Escorts Registradas</p>
				</div>
				<table class="table  table-bordered">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nombre</th>
							<th>Categoría</th>
							<th>Ciudad</th>
							<th>Fecha de Registro</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($escorts as $escort)
						<tr id="tr_escort_{{ $escort->id }}" class="@if($escort->status=='Publicada') success @else warning @endif">
							<td>{{ $escort->id }}</td>
							<td>{{ $escort->name }}</td>
							<td>{{ $escort->category }}</td>
							<td>{{ ($escort->district) ? $escort->district->city->name : '' }}</td>
							<td>{{ $escort->created_at->format('d/m/Y H:i') }}</td>
							<td>{{ $escort->status }}</td>
							<td>
								<button class="btn btn-default btn-xs btnSendEmail" data-email="{{ $escort->user->email }}"><i class="ion-ios-email-outline"></i></button>
								<a href="{{ $escort->url() }}" target="_blank" class="btn btn-default btn-xs"><i class="ion-eye"></i></a>
								<button class="btn btn-default btn-xs"><i class="ion-edit"></i></button>
								@if($escort->status=='Borrador')
								<button class="btn btn-default btn-xs btnPublish" data-escort-id="{{ $escort->id }}"><i class="ion-checkmark-circled"></i></button>
								@endif
								<button class="btn btn-danger btn-xs btnDelete" data-escort-id="{{ $escort->id }}"><i class="ion-trash-a"></i></button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="modal fade" id="dlgSendMessage">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="ion-ios-email-outline"></i> Enviar Mensaje</h4>
				</div>
				<div class="modal-body">
					{{ Form::label('email', 'E-mail:', ['class'=>'control-label']) }}
					{{ Form::email('email', '', ['class'=>'form-control']) }}

					{{ Form::label('subject', 'Asunto:', ['class'=>'control-label']) }}
					{{ Form::text('subject', '', ['class'=>'form-control']) }}

					{{ Form::label('body', 'Mensaje:', ['class'=>'control-label']) }}
					{{ Form::textarea('body', '', ['class'=>'form-control', 'rows'=>'10']) }}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
					<button type="button" class="btn btn-primary" id="btnSendMessage">Enviar Mensaje</button>
				</div>
			</div>
		</div>
	</div>
@stop
@section('scripts')
	{{ HTML::script('js/admin/escorts.js') }}
@stop