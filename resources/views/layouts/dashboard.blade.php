<!DOCTYPE html>
<html
lang="en"
class="light-style layout-menu-fixed"
dir="ltr"
data-theme="theme-default"
data-assets-path="../assets/"
data-template="vertical-menu-template-free"
>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

	@yield('title')

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

		@livewireStyles

		@yield('extra-css')

	</head>

	<body>
		<!-- Layout wrapper -->
		<div class="layout-wrapper layout-content-navbar">
			<div class="layout-container">
				<!-- Menu -->

				<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
					<div class="app-brand demo">
						<a href="{{ route('dashboard') }}" class="app-brand-link">
							<img src="{{ asset('images/logo.png') }}" class="img-fluid">
						</a>

				<a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
					<i class="bx bx-chevron-left bx-sm align-middle"></i>
				</a>
			</div>

			<div class="menu-inner-shadow"></div>

			<ul class="menu-inner py-1">
				<!-- Dashboard -->
				<li class="menu-item {{ (request()->is('dashboard')) ? 'active' : '' }}">
					<a href="{{ route('dashboard') }}" class="menu-link">
						<i class="menu-icon tf-icons bx bx-home-circle"></i>
						<div data-i18n="Analytics">Inicio</div>
					</a>
				</li>

				{{-- Sistema de ordenes --}}

				<li class="menu-header small text-uppercase">
					<span class="menu-header-text">Sistema de ordenes</span>
				</li>

				@auth
				@if(Auth::user()->role->id == 1)
				<li class="menu-item {{ (request()->is('empleados')) ? 'active' : '' }}">
					<a href="{{ route('employe.index') }}" class="menu-link">
						<i class="menu-icon tf-icons bx bx-user"></i>
						<div data-i18n="Basic">Empleados</div>
					</a>
				</li>
				@endif
				@endauth

				<li class="menu-item {{ (request()->is('clientes')) ? 'active' : '' }}">
					<a href="{{ route('client.index') }}" class="menu-link">
						<i class="menu-icon tf-icons bx bx-user"></i>
						<div data-i18n="Basic">Clientes</div>
					</a>
				</li>
				<li class="menu-item {{ (request()->is('ordenes-de-venta')) ? 'active' : '' }} {{ (request()->is('nueva-orden-de-venta/*')) ? 'active' : '' }} {{ (request()->is('orden-de-venta/*')) ? 'active' : '' }}">
					<a href="{{ route('saleOrder.index') }}" class="menu-link">
						<i class="menu-icon tf-icons bx bx-money"></i>
						<div data-i18n="Basic">Ordenes de venta</div>
					</a>
				</li>
				<li class="menu-item {{ (request()->is('ordenes-de-servicio')) ? 'active' : '' }} {{ (request()->is('nueva-orden-de-servicio/*')) ? 'active' : '' }} {{ (request()->is('orden-de-servicio/*')) ? 'active' : '' }}">
					<a href="{{ route('serviceOrder.index') }}" class="menu-link">
						<i class="menu-icon tf-icons bx bx-briefcase-alt-2"></i>
						<div data-i18n="Basic">Ordenes de servicio</div>
					</a>
				</li>
				<li class="menu-item {{ (request()->is('ordenes-de-servicio-en-sitio')) ? 'active' : '' }} {{ (request()->is('nueva-ordenes-de-servicio-en-sitio/*')) ? 'active' : '' }} {{ (request()->is('orden-de-servicio-en-sitio/*')) ? 'active' : '' }}">
					<a href="{{ route('serviceSite.index') }}" class="menu-link">
						<i class="menu-icon tf-icons bx bx-buildings"></i>
						<div data-i18n="Basic">Ordenes de servicio en sitio</div>
					</a>
				</li>



				{{-- Inventario --}}


				<li class="menu-header small text-uppercase"><span class="menu-header-text">Sistema de inventario</span></li>
				<!-- Cards -->
				<li class="menu-item {{ (request()->is('inventario')) ? 'active' : '' }} {{ (request()->is('inventario/administrar-categorias')) ? 'active' : '' }}">
					<a href="{{ route('inventory') }}" class="menu-link">
						<i class="menu-icon tf-icons bx bx-package" ></i>
						<div data-i18n="Basic">Inventario</div>
					</a>
				</li>
				<li class="menu-item {{ (request()->is('ventas')) ? 'active' : '' }} {{ (request()->is('reporte-de-ventas')) ? 'active' : '' }}">
					<a href="{{ route('sale.index') }}" class="menu-link">
						<i class="menu-icon tf-icons bx bx-dollar" ></i>
						<div data-i18n="Basic">Ventas</div>
					</a>
				</li>
			</ul>
		</aside>
		<!-- / Menu -->

		<!-- Layout container -->
		<div class="layout-page">
			<!-- Navbar -->

			<nav
			class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme mt-4"
			id="layout-navbar"
			>
			<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
				<a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
					<i class="bx bx-menu bx-sm"></i>
				</a>
			</div>

			<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
				<!-- Search -->
				@auth
				<div class="navbar-nav align-items-center">
					<p class="mb-0"><strong><h4 class="mb-0">Bienvenid@: {{ Auth::user()->name }}</h4></strong></p>
				</div>
				@endauth
				<!-- /Search -->

				<ul class="navbar-nav flex-row align-items-center ms-auto">


					<!-- User -->
					<li class="nav-item navbar-dropdown dropdown-user dropdown">
						<a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
							<div class="avatar">
								<img src="{{ asset('assets/img/avatars/user.jpg') }}" alt class="w-px-40 h-auto rounded-circle" />
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li>
								<a class="dropdown-item" href="#">
									<div class="d-flex">
										<div class="flex-shrink-0 me-3">
											<div class="avatar">
												<img src="{{ asset('assets/img/avatars/user.jpg') }}" alt class="w-px-40 h-auto rounded-circle" />
											</div>
										</div>
										<div class="flex-grow-1">
											@auth
											<span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
											@if(Auth::user()->role->id == 1)
											<small class="text-muted">Administrador</small>
											@endauth
											@else
											<small class="text-muted">Empleado</small>
											@endif
										</div>
									</div>
								</a>
							</li>
							<li>
								<div class="dropdown-divider"></div>
							</li>
							<li>
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									<i class="bx bx-power-off me-2"></i>
									<span class="align-middle">Cerrar sesión</span>
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf
								</form>
							</li>
						</ul>
					</li>
					<!--/ User -->
				</ul>
			</div>
		</nav>

		<!-- / Navbar -->

		<!-- Content wrapper -->
		<div class="content-wrapper">
			<!-- Content -->

			<div class="container mt-4">
				@include('partials.alerts')
			</div>

			<div class="container-xxl flex-grow-1 container-p-y">
				<div class="row">


					@yield('content')


				</div>
			</div>
		</div>
		<div class="row">






		</div>
		<!-- / Content -->

		<!-- Footer -->
		<footer class="content-footer footer bg-footer-theme">
			<div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
				<div class="mb-2 mb-md-0">
					©
					<script>
						document.write(new Date().getFullYear());
					</script>
					, made with ❤️ {{-- by
					<strong>ThemeSelection</strong> --}}
				</div>
			</div>
		</footer>
		<!-- / Footer -->

		<div class="content-backdrop fade"></div>
	</div>
	<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
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

@livewireScripts

@yield('extra-js')

</body>
</html>
