@extends('layouts.dashboard')

@section('title')
<title>Orden de servicio en sitio: {{ $client->name }}</title>
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
						<div class="col-md-4 mb-4">
							<h4 class="mb-0"><strong>Nueva orden de servicio en sitio</strong></h4>
						</div>
					</div>

					<form action="{{ route('serviceSite.store', $client->slug) }}" method="POST">
						@csrf
						<div class="row mt-3">
							<div class="col-lg-4 mb-3">
								<label class="form-label" for="name">Nombre del servicio</label>
								<input type="text" class="form-control" name="name" id="name" placeholder="Ingrese el nombre del servicio" value="{{ old('name') }}" required>
							</div>

							<div class="col-lg-4 mb-3">
								<label class="form-label" for="quantity">Cantidad de servicios</label>
								<input type="number" min="1" class="form-control" name="quantity" id="quantity" placeholder="Ingrese la cantidad de servicios" value="{{ old('quantity') }}" required>
							</div>

							<div class="col-lg-4">
								<div class="mb-3 input-group">
									<label class="form-label" for="net_price">Precio NETO</label>
									<div class="input-group mt-1">
										<span class="input-group-text">$</span>
										<input type="number" min="1" id="net_price" class="form-control" name="net_price" placeholder="Ingrese el precio NETO" value="{{ old('net_price') }}">
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

						<div class="row">
							<div class="col-lg-12 mt-4">
								<label for="observations" class="form-label">Observaciones o detalles a tomar en cuenta (Opcional)</label>
								<textarea class="form-control" name="observations" id="observations" rows="5" placeholder="Ingrese las observaciones del servicio..." style="resize: none;">{{ old('observations') }}</textarea>
							</div>
						</div>

						<div class="row mt-3">
							<div class="col-lg-3">
								<label for="date_of_service" class="col-md-12 col-form-label pt-0">Fecha de servicio</label>
								<div class="mb-3 input-group">
									<div class="col-md-12">
										<input class="form-control" type="date" name="date_of_service" id="date_of_service" value="{{ old('date_of_service') }}">
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<label for="employe_id" class="form-label">Le atendio:</label>
								<div class="mb-3 input-group">
									<select class="form-select" id="employe_id" name="employe_id" required>
										@foreach($employees as $user)
										<option {{ Auth::user()->id == $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-lg-3">
								<label for="office_id" class="form-label">Seleccione una sucursal:</label>
								<div class="mb-3 input-group">
									<select class="form-select" id="office_id" name="office_id" required>
										<option value="1" {{ old('office_id') == '1' ? 'selected' : '' }} >Sucursal Matriz</option>
										<option value="2" {{ old('office_id') == '2' ? 'selected' : '' }}>Sucursal Virrey</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 mt-4">
								<button type="submit" class="btn btn-primary">Crear orden de servicio</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection