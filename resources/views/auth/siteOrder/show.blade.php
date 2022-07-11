@extends('layouts.dashboard')

@section('title')
<title>Orden de servicio en sitio: {{ $order->client->name }}</title>
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
																	<input type="number" min="0" id="quantity" class="form-control" placeholder="Ingrese el anticipo" name="advance" value="{{ $order->advance }}" />
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

										<button type="button" class="btn rounded-pill btn-info mx-3" data-bs-toggle="modal" data-bs-target="#largeModal">
											<span class="tf-icons bx bx-edit"></span>&nbsp; Editar orden
										</button>
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
														<a href="{{ route('saleOrder.edit', $order->id) }}" type="button" class="btn rounded-pill btn-info"> <span class="tf-icons bx bx-show"></span>&nbsp;Editar servicio</a>
													</div>
													<div class="col-md-6">
														{{-- <a type="button" href="#" class="btn rounded-pill btn-danger">Cancelar orden</a> --}}

														@if($order->status == 'active')
														<form class="form-delete" action="#" method="POST">
															@csrf
															<button type="submit" class="btn rounded-pill btn-danger">
																<span class="tf-icons bx bx-trash"></span>&nbsp; Eliminar servicio
															</button>
														</form>
														@else
														<form class="form-active" action="#" method="POST">
															@csrf
															<button type="submit" class="btn rounded-pill btn-success">
																<span class="tf-icons bx bx-check"></span>&nbsp; Activar orden
															</button>
														</form>
														@endif

													</div>
												</div>
											</td>
										</tr>
										@empty
										<tr>
											<td colspan="5"><h3 class="mb-0 text-center"><strong>No se encontró ningúna orden de venta</strong></h3></td>
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

</div>

@endsection