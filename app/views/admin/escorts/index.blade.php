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
						<tr id="tr_escort_{{ $escort->id }}">
							<td>{{ $escort->id }}</td>
							<td>{{ $escort->name }}</td>
							<td>{{ $escort->category }}</td>
							<td>{{ ($escort->district) ? $escort->district->city->name : '' }}</td>
							<td>{{ $escort->created_at->format('d/m/Y H:i') }}</td>
							<td>{{ $escort->status</td>
							<td>
								<button class="btn btn-default btn-xs"><i class="ion-edit"></i></button>
								<button class="btn btn-danger btn-xs btnDelete" data-escort-id="{{ $escort->id }}"><i class="ion-trash-a"></i></button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@stop
@section('scripts')
	{{ HTML::script('js/admin/escorts.js') }}
@stop