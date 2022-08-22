@extends('layouts.app')

@section('extra-css')

@endsection

@section('content')

<div class="container-xxl">
	<div class="row">
		<div class="col-lg-12 mt-4">
		@include('partials.alerts')
		</div>
	</div>
</div>


<div class="container-xxl">
	<div class="authentication-wrapper authentication-basic container-p-y">
		<div class="authentication-inner">
			<!-- Register -->
			<div class="card">
				<div class="card-body">
					<!-- Logo -->
					<div class="app-brand justify-content-center">
						<img src="{{ asset('images/logo.png') }}" class="img-fluid" style="width: 250px;">
					</div>
					<!-- /Logo -->
					<h4 class="mb-2 text-center">Bienvenido al sistema de Pyscom!</h4>
					<p class="mb-4 text-center">Por favor ingresa con tu correo electrónico y contraseña</p>

					@if ($errors->has('email') || $errors->has('password'))
					<p class="text-center" style="color: red; font-size: 16px;"><strong>Correo o contraseña incorrectos</strong></p>
					@endif

					<form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
						@csrf
						<div class="mb-3">
							<label for="email" class="form-label">Correo electrónico</label>
							<input type="email" class="form-control" id="email" name="email"
							placeholder="Ingresa tu correo electrónico" value="{{ old('email') }}" required autofocus />
						</div>
						<div class="mb-3 form-password-toggle">
							<label class="form-label" for="password">Contraseña</label>
							<div class="input-group input-group-merge">
								<input type="password" id="password" class="form-control" name="password"
								placeholder="Ingresa la contraseña" aria-describedby="password" required value="{{ old('password') }}" />
								<span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
							</div>
						</div>
						<div class="mb-3">
							<button class="btn btn-primary d-grid w-100" type="submit">Iniciar sesión</button>
						</div>
					</form>

					<p class="text-center">
						<span>Olvidaste la contraseña? Ponte en contacto conmigo</span>
						<span>webmaster@pyscom.com</span>
					</p>
				</div>
			</div>
			<!-- /Register -->
		</div>
	</div>
</div>

@endsection
