@extends('templates.admin')
@section('content')
	
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<p class="lead"><i class="ion-person-stalker"></i> Usuarios Registrados</p>
				</div>
				<table class="table  table-bordered">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nombre</th>
							<th>Usuario</th>
							<th>Email</th>
							<th>Perfil</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->username }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->profile }}</td>
							<td>{{ $user->status }}</td>
							<td>
								<button class="btn btn-danger btn-xs"><i class="ion-trash-a"></i></button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@stop