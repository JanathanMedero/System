@extends('layouts.dashboard')

@section('title')
<title>Opps! no tienes permiso para entrar a esta sección</title>
@endsection

@section('content')
<!-- Error -->
<div class="container-xxl container-p-y">
	<div class="row">
		<div class="col-lg-12 text-center">
			<div class="misc-wrapper">
				<h2 class="mb-2">Esperate mi chavo!</h2>
				<h3 class="mb-4"><strong>No puedes acceder aqui, te falta una ingeniería.</strong></h3>
				<div class="mt-4">
					<img src="{{ asset('images/meme.jpg') }}"  width="400" class="img-fluid" style="border-radius: 10px; box-shadow: 0 0 15px #ddd; background: #fff;" />
				</div>
				<h4 class="text-center mt-4">Quede asi ira!</h4>
				<a href="{{ route('dashboard') }}" class="btn btn-primary mt-2">Regresar al inicio</a>
			</div>
		</div>
	</div>
</div>
<!-- /Error -->
@endsection