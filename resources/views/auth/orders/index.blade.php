@extends('layouts.dashboard')

@section('title')
<title>Tabla de empleados de Pyscom</title>
@endsection

@section('content')

@include('partials.alerts')

<!-- Bordered Table -->
<div class="card">
	<div class="row">
		<div class="col-lg-4">
			<h4 class="mt-4 mx-4 mb-0"><strong>Tabla de empleados</strong></h4>
		</div>
		@if(Auth::user()->role->id == 1)
		<div class="col-lg-8 mt-4 d-flex justify-content-end">
			<button class="btn btn-success mx-4" data-bs-toggle="modal" data-bs-target="#modalCenter">Nuevo empleado</button>

			<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="modalCenterTitle">Ingrese los datos del nuevo empleado</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<form action="{{ route('employe.store') }}" method="POST">
							@csrf
							<div class="modal-body">
								<div class="row">
									<div class="col mb-3">
										<label for="name" class="form-label">Nombre</label>
										<input type="text" id="name" name="name" class="form-control" placeholder="Ingrese el nombre" required />
									</div>
								</div>
								<div class="row g-2 mb-3">
									<div class="col mb-0">
										<label for="email" class="form-label">Correo electrónico</label>
										<input type="email" id="email" name="email" class="form-control" placeholder="Ingrese el correo electrónico" required />
									</div>
									<div class="col mb-0">
										<label for="password" class="form-label">Contraseña</label>
										<input type="password" id="password" name="password" class="form-control" placeholder="Ingrese la contraseña" required minlength="5"/>
									</div>
								</div>
								<div class="row">
									<div class="mb-3">
										<label for="rol" class="form-label">Asigne un rol para el empleado</label>
										<select class="form-select" id="rol" aria-label="Default select example" name="rol_id" required>
											<option selected disabled>Seleccione una de las opciones</option>
											<option value="1">Administrador</option>
											<option value="2">Empleado</option>
										</select>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
								<button type="submit" class="btn btn-primary">Guardar</button>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
		@endif
	</div>
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
									@if(Auth::user()->role->id == 1 || $user->id == Auth::user()->id )
									<div class="col-md-3">
										<button type="button" class="btn rounded-pill btn-info" data-bs-toggle="modal" data-bs-target="#modalCenter-{{ $user->id }}">Editar</button>
									</div>

									<div class="modal fade" id="modalCenter-{{ $user->id }}" tabindex="-1" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="modalCenterTitle">Ingrese los datos del nuevo empleado</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<form action="{{ route('employe.update', $user->id) }}" method="POST">
													@method('PUT')
													@csrf
													<div class="modal-body">
														<div class="row">
															<div class="col mb-3">
																<label for="name" class="form-label">Nombre</label>
																<input type="text" id="name" name="name" class="form-control" placeholder="Ingrese el nombre" value="{{ $user->name }}" required />
															</div>
														</div>
														<div class="row g-2 mb-3">
															<div class="col mb-0">
																<label for="email" class="form-label">Correo electrónico</label>
																<input type="email" id="email" name="email" class="form-control" placeholder="Ingrese el correo electrónico" required value="{{ $user->email }}" />
															</div>
															<div class="col mb-0">
																<label for="password" class="form-label">Ingrese una nueva contraseña (opcional)</label>
																<input type="password" id="password" name="password" class="form-control" placeholder="Ingrese una nueva contraseña si ha olvidado la anterior" minlength="5"/>
															</div>
														</div>
														<div class="row">
															<div class="mb-3">
																<label for="rol" class="form-label">Asigne un rol para el empleado</label>
																<select class="form-select" id="rol" aria-label="Default select example" name="rol_id" required>
																	<option disabled>Seleccione una de las opciones</option>
																	<option {{ $user->role->id == 1 ? 'selected' : '' }} value="1">Administrador</option>
																	<option {{ $user->role->id == 2 ? 'selected' : '' }} value="2">Empleado</option>
																</select>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
														<button type="submit" class="btn btn-primary">Guardar</button>
													</div>
												</form>
											</div>
										</div>
									</div>

									@endif
									@if(Auth::user()->role->id == 1)
									<div class="col-md-6">
										<form action="{{ route('employe.destroy', $user->id) }}" method="POST">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn rounded-pill btn-danger show_confirm">Eliminar</button>
										</form>
									</div>
									@endif
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

	@section('extra-js')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

	<script type="text/javascript">
		$('.show_confirm').click(function(event) {
			var form =  $(this).closest("form");
			var name = $(this).data("name");
			event.preventDefault();
			swal({
				title: `Esta seguro que desea eliminar este empleado?`,
				text: "Esta acción no se puede revertir",
				icon: "warning",
				buttons: true,
				dangerMode: true,
				buttons: ["Cancelar", "Si, Borrar"],
			})
			.then((willDelete) => {
				if (willDelete) {
					form.submit();
				}
			});
		});
	</script>

	@endsection