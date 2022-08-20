@extends('layouts.dashboard')

@section('title')
<title>Opps! no hemos encontrado esta página</title>
@endsection

@section('content')
<!-- Error -->
<div class="container-xxl container-p-y">
	<div class="row">
		<div class="col-lg-12 text-center">
			<div class="misc-wrapper">
				<h2 class="mb-2 mx-2">Página no encontrada :(</h2>
				<p class="mb-4 mx-2">Oops! 😖 La página que solicitaste no ha sido encontrada.</p>
				<a href="{{ route('dashboard') }}" class="btn btn-primary">Regresar al inicio</a>
				<div class="mt-4">
					<img src="{{ asset('assets/img/illustrations/page-misc-error-light.png') }}" alt="page-misc-error-light" width="500" class="img-fluid" data-app-dark-img="illustrations/page-misc-error-dark.png" data-app-light-img="illustrations/page-misc-error-light.png"/>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Error -->
@endsection