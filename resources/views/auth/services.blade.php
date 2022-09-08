@extends('layouts.dashboard')

@section('title')
<title>Servicio para: {{ $client->name }}</title>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<div class="row">
		<div class="col-lg-12 mb-4">
			<div class="card">
				<div class="card-body">
					<h4 class="mb-0">Cliente: <strong>{{ $client->name }}</strong></h4>
				</div>
			</div>
		</div>
	</div>
	<div class="row d-flex justify-content-center">
		<div class="col-sm-8 col-md-6 col-lg-4 mb-4">
			<div class="card h-100">
				<img class="card-img-top" src="{{ asset('images/saleOrder.png') }}" style="height: 235px;" alt="Card image cap" />
				<div class="card-body">
					<div class="row">
						<h3 class="card-title text-center"><strong>Orden de venta</strong></h3>
					</div>
					<div class="row">
						<a href="{{ route('saleOrder.create', $client->slug) }}" class="btn btn-outline-primary mt-2">Crear orden de venta</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-8 col-md-6 col-lg-4 mb-4">
			<div class="card h-100">
				<img class="card-img-top" src="{{ asset('images/serviceOrder.png') }}" style="height: 235px;" alt="Card image cap" />
				<div class="card-body">
					<div class="row">
						<h3 class="card-title text-center"><strong>Orden de servicio</strong></h3>
					</div>
					<div class="row">
						<a href="{{ route('serviceOrder.create', $client->slug) }}" class="btn btn-outline-primary mt-2">Crear orden de servicio</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-8 col-md-6 col-lg-4 mb-4">
			<div class="card h-100">
				<img class="card-img-top" src="{{ asset('images/serviceSite.png') }}" style="height: 235px;" alt="Card image cap" />
				<div class="card-body">
					<div class="row">
						<h3 class="card-title text-center"><strong>Orden de servicio en sitio</strong></h3>
					</div>
					<div class="row">
						<a href="{{ route('serviceSite.create', $client->slug) }}" class="btn btn-outline-primary mt-2">Crear orden de servicio en sitio</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection