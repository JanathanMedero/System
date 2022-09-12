@extends('layouts.dashboard')

@section('title')
<title>Pyscom - Sistema</title>
@endsection

@section('content')

<div class="col-lg-12 mb-4">
	<div class="row d-flex justify-content-center">
		<div class="col-lg-8 mb-4">
			<div class="card">
				<div class="d-flex align-items-end row">
					<div class="col-sm-8">
						<div class="card-body">
							<h5 class="card-title text-primary">Bienvenidos al sistema de ordenes e inventario de Pyscom! 🎉</h5>
							<p class="mb-4">
								Desde aqui podra administrar las ordenes y verificar existencias en el inventario de Pyscom.
							</p>
						</div>
					</div>
					<div class="col-sm-4 text-center text-sm-left">
						<div class="card-body pb-0 px-0 px-md-4">
							<img src="{{ asset('assets/img/illustrations/man-with-laptop-light.png') }}" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png"/>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="col-lg-12">
	<div class="row d-flex justify-content-center">
		<div class="col-12 col-lg-4 col-md-12 mb-4">
			<div class="card">
				<div class="card-body">
					<div class="card-title ">
						<div class="row">
							<div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
								<div class="row">
									<div class="col-12 d-flex justify-content-center d-none d-lg-block">
										<h3 class="card-title mb-0"><strong>Ordenes de servicio</strong></h3>
									</div>
									<div class="col-md-12 mt-4 d-none d-md-block d-lg-none">
										<h2 class="text-center"><strong>Ordenes de servicio</strong></h2>
									</div>
								</div>
							</div>
							<div class="col-12 mt-4 col-md-6 px-4">
								<div class="d-flex justify-content-center">
									<img src="{{ asset('images/orders.svg') }}" style="height: 148px;" class="img-fluid">
								</div>
							</div>
							<div class="col-md-12 d-block d-flex justify-content-center">
								<a href="{{ route('serviceOrder.index') }}" class="btn btn-primary">Ordenes de servicio</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-12 col-lg-4 col-md-12 mb-4">
			<div class="card">
				<div class="card-body">
					<div class="card-title ">
						<div class="row">
							<div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
								<div class="row">
									<div class="col-12 d-flex justify-content-center d-none d-lg-block">
										<h3 class="card-title mb-0"><strong>Ordenes de venta</strong></h3>
									</div>
									<div class="col-md-12 mt-4 d-none d-md-block d-lg-none">
										<h2 class="text-center"><strong>Ordenes de venta</strong></h2>
									</div>
								</div>
							</div>
							<div class="col-12 mt-4 col-md-6 px-4">
								<div class="d-flex justify-content-center">
									<img src="{{ asset('images/order-sale.svg') }}" style="height: 148px;" class="img-fluid">
								</div>
							</div>
							<div class="col-md-12 d-block d-flex justify-content-center">
								<a href="{{ route('saleOrder.index') }}" class="btn btn-primary">Ordenes de venta</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-12 col-lg-4 col-md-12 mb-4">
			<div class="card">
				<div class="card-body">
					<div class="card-title ">
						<div class="row">
							<div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
								<div class="row">
									<div class="col-12 d-flex justify-content-center d-none d-lg-block">
										<h3 class="card-title mb-0"><strong>Ordenes de servicio en sitio</strong></h3>
									</div>
									<div class="col-md-12 mt-4 d-none d-md-block d-lg-none">
										<h2 class="text-center"><strong>Ordenes de servicio en sitio</strong></h2>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-6 px-4">
								<div class="d-flex justify-content-center">
									<img src="{{ asset('images/service-site.svg') }}" style="height: 148px;" class="img-fluid">
								</div>
							</div>
							<div class="col-md-12 mt-4 d-block d-flex justify-content-center">
								<a href="{{ route('serviceSite.index') }}" class="btn btn-primary">Ordenes de servicio en sitio</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<div class="col-lg-12">
	<div class="row d-flex justify-content-center">
		

		<div class="col-12 col-lg-4 col-md-12 mb-4">
			<div class="card">
				<div class="card-body">
					<div class="card-title ">
						<div class="row">
							<div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
								<div class="row">
									<div class="col-12 d-flex justify-content-center d-none d-lg-block">
										<h3 class="card-title mb-0"><strong>Inventario</strong></h3>
									</div>
									<div class="col-md-12 mt-4 d-none d-md-block d-lg-none">
										<h2 class="text-center"><strong>Inventario</strong></h2>
									</div>
								</div>
							</div>
							<div class="col-12 mt-4 col-md-6 px-4">
								<div class="d-flex justify-content-center">
									<img src="{{ asset('images/inventory.svg') }}" style="height: 148px;" class="img-fluid">
								</div>
							</div>
							<div class="col-md-12 d-block d-flex justify-content-center">
								<a href="{{ route('inventory') }}" class="btn btn-primary">Sistema de inventario</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-12 col-lg-4 col-md-12 mb-4">
			<div class="card">
				<div class="card-body">
					<div class="card-title ">
						<div class="row">
							<div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
								<div class="row">
									<div class="col-12 d-flex justify-content-center d-none d-lg-block">
										<h3 class="card-title mb-0"><strong>Reporte de ventas</strong></h3>
									</div>
									<div class="col-md-12 mt-4 d-none d-md-block d-lg-none">
										<h2 class="text-center"><strong>Reporte de ventas</strong></h2>
									</div>
								</div>
							</div>
							<div class="col-12 mt-4 col-md-6 px-4">
								<div class="d-flex justify-content-center">
									<img src="{{ asset('images/reports.svg') }}" style="height: 148px;" class="img-fluid">
								</div>
							</div>
							<div class="col-md-12 d-block d-flex justify-content-center">
								<a href="{{ route('sale.index') }}" class="btn btn-primary">Reporte de ventas</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

@endsection