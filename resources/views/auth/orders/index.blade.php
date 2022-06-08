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
					<tr>
						<td>
							<i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong>
						</td>
						<td>Albert Cook</td>
						<td><span class="badge bg-label-primary me-1">Active</span></td>
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
				</tbody>
			</table>
		</div>
	</div>
</div>
<!--/ Bordered Table -->
@endsection