@extends('layouts.dashboard')

@section('title')
<title>Tabla de empleados de Pyscom</title>
@endsection

@section('content')

<!-- Bordered Table -->
<div class="card">
	<div class="row">
		<div class="col-12 col-sm-6 d-sm-none">
			<h4 class="mt-4 text-center mb-0"><strong>Tabla de empleados</strong></h4>
		</div>
		<div class="col-sm-6 mt-2 d-none d-sm-block d-flex align-items-center">
			<h4 class="mt-4 mx-4 mb-0"><strong>Tabla de empleados</strong></h4>
		</div>
		@if(Auth::user()->role->id == 1)
		<div class="col-12 col-sm-6 mt-4 d-grid d-sm-none">
			<button class="btn btn-success mx-4" data-bs-toggle="modal" data-bs-target="#modalCenter">Nuevo empleado</button>
		</div>
		<div class="col-sm-6 mt-4 d-none d-sm-block">
			<div class="d-flex justify-content-end">
				<button class="btn btn-success mx-4" data-bs-toggle="modal" data-bs-target="#modalCenter">Nuevo empleado</button>
			</div>
		</div>
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
								<div class="col-12 mb-3">
									<label for="name" class="form-label">Nombre</label>
									<input type="text" id="name" name="name" class="form-control" placeholder="Ingrese el nombre" required />
								</div>
							</div>
							<div class="row g-2 mb-3">
								<div class="col-12 mb-0">
									<label for="email" class="form-label">Correo electrónico</label>
									<input type="email" id="email" name="email" class="form-control" placeholder="Ingrese el correo electrónico" required />
								</div>
								<div class="col-12 mb-0 form-password-toggle">
									<label class="form-label" for="password">Contraseña</label>
									<div class="input-group input-group-merge">
										<input type="password" id="password" class="form-control" name="password"
										placeholder="Ingresa la contraseña" aria-describedby="password" required value="{{ old('password') }}" />
										<span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="mb-3">
									<label for="rol" class="form-label">Asigne un rol para el empleado</label>
									<select class="form-select" id="rol" aria-label="Default select example" name="rol_id" required>
										<option disabled selected value="">Seleccione una de las opciones</option>
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
					@forelse($employees as $user)
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
								<div class="d-flex">
									@if(Auth::user()->role->id == 1 || $user->id == Auth::user()->id )
									<div class="mx-2">
										<button type="button" class="btn rounded-pill btn-info" data-bs-toggle="modal" data-bs-target="#modalCenter-{{ $user->id }}">Editar</button>
									</div>

									@endif
									@if(Auth::user()->role->id == 1)
									@if($user->confirmed == 1)
									<div>
										<form action="{{ route('employe.suspend', $user->id) }}" method="POST">
											@csrf
											@method('PUT')
											<button type="submit" class="btn rounded-pill btn-danger show_confirm">Suspender</button>
										</form>
									</div>
									@else
									<div>
										<form action="{{ route('employe.suspend', $user->id) }}" method="POST">
											@csrf
											@method('PUT')
											<button type="submit" class="btn rounded-pill btn-success show_active">Activar</button>
										</form>
									</div>
									@endif
									@endif
								</div>
							</td>


							

							<div class="modal fade" id="modalCenter-{{ $user->id }}" tabindex="-1" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="modalCenterTitle"><strong>{{ $user->name }}</strong></h5>
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

						</tr>
						@empty
						<tr>
							<td colspan="4"><h3 class="mb-0 text-center"><strong>No se encontró ningún empleado</strong></h3></td>
						</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
		<div class="row d-none d-md-block">
			<div class="col-lg-12 d-flex justify-content-end">
				{{ $employees->links('vendor.pagination.pagination') }}
			</div>
		</div>
		<div class="row d-block d-md-none">
			<div class="col-lg-12 d-flex justify-content-end">
				{{ $employees->links('vendor.pagination.pagination-responsive') }}
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
				title: `Esta seguro que desea suspender la cuenta de este empleado?`,
				text: "Esta acción no le permitirá acceder al sistema",
				icon: "warning",
				buttons: true,
				dangerMode: true,
				buttons: ["Cancelar", "Si, Suspender"],
			})
			.then((willDelete) => {
				if (willDelete) {
					form.submit();
				}
			});
		});
	</script>

	<script type="text/javascript">
		$('.show_active').click(function(event) {
			var form =  $(this).closest("form");
			var name = $(this).data("name");
			event.preventDefault();
			swal({
				title: `Esta seguro que desea reactivar la cuenta de este empleado?`,
				text: "Esta acción ahora le permitirá acceder al sistema",
				icon: "warning",
				buttons: true,
				dangerMode: false,
				buttons: ["Cancelar", "Si, activar"],
			})
			.then((willDelete) => {
				if (willDelete) {
					form.submit();
				}
			});
		});
	</script>

	@endsection