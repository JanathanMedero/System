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
@endsection