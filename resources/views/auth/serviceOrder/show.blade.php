@extends('layouts.dashboard')

@section('title')
<title>Orden de servicio: {{ $order->client->name }}</title>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

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
		<div class="col-lg-12 mb-4">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
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
						<div class="col-lg-6 d-flex align-items-center justify-content-end">
							<div class="row">
								<div class="d-flex justify-content-end">
									<div>
										<button type="button" class="btn rounded-pill btn-info mx-3" data-bs-toggle="modal" data-bs-target="#largeModal">
											<span class="tf-icons bx bx-edit"></span>&nbsp; Editar orden
										</button>
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
															<div class="col-6 mb-3">
																<label for="equip" class="form-label">Equipo</label>
																<input type="text" name="equip" id="equip" class="form-control" placeholder="Ejemplo: Gabinete, Monitor, etc." value="{{ $order->service->equip }}" required/>
															</div>
															<div class="col-6 mb-3">
																<label for="brand" class="form-label">Marca</label>
																<input type="text" name="brand" id="brand" class="form-control" placeholder="Ingrese la marca del equipo" value="{{ $order->service->brand }}" required />
															</div>
														</div>
														<div class="row">
															<div class="col-6 mb-3">
																<label for="serie" class="form-label">No. serie o modelo (Opcional)</label>
																<input type="text" name="serie" id="serie" class="form-control" placeholder="Ingrese el modelo o no. de serie del equipo" value="{{ $order->service->serie }}"/>
															</div>
															<div class="col-6 mb-3">
																<label for="accesories" class="form-label">Accesorios (Opcional)</label>
																<input type="text" name="accesories" id="accesories" class="form-control" placeholder="Ingrese los accesorios del equipo" value="{{ $order->service->accesories }}" />
															</div>
														</div>
														<div class="row g-2">
															<div class="col-6 mb-0">
																<label for="features" class="form-label">Características del equipo</label>
																<input type="text" name="features" id="features" class="form-control" placeholder="Ingrese las características del equipo" value="{{ $order->service->features }}" required/>
															</div>
															<div class="col-6 mb-0">
																<label for="failure" class="form-label">Reporte de falla</label>
																<input type="text" name="failure" id="failure" class="form-control" placeholder="Ingrese la falla conocida" value="{{ $order->service->failure }}" required />
															</div>
														</div>
														<div class="row g-2 mt-2">
															<div class="col mb-0">
																<label for="solicited_service" class="form-label">Servicio solicitado</label>
																<input type="text" name="solicited_service" id="solicited_service" class="form-control" placeholder="Ingrese el servicio solicitado" value="{{ $order->service->solicited_service }}" required/>
															</div>
														</div>
														<div class="row g-2 mt-2">
															<div class="col mb-0">
																<label for="observations" class="form-label">Observaciones (Opcional)</label>
																<textarea type="text" name="observations" id="observations" class="form-control" placeholder="Ingrese las observaciones del equipo" style="resize: none;" rows="3">{{ $order->service->observations }}</textarea>
															</div>
														</div>
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

									<div>
										<a href="{{ route('pdf.serviceOrder', $order->id) }}" target="_blank" type="button" class="btn rounded-pill btn-danger">
											<span class="tf-icons bx bx-printer"></span>&nbsp; Imprimir orden
										</a>
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
							<ul>
								<li><p class="mb-1" style="font-size: 16px;"><strong>Equipo: </strong>{{ $order->service->equip }}</p></li>
								<li><p class="mb-1" style="font-size: 16px;"><strong>Modelo o marca: </strong>{{ $order->service->brand }}</p></li>
								<li><p class="mb-1" style="font-size: 16px;"><strong>Características: </strong>{{ $order->service->features }}</p></li>
								@if($order->service->serie)
								<li><p class="mb-1" style="font-size: 16px;"><strong>No. serie: </strong>{{ $order->service->serie }}</p></li>
								@else
								<li><p class="mb-1" style="font-size: 16px;"><strong>No. serie: </strong>No registrado</p></li>
								@endif
								@if($order->service->accesories)
								<li><p class="mb-1" style="font-size: 16px;"><strong>Accesorios: </strong>{{ $order->service->accesories }}</p></li>
								@else
								<li><p class="mb-1" style="font-size: 16px;"><strong>Accesorios: </strong>No se registraron accesorios</p></li>
								@endif
								<li><p class="mb-1" style="font-size: 16px;"><strong>Falla: </strong>{{ $order->service->failure }}</p></li>
								<li><p class="mb-1" style="font-size: 16px;"><strong>Servicio solicitado: </strong>{{ $order->service->solicited_service }}</p></li>
								@if($order->service->observations)
								<li><p class="mb-1" style="font-size: 16px;"><strong>Observaciones: </strong>{{ $order->service->observations }}</p></li>
								@else
								<li><p class="mb-1" style="font-size: 16px;"><strong>Observaciones: </strong>No se registraron observaciones</p></li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

@endsection