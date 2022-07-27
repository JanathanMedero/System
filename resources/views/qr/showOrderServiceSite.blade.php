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
					<div class="alert alert-primary mb-0 mt-4 text-center" role="alert"><strong>Servicios solicitados</strong></div>
				</div>
			</div>

			<div class="table-responsive text-nowrap mt-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><strong>Nombre del servicio</strong></th>
                            <th><strong>Precio</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($order->services as $service)
                        <tr>
                            <td>{{ $service->name }}</td>
                            <td>${{ $service->net_price }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5"><h3 class="mb-0 text-center"><strong>No se encontró ningúna orden de servicio</strong></h3></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="row">
            	<div class="col-12 d-flex justify-content-end">
            		@if($order->advance)
            		<p class="mb-2">Dejo un anticipo de: <strong>${{ $order->advance }}</strong></p>
            		@endif
            	</div>
            	<div class="col-12 d-flex justify-content-end">
            		<p class="mb-2">Total: <strong>${{ $total }}</strong></p>
            	</div>
            	<div class="col-12 d-flex justify-content-end">
            		<p class="mb-4">Total a pagar: <strong>${{ $subtotal }}</strong></p>
            	</div>
            </div>

			<div class="row d-flex justify-content-center">
				<div class="col-12">
					<p class="text-center"><strong>Nuestros técnicos estan trabajando lo mas rapido posible 🚗 para atender su solicitud. 😄</strong></p>
				</div>
				<div class="col-6 mb-4">
					<img src="{{ asset('images/run.svg') }}" class="img-fluid">
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
