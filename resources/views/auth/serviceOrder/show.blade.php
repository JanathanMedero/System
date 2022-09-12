@extends('layouts.dashboard')

@section('title')
<title>Orden de servicio: {{ $order->client->name }}</title>
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
			<a href="{{ route('pdf.serviceOrder', $order->folio) }}" target="_blank" type="button" class="btn rounded-pill btn-danger">
				<span class="tf-icons bx bx-printer"></span>&nbsp; Imprimir orden
			</a>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 mb-4">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-12 col-lg-6 mb-4">
							<div class="row">
								<div class="col-12">
									<h6 class="mb-0 d-block d-sm-none"><strong>Orden de servicio: {{ $order->id }}</strong></h6>
									<h4 class="mb-0 d-none d-sm-block"><strong>Orden de servicio: {{ $order->id }}</strong></h4>
								</div>
							</div>
							<div class="row">
								<div class="col-12 mt-3">
									<h6 class="mb-0 d-block d-sm-none"><strong>Cliente: {{ $order->client->name }}</strong></h6>
									<h4 class="mb-0 d-none d-sm-block"><strong>Cliente: {{ $order->client->name }}</strong></h4>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-6">
							<div class="row">
								<div class="d-flex flex-column flex-sm-row justify-content-center justify-content-md-end">
									@if($order->report)
									<button type="button" class="btn rounded-pill btn-warning" data-bs-toggle="modal" data-bs-target="#report-update">
										<span class="tf-icons bx bx-edit"></span>&nbsp; Editar reporte
									</button>
									<div class="modal fade" id="report-update" tabindex="-1" aria-hidden="true">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel3">Editar reporte</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<form action="{{ route('serviceOrder.reportUpdate', $order->id) }}" method="POST">
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
									<button type="button" class="btn rounded-pill btn-success" data-bs-toggle="modal" data-bs-target="#report">
										<span class="tf-icons bx bx-edit"></span>&nbsp; Levantar reporte
									</button>
									@endif
									<div class="mx-2"></div>
									<button type="button" class="btn rounded-pill btn-info mt-4 mt-sm-0" data-bs-toggle="modal" data-bs-target="#largeModal">
										<span class="tf-icons bx bx-edit"></span>&nbsp; Editar orden
									</button>
									<div class="modal fade" id="report" tabindex="-1" aria-hidden="true">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel3">Levantar reporte</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<form action="{{ route('serviceOrder.report', $order->id) }}" method="POST">
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
									<div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel3">Editar orden</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<form action="{{ route('serviceOrder.update', $order->id) }}" method="POST">
													@method('PUT')
													@csrf
													<div class="modal-body">
														<div class="row">
															<div class="col-12 col-lg-6 mb-3">
																<label for="equip" class="form-label">Equipo</label>
																<input type="text" name="equip" id="equip" class="form-control" placeholder="Ejemplo: Gabinete, Monitor, etc." value="{{ $order->service->equip }}" required/>
															</div>
															<div class="col-12 col-lg-6 mb-3">
																<label for="brand" class="form-label">Marca</label>
																<input type="text" name="brand" id="brand" class="form-control" placeholder="Ingrese la marca del equipo" value="{{ $order->service->brand }}" required />
															</div>
														</div>
														<div class="row">
															<div class="col-12 col-lg-6 mb-3">
																<label for="serie" class="form-label">No. serie o modelo (Opcional)</label>
																<input type="text" name="serie" id="serie" class="form-control" placeholder="Ingrese el modelo o no. de serie del equipo" value="{{ $order->service->serie }}"/>
															</div>
															<div class="col-12 col-lg-6 mb-3">
																<label for="accesories" class="form-label">Accesorios (Opcional)</label>
																<input type="text" name="accesories" id="accesories" class="form-control" placeholder="Ingrese los accesorios del equipo" value="{{ $order->service->accesories }}" />
															</div>
														</div>
														<div class="row">
															<div class="col-12 mb-3">
																<label for="features" class="form-label">Características del equipo</label>
																<input type="text" name="features" id="features" class="form-control" placeholder="Ingrese las características del equipo" value="{{ $order->service->features }}" required/>
															</div>
															<div class="col-12 mb-3">
																<label for="failure" class="form-label">Reporte de falla</label>
																<input type="text" name="failure" id="failure" class="form-control" placeholder="Ingrese la falla conocida" value="{{ $order->service->failure }}" required />
															</div>
														</div>
														<div class="row">
															<div class="col-12 mb-3">
																<label for="solicited_service" class="form-label">Servicio solicitado</label>
																<input type="text" name="solicited_service" id="solicited_service" class="form-control" placeholder="Ingrese el servicio solicitado" value="{{ $order->service->solicited_service }}" required/>
															</div>
														</div>
														<div class="row">
															<div class="col-12 mb-3">
																<label for="observations" class="form-label">Observaciones (Opcional)</label>
																<textarea type="text" name="observations" id="observations" class="form-control" placeholder="Ingrese las observaciones del equipo" style="resize: none;" rows="3">{{ $order->service->observations }}</textarea>
															</div>
														</div>
														<div class="row">
															<div class="col-12 col-lg-6">
																<label for="employe_id" class="form-label">Le atendio:</label>
																<div class="mb-3 input-group">
																	<select class="form-select" id="employe_id" name="employe_id" required>
																		@foreach($employees as $user)
																		<option {{ $order->employe_id == $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
																		@endforeach
																	</select>
																</div>
															</div>
															<div class="col-12 col-lg-6">
																<label for="office_id" class="form-label">Seleccione una sucursal:</label>
																<div class="mb-3 input-group">
																	<select class="form-select" id="office_id" name="office_id" required>
																		<option value="1" {{ $order->office_id == '1' ? 'selected' : '' }} >Sucursal Matriz</option>
																		<option value="2" {{ $order->office_id == '2' ? 'selected' : '' }}>Sucursal Virrey</option>
																	</select>
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
					<div class="row">
						<div class="col-lg-6">
							<div class="demo-inline-spacing mt-4">
								<ul class="list-group">
									<li class="list-group-item d-flex align-items-center">
										<i class="bx bx-laptop me-2"></i>
										<p class="mb-0"><strong>Equipo:</strong> {{ $order->service->equip }}</p>
									</li>
									<li class="list-group-item d-flex align-items-center">
										<i class="bx bx-at me-2"></i>
										<p class="mb-0"><strong>Modelo o marca:</strong> {{ $order->service->brand }}</p>
									</li>
									<li class="list-group-item d-flex align-items-center">
										<i class="bx bx-receipt me-2"></i>
										<p class="mb-0"><strong>Características:</strong> {{ $order->service->features }}</p>
									</li>

									@if($order->service->serie)
									<li class="list-group-item d-flex align-items-center">
										<i class="bx bx-barcode me-2"></i>
										<p class="mb-0"><strong>No. de serie:</strong> {{ $order->service->serie }}</p>
									</li>
									@else
									<li class="list-group-item d-flex align-items-center">
										<i class="bx bx-barcode me-2"></i>
										<p class="mb-0"><strong>No. de serie:</strong> No registrado</p>
									</li>
									@endif
								</ul>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="demo-inline-spacing mt-4">
								<ul class="list-group">
									@if($order->service->accesories)
									<li class="list-group-item d-flex align-items-center">
										<i class="bx bx-plug me-2"></i>
										<p class="mb-0"><strong>Accesorios:</strong> {{ $order->service->accesories }}</p>
									</li>
									@else
									<li class="list-group-item d-flex align-items-center">
										<i class="bx bx-plug me-2"></i>
										<p class="mb-0"><strong>Accesorios:</strong> No registrado</p>
									</li>
									@endif
									<li class="list-group-item d-flex align-items-center">
										<i class="bx bx-x-circle me-2"></i>
										<p class="mb-0"><strong>Falla:</strong> {{ $order->service->failure }}</p>
									</li>
									<li class="list-group-item d-flex align-items-center">
										<i class="bx bx-flag me-2"></i>
										<p class="mb-0"><strong>Servicio solicitado:</strong> {{ $order->service->solicited_service }}</p>
									</li>

									@if($order->service->observations)
									<li class="list-group-item d-flex align-items-center">
										<i class="bx bx-show-alt me-2"></i>
										<p class="mb-0"><strong>Observaciones:</strong> {{ $order->service->observations }}</p>
									</li>
									@else
									<li class="list-group-item d-flex align-items-center">
										<i class="bx bx-show-alt me-2"></i>
										<p class="mb-0"><strong>Observaciones:</strong> No registrado</p>
									</li>
									@endif
								</ul>
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