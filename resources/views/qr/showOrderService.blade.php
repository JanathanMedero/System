<!DOCTYPE html>
<html
lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

	<meta name="description" content="" />

	<!-- Favicon -->
	<link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/png">

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
	href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
	rel="stylesheet"
	/>

	<!-- Icons. Uncomment required icon fonts -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

	<!-- Core CSS -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
	<link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
	<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

	<!-- Vendors CSS -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

	<link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

	<!-- Page CSS -->

	<!-- Helpers -->
	<script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

	<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
		<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
		<script src="{{ asset('assets/js/config.js') }}"></script>

		<style type="text/css">
			body{
				background-color: #eee;
			}
		</style>


	</head>

	<body>

		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-8 mt-4">
					<img src="{{ asset('images/logo.png') }}" class="img-fluid">
				</div>
			</div>
			<div class="row">
				<div class="col mt-2">
					<p class="mb-0 text-uppercase text-center" style="font-size: 18px;">Productos, proyectos y servicios informáticos</p>
				</div>
			</div>
			<div class="row">
				<div class="col mt-1">
					<a href="https://www.pyscom.com" target="_blank"><p class="mb-0 text-center" style="font-size: 16px;">www.pyscom.com</p></a>
				</div>
			</div>

			<div class="row">
				<div class="col">
					<div class="alert alert-primary mb-0 mt-4 text-center" role="alert"><strong>Datos del cliente</strong></div>
				</div>
			</div>

			<div class="row mt-3">
				<div class="col">
					<p class="mb-0"><strong>Nombre: </strong>{{ $order->client->name }}</p>
				</div>
				@if($order->client->phone)
				<div class="col">
					<p class="mb-0"><strong>Telefono: </strong>{{ $order->client->phone }}</p>
				</div>
				@else
				<div class="col">
					<p class="mb-0"><strong>Telefono: </strong>Sin registro</p>
				</div>
				@endif
			</div>

			<div class="row">
				<div class="col">
					<div class="alert alert-primary mb-0 mt-4 text-center" role="alert"><strong>Datos del equipo</strong></div>
				</div>
			</div>

			<div class="row">
				<div class="col">
					<div class="demo-inline-spacing mt-2 mb-4">
						<ul class="list-group">
							<li class="list-group-item d-flex align-items-center">
								<i class="bx bx-laptop me-2"></i>
								<p class="mb-0"><strong>Equipo:</strong> {{ $order->service->equip }}</p>
							</li>
							<li class="list-group-item d-flex align-items-center">
								<i class="bx bx-at me-2"></i>
								<p class="mb-0"><strong>Modelo o marca:</strong> {{ $order->service->brand }}</p>
							</li>
							<li class="list-group-item d-flex align-items-center">
								<i class="bx bx-receipt me-2"></i>
								<p class="mb-0"><strong>Características:</strong> {{ $order->service->features }}</p>
							</li>
							@if($order->service->serie)
							<li class="list-group-item d-flex align-items-center">
								<i class="bx bx-barcode me-2"></i>
								<p class="mb-0"><strong>No. de serie:</strong> {{ $order->service->serie }}</p>
							</li>
							@else
							<li class="list-group-item d-flex align-items-center">
								<i class="bx bx-barcode me-2"></i>
								<p class="mb-0"><strong>No. de serie:</strong> No registrado</p>
							</li>
							@endif
							@if($order->service->accesories)
							<li class="list-group-item d-flex align-items-center">
								<i class="bx bx-plug me-2"></i>
								<p class="mb-0"><strong>Accesorios:</strong> {{ $order->service->accesories }}</p>
							</li>
							@else
							<li class="list-group-item d-flex align-items-center">
								<i class="bx bx-plug me-2"></i>
								<p class="mb-0"><strong>Accesorios:</strong> No registrado</p>
							</li>
							@endif
							<li class="list-group-item d-flex align-items-center">
								<i class="bx bx-x-circle me-2"></i>
								<p class="mb-0"><strong>Falla:</strong> {{ $order->service->failure }}</p>
							</li>
							<li class="list-group-item d-flex align-items-center">
								<i class="bx bx-flag me-2"></i>
								<p class="mb-0"><strong>Servicio solicitado:</strong> {{ $order->service->solicited_service }}</p>
							</li>
							@if($order->service->observations)
							<li class="list-group-item d-flex align-items-center">
								<i class="bx bx-show-alt me-2"></i>
								<p class="mb-0"><strong>Observaciones:</strong> {{ $order->service->observations }}</p>
							</li>
							@else
							<li class="list-group-item d-flex align-items-center">
								<i class="bx bx-show-alt me-2"></i>
								<p class="mb-0"><strong>Observaciones:</strong> No registrado</p>
							</li>
							@endif
						</ul>
					</div>
				</div>
			</div>

			@if($order->report)
			<div class="row">
				<div class="col">
					<div class="demo-inline-spacing mt-2 mb-4">
						<ul class="list-group">
							<li class="list-group-item list-group-item-primary"><strong>Reporte Técnico</strong></li>						
							@if($order->report->report)
							<li class="list-group-item d-flex align-items-center">
								<i class="bx bxs-report me-2"></i>
								<p class="mb-0"><strong>Reporte técnico:</strong> {{ $order->report->report }}</p>
							</li>
							@endif
							@if($order->report->observations)
							<li class="list-group-item d-flex align-items-center">
								<i class="bx bx-show-alt me-2"></i>
								<p class="mb-0"><strong>Observaciones:</strong> {{ $order->report->observations }}</p>
							</li>
							@endif
						</ul>
					</div>
				</div>
			</div>
			@endif

			<div class="row d-flex justify-content-center">
				<div class="col-12">
					<p class="text-center"><strong>Nuestros técnicos estan trabajando actualmente en su equipo 🖥 no se preocupe, esta en buenas manos. 😄</strong></p>
				</div>
				<div class="col-6 mb-4">
					<img src="{{ asset('images/work.svg') }}" class="img-fluid">
				</div>
				<div class="col-12">
					<p class="text-center"><strong>Tiene alguna duda? 🤔 No dude en comunicarse con nosotros.</strong></p>
				</div>
			</div>
		</div>

		<div class="container-fluid py-4" style="background-color: #133AA1;">
			<div class="row mb-3">
				<div class="col-6">
					<div class="row">
						<p class="mb-0 text-white text-center">Sucursal Matriz</p>
						<p class="mb-0 text-white text-center">📱 4432754321 ☎</p>
					</div>
				</div>
				<div class="col-6">
					<div class="row">
						<p class="mb-0 text-white text-center">Sucursal Virrey</p>
						<p class="mb-0 text-white text-center">📱 4433151988 ☎</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<p class="text-center text-white mb-0">© Copyright Pyscom 2022. Todos los derechos reservados.</p>
				</div>
			</div>
		</div>


		<!-- Core JS -->
		<!-- build:js assets/vendor/js/core.js -->
		<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
		<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
		<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
		<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

		<script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
		<!-- endbuild -->

		<!-- Vendors JS -->
		<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

		<!-- Main JS -->
		<script src="{{ asset('assets/js/main.js') }}"></script>

		<!-- Page JS -->
		<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

		<!-- Place this tag in your head or just before your close body tag. -->
		<script async defer src="https://buttons.github.io/buttons.js"></script>

	</body>
</html>
