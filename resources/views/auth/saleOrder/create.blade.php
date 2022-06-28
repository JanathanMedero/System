@extends('layouts.dashboard')

@section('title')
<title>Orden de venta: {{ $client->name }}</title>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<div class="row">
		<div class="col-lg-12 mb-4">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-4 mb-4">
							<h4 class="mb-0"><strong>Nueva orden de venta</strong></h4>
						</div>
					</div>

					<form action="{{ route('saleOrder.store', $client->slug) }}" method="POST">
						@csrf
						<div class="row mt-3">
							<div class="col-lg-3 mb-3">
								<label class="form-label" for="name">Nombre del producto</label>
								<input type="text" class="form-control" name="name" id="name" placeholder="Ingrese el nombre del producto">
							</div>
							<div class="col-lg-3 mb-3">
								<label class="form-label" for="quantity">Cantidad del producto</label>
								<input type="number" min="1" class="form-control" name="quantity" id="quantity" placeholder="Ingrese la cantidad del producto">
							</div>
							<div class="col-lg-3">
								<div class="mb-3 input-group">
									<label class="form-label" for="unit_price">Precio unitario</label>
									<div class="input-group">
										<span class="input-group-text">$</span>
										<input type="number" id="unit_price" class="form-control" name="unit_price" placeholder="Ingrese el precio unitario">
										<span class="input-group-text">.00</span>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="mb-3 input-group">
									<label class="form-label" for="net_price">Precio neto</label>
									<div class="input-group">
										<span class="input-group-text">$</span>
										<input type="number" id="net_price" class="form-control" name="net_price" placeholder="Ingrese el precio neto">
										<span class="input-group-text">.00</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 mt-2">
								<label for="description" class="form-label">Descripción del producto</label>
								<textarea class="form-control" name="description" id="description" rows="5" placeholder="Ingrese la descripción del producto..." style="resize: none;"></textarea>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 mt-4">
								<label for="observations" class="form-label">Observaciones del producto (Opcional)</label>
								<textarea class="form-control" name="observations" id="observations" rows="5" placeholder="Ingrese la descripción del producto..." style="resize: none;"></textarea>
							</div>
						</div>

						<div class="row mt-4">
							<div class="col-lg-3">
								<label for="date_of_sale" class="col-md-12 col-form-label pt-0">Fecha de venta</label>
								<div class="mb-3 input-group">
									<div class="col-md-12">
										<input class="form-control" type="date" id="date_of_sale">
									</div>
								</div>
							</div>
							<div class="col-lg-3">
									<label for="employe_id" class="form-label">Le atendio:</label>
								<div class="mb-3 input-group">
									<select class="form-select" id="employe_id" name="employe_id">
										@foreach($employees as $user)
										<option {{ Auth::user()->id == $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-lg-3">
								<label class="form-label" for="warranty">Garantía (Opcional)</label>
								<input type="text" min="1" class="form-control" name="warranty" id="warranty" placeholder="Ingrese la garantía del producto">
							</div>
							<div class="col-lg-3">
									<label for="office_id" class="form-label">Seleccione una sucursal:</label>
								<div class="mb-3 input-group">
									<select class="form-select" id="office_id" name="office_id">
										<option value="1">Sucursal Matriz</option>
										<option value="2">Sucursal Virrey</option>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-4 mt-4">
								<button type="submit" class="btn btn-primary">Crear orden</button>
							</div>
						</div>

					</form>

				</div>
			</div>
		</div>
	</div>
</div>

@endsection