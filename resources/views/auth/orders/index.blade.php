@extends('layouts.dashboard')

@section('title')
<title>Tabla de empleados de Pyscom</title>
@endsection

@section('content')
<!-- Bordered Table -->
<div class="card">
	<h5 class="card-header">Tabla de empleados</h5>
	<div class="card-body">
		<div class="table-responsive text-nowrap">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Correo electrónico</th>
						<th>Rol del empleado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($employees as $user)
					<tr>
						<td>
							<strong>{{ $user->name }}</strong>
						</td>
						<td>{{ $user->email }}</td>
						<td>
							@if($user->role->id == 1)
							<span class="badge bg-label-success me-1">{{ $user->role->role }}</span></td>
							@else
							<span class="badge bg-label-primary me-1">{{ $user->role->role }}</span></td>
							@endif
						<td>
							<div class="row">
								<div class="col-md-3">
									<button type="button" class="btn rounded-pill btn-info">Editar</button>
								</div>
								<div class="col-md-6">
									<button type="button" class="btn rounded-pill btn-danger">Eliminar</button>
								</div>
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 d-flex justify-content-end">
			{{ $employees->links('vendor.pagination.custom_pagination') }}
		</div>
	</div>
</div>
<!--/ Bordered Table -->
@endsection