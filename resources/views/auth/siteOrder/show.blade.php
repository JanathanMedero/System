@extends('layouts.dashboard')

@section('title')
<title>Orden de servicio en sitio: {{ $order->client->name }}</title>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y pt-0">

	@if ($errors->any())
	<div class="alert alert-danger" role="alert">
		<ul class="mb-0">
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

	<div class="row">
		<div class="col d-flex justify-content-end mb-4">
			<a href="{{ route('pdf.serviceOnSite', $order->id) }}" target="_blank" type="button" class="btn rounded-pill btn-danger">
				<span class="tf-icons bx bx-printer"></span>&nbsp; Imprimir orden
			</a>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 mb-4">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-4">
							<div class="row">
								<div class="col-lg-12">
									<h4 class="mb-0"><strong>Orden de servicio: {{ $order->id }}</strong></h4>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 mt-3">
									<h4 class="mb-0"><strong>Cliente: {{ $order->client->name }}</strong></h4>
								</div>
							</div>
						</div>
						<div class="col-lg-8 d-flex align-items-center justify-content-end">
							<div class="row">
								<div class="d-flex justify-content-end">
									<div>

										@if($order->report)

										<button type="button" class="btn rounded-pill btn-warning mx-3" data-bs-toggle="modal" data-bs-target="#report-update">
											<span class="tf-icons bx bx-edit"></span>&nbsp; Editar reporte
										</button>


										<div class="modal fade" id="report-update" tabindex="-1" aria-hidden="true">
											<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel3">Editar reporte</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<form action="{{ route('siteOrder.reportUpdate', $order->id) }}" method="POST">
														@method('PUT')
														@csrf
														<div class="modal-body">
															<div class="row">
																<div class="col mb-3">
																	<label for="report" class="form-label">Reporte técnico</label>
																	<textarea type="text" name="report" id="report" class="form-control" placeholder="Ingrese el reporte técnico." style="resize: none;" rows="3" required>{{ $order->report->report }}</textarea>
																</div>
															</div>


															<div class="row g-2 mt-2">
																<div class="col mb-0">
																	<label for="observations" class="form-label">Observaciones (Opcional)</label>
																	<textarea type="text" name="observations" id="observations" class="form-control" placeholder="Ingrese las observaciones del equipo" style="resize: none;" rows="3">{{ $order->report->observations }}</textarea>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
																Cancelar
															</button>
															<button type="submit" class="btn btn-primary">Guardar</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										@else

										<button type="button" class="btn rounded-pill btn-success mx-3" data-bs-toggle="modal" data-bs-target="#report">
											<span class="tf-icons bx bx-edit"></span>&nbsp; Levantar reporte
										</button>

										<div class="modal fade" id="report" tabindex="-1" aria-hidden="true">
											<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel3">Levantar reporte</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<form action="{{ route('siteOrder.report', $order->id) }}" method="POST">
														@csrf
														<div class="modal-body">
															<div class="row">
																<div class="col mb-3">
																	<label for="report" class="form-label">Reporte técnico</label>
																	<textarea type="text" name="report" id="report" class="form-control" placeholder="Ingrese el reporte técnico." style="resize: none;" rows="3" required>{{ old('report') }}</textarea>
																</div>
															</div>


															<div class="row g-2 mt-2">
																<div class="col mb-0">
																	<label for="observations" class="form-label">Observaciones (Opcional)</label>
																	<textarea type="text" name="observations" id="observations" class="form-control" placeholder="Ingrese las observaciones del equipo" style="resize: none;" rows="3">{{ old('observations') }}</textarea>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
																Cancelar
															</button>
															<button type="submit" class="btn btn-primary">Guardar</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										@endif

										<button type="button" class="btn rounded-pill btn-dark mx-3" data-bs-toggle="modal" data-bs-target="#advance">
											<span class="tf-icons bx bx-dollar"></span>&nbsp; Agregar anticipo
										</button>

										{{-- Modal --}}
										<div class="modal fade" id="advance" tabindex="-1" aria-hidden="true">
											<div class="modal-dialog modal-sm" role="document">
												<form action="{{ route('siteOrder.update.advance', $order->id) }}" method="POST">
													@method('PUT')
													@csrf
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel3">Agregar anticipo</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<div class="row">
																<div class="col-12 mb-3">
																	<label for="quantity" class="form-label">Anticipo</label>
																	<input type="number" min="0" id="quantity" class="form-control" placeholder="Ingrese el anticipo" name="advance" value="{{ $order->advance }}" autofocus />
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-danger" data-bs-dismiss="modal">
																<span class="tf-icons bx bx-x"></span>&nbsp; Cancelar
															</button>

															<button type="submit" class="btn btn-primary">
																<span class="tf-icons bx bx-save"></span>&nbsp; Guardar
															</button>
														</div>
													</div>
												</form>
											</div>
										</div>

										<button type="button" class="btn rounded-pill btn-success" data-bs-toggle="modal" data-bs-target="#add-product">
											<span class="tf-icons bx bx-building-house"></span>&nbsp; Agregar servicio
										</button>

										<div class="modal fade" id="add-product" tabindex="-1" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<form action="{{ route('siteOrder.addService', $order->id) }}" method="POST">
													@csrf
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel1">Agregar servicio</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<div class="row">
																<div class="col mb-3">
																	<label for="name" class="form-label">Nombre del servicio</label>
																	<input type="text" id="name" name="name" class="form-control" placeholder="Ingrese el nombre del servicio" required/>
																</div>
															</div>
															<div class="row g-2">
																<div class="col mb-3">
																	<label class="form-label" for="quantity">Cantidad de servicios</label>
																	<input type="number" min="1" class="form-control" name="quantity" id="quantity" placeholder="Ingrese la cantidad de servicios" value="{{ old('quantity') }}" required>
																</div>
															</div>
															<div class="row">
																<div class="col mb-0">
																	<div class="mb-3 input-group">
																		<label class="form-label" for="net_price">Precio NETO</label>
																		<div class="input-group mt-1">
																			<span class="input-group-text">$</span>
																			<input type="number" min="1" id="net_price" class="form-control" name="net_price" placeholder="Ingrese el precio NETO" value="{{ old('net_price') }}" required>
																			<span class="input-group-text">.00</span>
																		</div>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-lg-12 mt-2">
																	<label for="description" class="form-label">Descripción del servicio</label>
																	<textarea class="form-control" name="description" id="description" rows="5" placeholder="Ingrese la descripción del servicio..." style="resize: none;">{{ old('description') }}</textarea>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
																Cerrar
															</button>
															<button type="submit" class="btn btn-primary">Guadrar servicio</button>
														</div>
													</div>
												</form>
											</div>
										</div>

										<button type="button" class="btn rounded-pill btn-info" data-bs-toggle="modal" data-bs-target="#edit-order">
											<span class="tf-icons bx bx-edit"></span>&nbsp; Editar orden
										</button>

										<div class="modal fade" id="edit-order" tabindex="-1" aria-hidden="true">
											<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel3">Editar orden</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<form action="{{ route('siteOrder.update', $order->id) }}" method="POST">
														@method('PUT')
														@csrf
														<div class="modal-body">
															<div class="row g-2 mt-2">
																<div class="col">
																	<label for="employe_id" class="form-label">Le atendio:</label>
																	<div class="mb-3 input-group">
																		<select class="form-select" id="employe_id" name="employe_id" required>
																			@foreach($employees as $user)
																			<option {{ $order->employe_id == $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
																			@endforeach
																		</select>
																	</div>
																</div>
																<div class="col">
																	<label for="office_id" class="form-label">Seleccione una sucursal:</label>
																	<div class="mb-3 input-group">
																		<select class="form-select" id="office_id" name="office_id" required>
																			<option value="1" {{ $order->office_id == '1' ? 'selected' : '' }} >Sucursal Matriz</option>
																			<option value="2" {{ $order->office_id == '2' ? 'selected' : '' }}>Sucursal Virrey</option>
																		</select>
																	</div>
																</div>
																<div class="row g-2">
																	<div class="col">
																		<label for="date_of_service" class="col-md-12 col-form-label pt-0">Fecha de servicio</label>
																		<div class="mb-3 input-group">
																			<div class="col-md-12">
																				<input class="form-control" type="date" name="date_of_service" id="date_of_service" value="{{ date('Y-m-d', strtotime($order->date_of_service)) }}" required>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row g-2">
																	<div class="col">
																		<label for="observations" class="form-label">Observaciones (Opcional)</label>
																		<textarea class="form-control" name="observations" id="observations" rows="5" placeholder="Ingrese las observaciones..." style="resize: none;">{{ $order->observations }}</textarea>
																	</div>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
																Cancelar
															</button>
															<button type="submit" class="btn btn-primary">Guardar</button>
														</div>
													</form>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<hr class="mb-0">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 mt-4">
							<div class="table-responsive text-nowrap">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Nombre del servicio</th>
											<th>Cantidad</th>
											<th>Precio neto</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
										@forelse($order->services as $service)
										<tr>
											<td><strong>{{ $service->name }}</strong></td>
											<td>{{ $service->quantity }}</td>
											<td>$ {{ $service->net_price }} MN</td>
											<td>
												<div class="row">
													<div class="col-md-6">
														<button type="button" class="btn rounded-pill btn-info" data-bs-toggle="modal" data-bs-target="#edit-service-{{ $service->id }}"><span class="tf-icons bx bx-show"></span>&nbsp;Editar servicio</button>
													</div>

													<div class="modal fade" id="edit-service-{{ $service->id }}" tabindex="-1" aria-hidden="true">
														<div class="modal-dialog" role="document">
															<form action="{{ route('siteOrder.updateService', $service->id) }}" method="POST">
																@method('PUT')
																@csrf
																<div class="modal-content">
																	<div class="modal-header">
																		<h5 class="modal-title" id="exampleModalLabel1">Editar servicio</h5>
																		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																	</div>
																	<div class="modal-body">
																		<div class="row">
																			<div class="col mb-3">
																				<label for="name" class="form-label">Nombre del servicio</label>
																				<input type="text" id="name" name="name" class="form-control" placeholder="Ingrese el nombre del servicio" value="{{ $service->name }}" required/>
																			</div>
																		</div>
																		<div class="row g-2">
																			<div class="col mb-3">
																				<label class="form-label" for="quantity">Cantidad de servicios</label>
																				<input type="number" min="1" class="form-control" name="quantity" id="quantity" placeholder="Ingrese la cantidad de servicios" value="{{ $service->quantity }}" required>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col mb-0">
																				<div class="mb-3 input-group">
																					<label class="form-label" for="net_price">Precio NETO</label>
																					<div class="input-group mt-1">
																						<span class="input-group-text">$</span>
																						<input type="number" min="1" id="net_price" class="form-control" name="net_price" placeholder="Ingrese el precio NETO" value="{{ $service->net_price }}" required>
																						<span class="input-group-text">.00</span>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-lg-12 mt-2">
																				<label for="description" class="form-label">Descripción del servicio</label>
																				<textarea class="form-control" name="description" id="description" rows="5" placeholder="Ingrese la descripción del servicio..." style="resize: none;">{{ $service->description }}</textarea>
																			</div>
																		</div>
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
																			Cerrar
																		</button>
																		<button type="submit" class="btn btn-primary">Guadrar servicio</button>
																	</div>
																</div>
															</form>
														</div>
													</div>

													<div class="col-md-6">
														<form class="form-delete" action="{{ route('siteOrder.destroyService', $service->id) }}" method="POST">
															@method('DELETE')
															@csrf
															<button type="submit" class="btn rounded-pill btn-danger">
																<span class="tf-icons bx bx-trash"></span>&nbsp; Eliminar servicio
															</button>
														</form>
													</div>
												</div>
											</td>
										</tr>
										@empty
										<tr>
											<td colspan="5"><h3 class="mb-0 text-center"><strong>No se encontró ningún servicio</strong></h3></td>
										</tr>
										@endforelse
									</tbody>
								</table>
							</div>
							<div class="row">
								<div class="col-md-12 d-flex justify-content-end mt-4">
									<div class="flex-column">
										@if($order->advance)
										<h5 class="mb-1">Anticipo: <strong style="color: red;">${{ $order->advance }}.00 M.N.</strong></h5>
										@endif
										<h5 class="mb-1">Subtotal: <strong style="color: green;">${{ $subtotal }}.00 M.N.</strong></h5>
										<h5>Venta total: <strong style="color: green;">${{ $total }}.00 M.N.</strong></h5>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@if($order->report)
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							<h3 class="mb-0"><strong>Reporte técnico</strong></h3>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 mt-4">
							<div class="input-group">
								<span class="input-group-text">Reporte técnico</span>
								<textarea class="form-control" aria-label="With textarea" rows="2" style="resize: none;" readonly>{{ $order->report->report }}</textarea>
							</div>
						</div>
						@if($order->report->observations)
						<div class="col-lg-6 mt-4">
							<div class="input-group">
								<span class="input-group-text">Observaciones</span>
								<textarea class="form-control" aria-label="With textarea" rows="2" style="resize: none;" readonly>{{ $order->report->observations }}</textarea>
							</div>
						</div>
						@else
						<div class="col-lg-6 mt-4">
							<div class="input-group">
								<span class="input-group-text">Observaciones</span>
								<textarea class="form-control" aria-label="With textarea" rows="2" style="resize: none;" readonly>No se registraron observaciones</textarea>
							</div>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
	@endif

</div>

@endsection

@section('extra-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script type="text/javascript">
	$('.form-delete').click(function(event) {
		var form =  $(this).closest("form");
		var name = $(this).data("name");
		event.preventDefault();
		swal({
			title: `Esta seguro que desea eliminar este servicio?`,
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