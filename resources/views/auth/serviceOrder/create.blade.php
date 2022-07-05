@extends('layouts.dashboard')

@section('title')
<title>Orden de servicio: {{ $client->name }}</title>
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
							<h4 class="mb-0"><strong>Nueva orden de servicio</strong></h4>
						</div>
					</div>

					<form action="#" method="POST">
						@csrf
						<div class="row mt-3">
							<div class="col-lg-4 mb-3">
								<label class="form-label" for="equip">Equipo</label>
								<input type="text" class="form-control" name="equip" id="equip" placeholder="Ejemplo: Gabinete, Monitor, etc." value="{{ old('equip') }}">
							</div>
							<div class="col-lg-4 mb-3">
								<label class="form-label" for="brand">Marca</label>
								<input type="text" class="form-control" name="brand" id="brand" placeholder="Ingrese la marca del equipo" value="{{ old('brand') }}">
							</div>
							<div class="col-lg-4 mb-3">
								<label class="form-label" for="serie">No. serie o modelo (Opcional)</label>
								<input type="text" class="form-control" name="serie" id="serie" placeholder="Ingrese el modelo o no. de serie del equipo" value="{{ old('serie') }}">
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-lg-4 mb-3">
								<label class="form-label" for="accesories">Accesorios (Opcional)</label>
								<input type="text" class="form-control" name="accesories" id="accesories" placeholder="Ingrese los accesorios del equipo" value="{{ old('accesories') }}">
							</div>
							<div class="col-lg-4 mb-3">
								<label class="form-label" for="features">Características del equipo</label>
								<input type="text" class="form-control" name="features" id="features" placeholder="Ingrese las características del equipo" value="{{ old('features') }}">
							</div>
							<div class="col-lg-4 mb-3">
								<label class="form-label" for="failure">Reporte de falla</label>
								<input type="text" class="form-control" name="failure" id="failure" placeholder="Ingrese la falla conocida" value="{{ old('failure') }}">
							</div>
						</div>

						<div class="row mt-3">
							<div class="col-lg-4 mb-3">
								<label class="form-label" for="observations">Observaciones</label>
								<input type="text" class="form-control" name="observations" id="observations" placeholder="Ingrese las observaciones del equipo" value="{{ old('observations') }}">
							</div>
							<div class="col-lg-4 mb-3">
								<label class="form-label" for="solicited_service">Servicio solicitado</label>
								<input type="text" class="form-control" name="solicited_service" id="solicited_service" placeholder="Ingrese el servicio solicitado" value="{{ old('solicited_service') }}">
							</div>
							<div class="col-lg-4">
									<label for="employe_id" class="form-label">Le atendio:</label>
								<div class="mb-3 input-group">
									<select class="form-select" id="employe_id" name="employe_id">
										@foreach($employees as $user)
										<option {{ Auth::user()->id == $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>

						<div class="row mt-3">
							<div class="col-lg-4">
									<label for="office_id" class="form-label">Seleccione una sucursal:</label>
								<div class="mb-3 input-group">
									<select class="form-select" id="office_id" name="office_id">
										<option value="1" {{ old('office_id') == '1' ? 'selected' : '' }} >Sucursal Matriz</option>
										<option value="2" {{ old('office_id') == '2' ? 'selected' : '' }}>Sucursal Virrey</option>
									</select>
								</div>
							</div>
							<div class="col-lg-4">
									<label for="pay" class="form-label">Seleccione el tipo de pago:</label>
								<div class="mb-3 input-group">
									<select class="form-select" id="pay" name="pay">
										<option value="Pago en efectivo" {{ old('pay') == 'Pago en efectivo' ? 'selected' : '' }}>Pago en efectivo</option>
										<option value="Transferencia" {{ old('pay') == 'Transferencia' ? 'selected' : '' }}>Transferencia</option>
										<option value="Pago con tarjeta" {{ old('pay') == 'Pago con tarjeta' ? 'selected' : '' }}>Pago con tarjeta</option>
										<option value="Cheque" {{ old('pay') == 'Cheque' ? 'selected' : '' }}>Cheque</option>
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