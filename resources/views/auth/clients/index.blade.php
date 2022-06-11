@extends('layouts.dashboard')

@section('title')
<title>Tabla de clientes de Pyscom</title>
@endsection

@section('content')

<!-- Bordered Table -->
<div class="card">
	<div class="row">
		<div class="col-lg-4">
			<h4 class="mt-4 mx-4 mb-0"><strong>Tabla de clientes</strong></h4>
		</div>
		<div class="col-lg-8 mt-4 d-flex justify-content-end">
			<button class="btn btn-success mx-4" data-bs-toggle="modal" data-bs-target="#modalCenter">Nuevo cliente</button>

			<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="modalCenterTitle">Ingrese los datos del cliente</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<form action="{{ route('client.store') }}" method="POST">
							@csrf
							<div class="modal-body">
								<div class="row">
									<div class="col mb-3">
										<label for="name" class="form-label">Nombre Completo</label>
										<input type="text" id="name" name="name" class="form-control" placeholder="Ingrese el nombre del cliente" required minlength="3" />
									</div>
								</div>
								<div class="row g-2 mb-3">
									<div class="col mb-0">
										<label for="rfc" class="form-label">RFC (Opcional)</label>
										<input type="text" id="rfc" name="rfc" class="form-control" placeholder="Ingrese el RFC del cliente" />
									</div>
									<div class="col mb-0">
										<label for="phone" class="form-label">Telefono (Opcional)</label>
										<input type="number" id="phone" name="phone" class="form-control" placeholder="Ingrese el teléfono del cliente"/>
									</div>
								</div>
								<div class="row g-2 mb-3">
									<div class="col mb-0">
										<label for="street" class="form-label">Calle (Opcional)</label>
										<input type="text" id="street" name="street" class="form-control" placeholder="Ingrese la calle del cliente" />
									</div>
									<div class="col mb-0">
										<label for="number" class="form-label">Número (Opcional)</label>
										<input type="number" id="number" name="number" class="form-control" placeholder="Ingrese el número de casa"/>
									</div>
								</div>
								<div class="row g-2 mb-3">
									<div class="col mb-0">
										<label for="suburb" class="form-label">Colonia (Opcional)</label>
										<input type="text" id="suburb" name="suburb" class="form-control" placeholder="Ingrese la colonia del cliente" />
									</div>
									<div class="col mb-0">
										<label for="cp" class="form-label">Código Postal (Opcional)</label>
										<input type="number" id="cp" name="cp" class="form-control" placeholder="Ingrese el código postal"/>
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

					{{-- foreach --}}

					<tr>
						<td>
							<strong></strong>
						</td>
						<td></td>
						<td></td>
							<td>
								<div class="row">
									@if(Auth::user()->role->id == 1 || $user->id == Auth::user()->id )
									<div class="col-md-3">
										<button type="button" class="btn rounded-pill btn-info" data-bs-toggle="modal" data-bs-target="#modalCenter-">Editar</button>
									</div>

									<div class="modal fade" id="modalCenter-" tabindex="-1" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="modalCenterTitle">Ingrese los datos del nuevo empleado</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<form action="#" method="POST">
													@method('PUT')
													@csrf
													<div class="modal-body">
														<div class="row">
															<div class="col mb-3">
																<label for="name" class="form-label">Nombre</label>
																<input type="text" id="name" name="name" class="form-control" placeholder="Ingrese el nombre" value="" required />
															</div>
														</div>
														<div class="row g-2 mb-3">
															<div class="col mb-0">
																<label for="email" class="form-label">Correo electrónico</label>
																<input type="email" id="email" name="email" class="form-control" placeholder="Ingrese el correo electrónico" required value="" />
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
									@if(Auth::user()->role->id == 1)
									<div class="col-md-6">
										<form action="#" method="POST">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn rounded-pill btn-danger show_confirm">Eliminar</button>
										</form>
									</div>
									@endif
								</div>
							</td>
						</tr>

					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 d-flex justify-content-end">
				{{-- {{ $employees->links('vendor.pagination.custom_pagination') }} --}}
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