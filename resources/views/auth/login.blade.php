@extends('layouts.app')

@section('extra-css')

@endsection

@section('content')
{{-- <div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card mt-4 shadow" style="border-radius: 0px;">
				<div class="card-body pt-4 pb-1 px-4">
					<div class="row">
						<div class="col-md-12 d-flex justify-content-center">
							<h4><strong>Iniciar sesión</strong></h4>
						</div>
						<div class="col-md-12">
							<hr>
						</div>
					</div>

					<div class="row">
						<form method="POST" action="{{ route('login') }}">
							@csrf
							<div class="col-md-12 mb-3">
								<label for="email" class="form-label">Correo electrónico</label>
								<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Ingrese el correo electrónico" value="{{ old('email') }}" required autocomplete="email" autofocus>

								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror

							</div>

							<div class="col-md-12 mb-3">
								<label for="password" class="form-label">Contraseña</label>
								<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Ingrese su contraseña" value="{{ old('password') }}" required autocomplete="current-password">

								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>

							<div class="col-md-4 my-3">
								<button type="submit" class="btn btn-primary">
									Iniciar sesión
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> --}}

<div class="container-xxl">
	<div class="authentication-wrapper authentication-basic container-p-y">
		<div class="authentication-inner">
			<!-- Register -->
			<div class="card">
				<div class="card-body">
					<!-- Logo -->
					<div class="app-brand justify-content-center">
						{{-- <a href="index.html" class="app-brand-link gap-2">
							<span class="app-brand-text demo text-body fw-bolder">Sneat</span>
						</a> --}}
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
