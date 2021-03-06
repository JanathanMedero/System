@extends('layouts.dashboard')

@section('title')
<title>Pyscom - Sistema</title>
@endsection

@section('content')

<div class="col-lg-12">
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
							<img
							src="../assets/img/illustrations/man-with-laptop-light.png"
							height="140"
							alt="View Badge User"
							data-app-dark-img="illustrations/man-with-laptop-dark.png"
							data-app-light-img="illustrations/man-with-laptop-light.png"
							/>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-lg-12">
	<div class="row d-flex justify-content-center">
		<div class="col-lg-5 col-md-12 col-6 mb-4">
			<div class="card">
				<div class="card-body">
					<div class="card-title ">

						<div class="row">
							<div class="col-md-6 d-flex align-items-center">
								<div class="row">
									<div class="col-md-12">
										<h3 class="card-title mb-0"><strong>Sistema de ordenes</strong></h3>
									</div>
									<div class="col-md-12 mt-4">
										<button class="btn btn-primary">Ir al sistema</button>
									</div>
								</div>
							</div>
							<div class="col-md-6 px-4">
								<img src="{{ asset('images/orders.svg') }}" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-5 col-md-12 col-6 mb-4">
			<div class="card">
				<div class="card-body">
					<div class="card-title ">

						<div class="row">
							<div class="col-md-6 d-flex align-items-center">
								<div class="row">
									<div class="col-md-12">
										<h4 class="card-title mb-0"><strong>Sistema de inventario</strong></h4>
									</div>
									<div class="col-md-12 mt-4">
										<button class="btn btn-primary">Ir al sistema</button>
									</div>
								</div>
							</div>
							<div class="col-md-6 px-4">
								<img src="{{ asset('images/inventory.svg') }}" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection