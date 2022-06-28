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
						<div class="col-lg-7">
							<div class="row">
								<h3 class="mb-0"><strong>Productos</strong></h3>
							</div>
						</div>
						<div class="col-lg-5 d-flex justify-content-end">
							<div class="mx-3">
								<button type="button" class="btn rounded-pill btn-success">
									<span class="tf-icons bx bx-package"></span>&nbsp; Agregar producto
								</button>
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
											<button type="button" class="btn rounded-pill btn-info mx-4">
												<span class="tf-icons bx bx-edit-alt"></span>&nbsp; Editar
											</button>

											<button type="button" class="btn rounded-pill btn-danger">
												<span class="tf-icons bx bx-trash"></span>&nbsp; Eliminar
											</button>

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