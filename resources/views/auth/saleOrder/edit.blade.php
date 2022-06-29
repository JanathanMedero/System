@extends('layouts.dashboard')

@section('title')
<title>Número de orden: {{ $order->id }}</title>
@endsection

@section('content')
<div class="container-xxl flex-grow-1">
	<div class="row">
		<div class="col-lg-12 mx-0">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-4">
							<h4 class="mb-0"><strong>Orden de venta no. {{ $order->id }} - Cliente: {{ $order->client->name }}</strong></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 mt-4 mx-0">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-5">
							<div class="row">
								<h3 class="mb-0"><strong>Productos</strong></h3>
							</div>
						</div>
						<div class="col-lg-7 d-flex justify-content-end">
							<div>
								<button type="button" class="btn rounded-pill btn-success" data-bs-toggle="modal" data-bs-target="#new-product">
									<span class="tf-icons bx bx-package"></span>&nbsp; Agregar producto
								</button>
							</div>

							{{-- Modal --}}
							<div class="modal fade" id="new-product" tabindex="-1" aria-hidden="true">
								<div class="modal-dialog modal-lg" role="document">
									<form action="{{ route('saleOrder.addProduct', $order->id) }}" method="POST">
										@csrf
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel3">Nuevo producto</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-6 mb-3">
														<label for="name" class="form-label">Nombre del producto</label>
														<input type="text" id="name" class="form-control" placeholder="Ingresa el nombre del producto" name="name" required />
													</div>
													<div class="col-6 mb-3">
														<label for="quantity" class="form-label">Cantidad del producto</label>
														<input type="number" id="quantity" class="form-control" placeholder="Ingrese la cantidad" name="quantity" required />
													</div>
												</div>
												<div class="row g-2 mt-2">
													<div class="col-6">
														<div class="mb-3 input-group">
															<label class="form-label" for="unit_price">Precio unitario</label>
															<div class="input-group">
																<span class="input-group-text">$</span>
																<input type="number" id="unit_price" class="form-control" name="unit_price" placeholder="Ingrese el precio unitario" required>
																<span class="input-group-text">.00</span>
															</div>
														</div>
													</div>
													<div class="col-6">
														<div class="mb-3 input-group">
															<label class="form-label" for="net_price">Precio neto</label>
															<div class="input-group">
																<span class="input-group-text">$</span>
																<input type="number" id="net_price" class="form-control" name="net_price" placeholder="Ingrese el precio neto" required>
																<span class="input-group-text">.00</span>
															</div>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-12 mt-2">
														<label for="description" class="form-label">Descripción del producto</label>
														<textarea class="form-control" name="description" id="description" rows="5" placeholder="Ingrese la descripción del producto..." style="resize: none;" required></textarea>
													</div>
												</div>

												<div class="row">
													<div class="col-lg-12 mt-4">
														<label for="observations" class="form-label">Observaciones del producto (Opcional)</label>
														<textarea class="form-control" name="observations" id="observations" rows="5" placeholder="Ingrese la descripción del producto..." style="resize: none;"></textarea>
													</div>
												</div>

												<div class="row">
													<div class="col-12 mt-4">
														<label class="form-label" for="warranty">Garantía (Opcional)</label>
														<input type="text" min="1" class="form-control" name="warranty" id="warranty" placeholder="Ingrese la garantía del producto">
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

							<div class="mx-3">
								<button type="button" class="btn rounded-pill btn-info" data-bs-toggle="modal" data-bs-target="#edit-order">
									<span class="tf-icons bx bx-edit"></span>&nbsp; Editar orden
								</button>
							</div>

							<div class="modal fade" id="edit-order" tabindex="-1" aria-hidden="true">
								<div class="modal-dialog modal-lg" role="document">
									<form action="{{ route('saleOrder.update.order', $order->id) }}" method="POST">
										@method('PUT')
										@csrf
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel3">Editar orden</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-lg-6">
														<label for="date_of_sale" class="col-md-12 col-form-label pt-0">Fecha de venta</label>
														<div class="mb-3 input-group">
															<div class="col-md-12">
																<input class="form-control" type="date" name="date_of_sale" id="date_of_sale" value="{{ date('Y-m-d', strtotime($order->created_at)) }}" required>
															</div>
														</div>
													</div>

													<div class="col-lg-6">
														<label for="employe_id" class="form-label">Le atendio:</label>
														<div class="mb-3 input-group">
															<select class="form-select" id="employe_id" name="employe_id" required>
																@foreach($employees as $user)
																<option {{ $user->id == $order->employe_id ? 'selected' : '' }}  value="{{ $user->id }}">{{ $user->name }}</option>
																@endforeach
															</select>
														</div>
													</div>

												</div>
												<div class="row g-2 mt-2">
													<div class="col-lg-12">
														<label for="office_id" class="form-label">Seleccione una sucursal:</label>
														<div class="mb-3 input-group">
															<select class="form-select" id="office_id" name="office_id" required>
																<option {{ $order->office_id == '1' ? 'selected' : '' }} value="1">Sucursal Matriz</option>
																<option {{ $order->office_id == '2' ? 'selected' : '' }} value="2">Sucursal Virrey</option>
															</select>
														</div>
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

							<button type="button" class="btn rounded-pill btn-warning">
								<span class="tf-icons bx bx-printer"></span>&nbsp; Imprimir orden de venta
							</button>
						</div>
					</div>
					<div class="row">

						<div class="table-responsive text-nowrap my-4">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Nombre del producto</th>
										<th>Cantidad</th>
										<th>Precio unitario</th>
										<th>Precio neto</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach($order->products as $product)
									<tr>
										<td><strong>{{ $product->name }}</strong></td>
										<td>{{ $product->quantity }}</td>
										<td>${{ $product->unit_price }} M.N.</td>
										<td>${{ $product->net_price }} M.N.</td>
										<td class="d-flex justify-content-center">
											<div>
												<a href="{{ route('saleOrder.showProduct', $product->slug) }}" type="button" class="btn rounded-pill btn-info mx-4">
													<span class="tf-icons bx bx-edit-alt"></span>&nbsp; Editar
												</a>
											</div>
											<form class="form-delete" action="{{ route('saleOrder.destroyProduct', $product->slug) }}" method="POST">
												@method("delete")
												@csrf
												<button type="submit" class="btn rounded-pill btn-danger">
													<span class="tf-icons bx bx-trash"></span>&nbsp; Eliminar
												</button>
											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

</div>

@endsection

@section('extra-js')
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>


<script>
	$('.form-delete').submit(function(e){
		e.preventDefault();
		Swal.fire({
			title: '¿Estas seguro de eliminar la orden?',
			text: "Esta acción no se puede revertir",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Borrar',
			cancelButtonText: 'Cancelar'
		}).then((result) => {
			if (result.value) {
				this.submit();
			}
		})
	});
</script>

@endsection